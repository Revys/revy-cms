<?php

namespace Revys\Revy\App;

class SettingsBase extends Entity
{
    public static function value($name_id)
    {
        return self::findByName($name_id)->value;
    }
}
