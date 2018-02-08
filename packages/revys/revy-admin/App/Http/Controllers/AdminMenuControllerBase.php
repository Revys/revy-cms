<?php

namespace Revys\RevyAdmin\App\Http\Controllers;

use Revys\RevyAdmin\App\AdminMenu;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class AdminMenuControllerBase extends Controller
{
    public static function listFieldsMap()
    {
        return [
			[
				'field' => 'title',
				'title' => __('Заголовок'),
				'link' => true
			],
			[
				'field' => 'controller',
				'title' => __('Контроллер')
			],
			[
				'field' => 'action',
				'title' => __('Действие')
			]
		];
    }

    public function index()
    {
        $data = [];

        $data['fields'] = static::listFieldsMap();

        $items = $this->getModel()::withTranslation()->get();
  
        $items = \Revys\Revy\App\Helpers\Tree::sort($items);
        
        $data['items'] = new Collection($items);

        $data['tree'] = true;

        $data = static::normalizeListData($data);

        return $this->view('index', $data);
    }

    public static function editFieldsMap()
    {
        return [
            [
                'caption' => __('Базовая информация'),
                'actions' => self::editActionsMap(),
                'fields' => [
                    [
                        'type' => 'string',
                        'label' => __('Заголовок'),
                        'field' => 'title',
                        'value' => 'title'
                    ],
                    [
                        'type' => 'string',
                        'label' => __('Контроллер'),
                        'field' => 'controller',
                        'value' => 'controller'
                    ],
                    [
                        'type' => 'string',
                        'label' => __('Действие'),
                        'field' => 'action',
                        'value' => 'action'
                    ],
                    [
                        'type' => 'icon',
                        'label' => __('Иконка'),
                        'field' => 'icon',
                        'value' => 'icon'
                    ],
                    [
                        'type' => 'parent',
                        'label' => __('Родитель'),
                        'field' => 'parent_id',
                        'value' => 'parent_id',
                        'values' => function($object) { 
                            return AdminMenu::getListForRelation($object, 'id', 'title');
                        }
                    ],
                    [
                        'type' => 'bool',
                        'label' => __('Опубликован'),
                        'field' => 'status',
                        'value' => 'status'
                    ]
                ]
            ]
        ];
    }

    public function insert()
    {
        \Cache::forget('admin::navigation_left');

        return parent::insert();
    }

    public function update($id)
    {
        \Cache::forget('admin::navigation_left');

        return parent::update($id);
    }

    public function delete($id)
    {
        \Cache::forget('admin::navigation_left');

        return parent::delete($id);
    }
}
