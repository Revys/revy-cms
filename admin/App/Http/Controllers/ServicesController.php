<?php

namespace Admin\App\Http\Controllers;

use App\Service;
use Illuminate\Support\Facades\Storage;
use Revys\Revy\App\Image;
use Revys\RevyAdmin\App\Http\Controllers\Controller;
use Validator;

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
                    ],
                    [
                        'type' => 'image',
                        'label' => __('Изображение'),
                        'field' => 'image',
                        'value' => function ($object) {
                            $image = $object->images()->first();
                            if ($image)
                                return asset('storage/' . $image->getPath());
                        }
                    ]
                ]
            ]
        ];
    }
}
