<?php

namespace App;

use function foo\func;
use Revys\Revy\App\Entity;
use Revys\Revy\App\Traits\Translatable;
use Revys\Revy\App\Traits\WithImages;

class Service extends Entity
{
    use Translatable, WithImages;

    protected static function boot()
    {
        parent::boot();

        static::deleted(function (Service $object) {
            $object->images()->removeAll();
        });
    }

    public static $translatedAttributes = ['title', 'description'];

    public static function getRules()
    {
        switch (request()->getMethod()) {
            case 'POST':
                return [
                    'title'       => 'required',
                    'description' => 'required',
                    'image'       => 'required|image'
                ];
                break;
            default:
                return [
                    'title'       => 'required',
                    'description' => 'required',
                    'image'       => 'image'
                ];
                break;
        }
    }
}
