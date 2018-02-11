<?php

namespace Admin\App\Http\Controllers;

use App\Service;
use Revys\RevyAdmin\App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    protected $model = Service::class;

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
                        'type' => 'text',
                        'label' => __('Текст'),
                        'field' => 'description',
                        'value' => 'description'
                    ]
                ]
            ]
        ];
    }
}
