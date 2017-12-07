<?php

namespace Revys\RevyAdmin\App\Http\Controllers;

use Revys\RevyAdmin\App\AdminMenu;
use Illuminate\Http\Request;

class LanguageControllerBase extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->model = '\Revys\Revy\App\\'.studly_case($this->controller);
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
				'field' => 'code',
				'title' => __('Код языка')
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
                        'type' => 'string',
                        'label' => __('Заголовок'),
                        'field' => 'title',
                        'value' => 'title'
                    ],
                    [
                        'type' => 'string',
                        'label' => __('Код языка'),
                        'field' => 'code',
                        'value' => 'code'
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

    public function translations($language)
    {
        $language = $this->getModel()::findByCode($language);

        if (! $language)
            return $this->index();
        
        $activePanel = $this->translationsActivePanel($language);
        
        $translations = array();

        dd(\Lang::get('pagination'));

		return $this->view('translations', compact('language', 'translations', 'activePanel'));
    }
    
    public function translationsActivePanel($object)
    {
        return [
			'caption' => __('Переводы языка') . ': ' . $object->title,
			'buttons' => [
				'back' => true
			]	
		];
    }
}
