<?php

namespace App;

use Revys\Revy\App\Entity;
use Revys\Revy\App\Traits\Translatable;

class Service extends Entity
{
    use Translatable;

    public static $translatedAttributes = ['title', 'description'];
}
