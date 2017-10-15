<?php

namespace Revys\RevyAdmin\App\Http\Controllers;

use Revys\RevyAdmin\App\AdminMenu;
use Illuminate\Http\Request;

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

    public static function editFieldsMap()
    {
        return [
            [
                'caption' => __('Базовая информация'),
                'actions' => self::editActionsMap(),
                'fields' => [
                    [
                        'type' => 'text',
                        'label' => __('Заголовок'),
                        'field' => 'title',
                        'value' => 'title'
                    ],
                    [
                        'type' => 'text',
                        'label' => __('Контроллер'),
                        'field' => 'controller',
                        'value' => 'controller'
                    ],
                    [
                        'type' => 'text',
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
}
