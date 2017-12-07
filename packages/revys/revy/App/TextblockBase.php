<?php

namespace Revys\Revy\App;

use Revys\Revy\App\Entity;
use Revys\Revy\App\Traits\Translatable;

class TextblockBase extends Entity
{
    use Translatable;

    public $translatedAttributes = ['title', 'text'];

    protected $table = 'textblock';

    public static function rules()
    {
        return [
            'title' => 'required'
        ];
    }

    public static function getText($name)
    {
        $textblock = self::findByName($name);

        if ($textblock) {
            return $textblock->text;
        }

        return '';
    }
}
