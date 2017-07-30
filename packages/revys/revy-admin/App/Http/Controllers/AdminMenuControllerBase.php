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
                        'type' => 'bool',
                        'label' => __('Опубликован'),
                        'field' => 'status',
                        'value' => 'status'
                    ]
                ]
            ]
        ];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminMenu  $adminMenu
     * @return \Illuminate\Http\Response
     */
    public function show(AdminMenu $adminMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminMenu  $adminMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminMenu $adminMenu)
    {
        //
    }
}
