<?php

namespace Revys\Revy\App;

class LanguageBase extends Entity
{
    public function isSelected()
    {
        return ($this->code == Revy::getLanguage()->code);
    }

    public static function findByCode($code)
    {
        if (strlen($code) <> 2)
            return false;
            
        return self::where('code', $code)->published()->first();
    }
}
