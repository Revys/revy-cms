<?php

namespace App;

use Revys\Revy\App\Entity;
use Revys\Revy\App\Traits\Translatable;
use Revys\Revy\App\Traits\WithImages;

class Service extends Entity
{
    use Translatable, WithImages;

    public static $translatedAttributes = ['title', 'description'];
}
