<?php

namespace Revys\RevyAdmin\App\Http\Controllers;

use Revys\RevyAdmin\App\Http\Composers\GlobalsComposer;
use Illuminate\Pagination\Paginator;
use View;

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
	
		return $this->view('edit', compact('object', 'fieldsMap'));
    }

	public static function editActionsMap()
    {
        return [
			'save' => [
				'label' => __('Сохранить'),
				'style' => 'success'
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
		return $this->view('create');
    }
}