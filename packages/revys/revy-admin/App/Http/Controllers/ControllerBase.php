<?php

namespace Revys\RevyAdmin\App\Http\Controllers;

use Revys\RevyAdmin\App\Http\Composers\GlobalsComposer;
use Revys\RevyAdmin\App\Alerts;
use Revys\RevyAdmin\App\RevyAdmin;
use Revys\RevyAdmin\App\Helpers\Html\ActivePanel;
use Illuminate\Pagination\Paginator;
use View;
use Session;
use Revys\RevyAdmin\App\AdminMenu;

class ControllerBase extends \App\Http\Controllers\Controller
{
	protected $controller;
	protected $model;
	public $view_routes;
	public $actions = [
		'create' => true,
		'edit' => true,
		'hide' => true,
		'publish' => true,
		'order' => true
	];


	public function __construct()
	{
		$this->controller = GlobalsComposer::getControllerName();
		$this->model = '\Revys\RevyAdmin\App\\'.studly_case($this->controller);
	}

	public function getModel()
	{
		return $this->model;
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getViewRoute($action)
	{
		$view = 'admin::' .$this->getController() . '.' . $action;

		if (View::exists($view))
			return $view;

		return (isset($this->view_routes[$action]) ? $this->view_routes[$action] : 'admin::default.' . $action);
	}

	public function view($action = 'index', $data = [])
	{
		$result = View::make($this->getViewRoute($action), $data);
	
		if (\Request::ajax()) {
			$sections = $result->renderSections();

			$alerts = Alerts::all();

			Alerts::clear();

			return [
				'content' => $sections['content'],
				'js' => str_replace(['<script>', '</script>'], '', $sections['js']),
				'alerts' => $alerts
			];
		}

		return $result;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data = [];

		$data['fields'] = static::listFieldsMap();

		$data['items'] = $this->getModel()::paginate(50);

		return $this->view('index', $data);
    }
	
    public static function listFieldsMap()
    {
        return [
			[
				'field' => 'title',
				'title' => __('Заголовок'),
				'link' => true
			],
			[
				'field' => 'created_at',
				'title' => __('Создан')
			],
			[
				'field' => 'updated_at',
				'title' => __('Изменён')
			]
		];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
		$object = $this->getModel()::find($id);

		if (! $object)
			return redirect()->back();

		$fieldsMap = static::editFieldsMap();

		$activePanel = $this->editActivePanel($object);
	
		return $this->view('edit', compact('object', 'fieldsMap', 'activePanel'));
    }

	public static function editActionsMap()
    {
        return [
			'save' => [
				'label' => __('Сохранить'),
				'style' => 'success',
				'type' => 'submit',
				'link' => function($controller, $object){
					return route('admin::update', [$controller, $object->id]);
				}
			],
			'delete' => (GlobalsComposer::getAction() !== 'create' ? [
				'label' => '<i class="icon icon--delete"></i>',
				'style' => 'danger',
				'link' => function($controller, $object){
					return route('admin::delete', [$controller, $object->id]);
				}
			] : false),
			'back' => [
				'label' => __('Назад'),
				'style' => 'default',
				'link' => function($controller, $object){
					return route('admin::list', [$controller]);
				}
			]
        ];
    }

	/*
	 * @todo Export, Copy, View buttons
	 */
	public function editActivePanel($object)
    {
		// $activePanel = new ActivePanel('edit', $object);
		return [
			'caption' => $object->title,
			'buttons' => [
				'back' => true,
				// 'export' => true,
				// 'copy' => true,
				// 'view' => true
			]	
		];
    }

	public function createActivePanel()
    {
        $section = AdminMenu::where('controller', '=', $this->getController())->orderBy('parent_id', 'asc')->first();

		return [
			'caption' => __('Добавить') . ($section != false ? ' в <b>' . $section->title . '</b>' : ''),
			'buttons' => [
				'back' => true
			]	
		];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$fieldsMap = static::editFieldsMap();

		$activePanel = $this->createActivePanel();
	
		return $this->view('create', compact('fieldsMap', 'activePanel'));
    }

    /**
     * Create the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
	public function insert()
	{
		$request = request();

       	$this->validate($request, $this->getModel()::rules(), $this->getModel()::messages());
        
		$data = $this->prepareCreateData($request->all());

        $object = $this->getModel()::create($data);
		
    	Alerts::success(__('Добавление прошло успешно'));

        return redirect()->route('admin::edit', [$this->getController(), $object->id]);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
		$request = request();

       	$this->validate($request, $this->getModel()::rules(), $this->getModel()::messages());
        
		$data = $this->prepareUpdateData($request->all());

        $this->getModel()::find($id)->update($data);
		
    	Alerts::success(__('Сохранение прошло успешно'));

        return redirect()->route('admin::edit', [$this->getController(), $id]);
    }

	public function prepareUpdateData($data)
	{
		$data['status'] = isset($data['status']) ? $data['status'] : 0;

		return $data;
	}

	public function prepareCreateData($data)
	{
		$data['status'] = isset($data['status']) ? $data['status'] : 0;

		return $data;
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->getModel()::find($id)->delete();
		
    	Alerts::success(__('Удаление прошло успешно'));

        return redirect()->route('admin::list', [$this->getController()]);
	}
	
	/**
	 * Publish the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function publish($id)
	{
		$this->getModel()::find($id)->publish();
		
		Alerts::success(__('Объект опубликован'));

        return redirect()->route('admin::edit', [$this->getController(), $id]);
	}
	
	/**
     * Remove the specified resources from storage.
     *
     * @return \Illuminate\Http\Response
     */
	public function fast_delete()
	{
		RevyAdmin::onlyForAjax();

		$items = request()->input('items');

		if (is_array($items)) {
			$model = $this->getModel();

			foreach ($items as $id)
				$model::find($id)->delete();

			Alerts::success(__('Удаление прошло успешно'));
		} else {
			Alerts::fail(__('Не выбрано ни одного элемента'));
		}

        return $this->index();
	}
	
	/**
     * Publish the specified resources from storage.
     *
     * @return \Illuminate\Http\Response
     */
	public function fast_publish()
	{
		RevyAdmin::onlyForAjax();

		$items = request()->input('items');

		if (is_array($items)) {
			$model = $this->getModel();

			foreach ($items as $id)
				$model::find($id)->publish();

			Alerts::success(__('Объекты опубликованы'));
		} else {
			Alerts::fail(__('Не выбрано ни одного элемента'));
		}

        return $this->index();
	}
	
	/**
     * Hide the specified resources from storage.
     *
     * @return \Illuminate\Http\Response
     */
	public function fast_hide()
	{
		RevyAdmin::onlyForAjax();

		$items = request()->input('items');

		if (is_array($items)) {
			$model = $this->getModel();

			foreach ($items as $id)
				$model::find($id)->hide();

			Alerts::success(__('Объекты скрыты'));
		} else {
			Alerts::fail(__('Не выбрано ни одного элемента'));
		}

        return $this->index();
	}
}