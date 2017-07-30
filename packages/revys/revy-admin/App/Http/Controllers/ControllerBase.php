<?php

namespace Revys\RevyAdmin\App\Http\Controllers;

use Revys\RevyAdmin\App\Http\Composers\GlobalsComposer;
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

			return [
				'content' => $sections['content'],
				'js' => str_replace(['<script>', '</script>'], '', $sections['js'])
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

		$data['items'] = $this->model::paginate(50);

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
     * @param int|string $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
		$object = $this->model::find($id);

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
     * Update the specified resource in storage.
     *
     * @param int|string $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
		$request = request();

       	$this->validate($request, $this->getModel()::rules());
        
		
		$data = $request->all();
		$data['status'] = $request->input('status') ? $request->input('status') : 0;


        $this->getModel()::find($id)->update($data);
		
    	Session::flash('message', __('Сохранение прошло успешно'));

        return redirect()->route('admin::edit', [$this->getController(), $id]);
    }
}