<?php

namespace Revys\Revy\App;

use Revys\Revy\App\Revy;

class LanguageBase extends Entity
{
    protected static $locales;
    protected static $languages;
    protected static $languagesPublished;

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

    public static function getLocales()
    {
        if (self::$locales !== null)
            return self::$locales;

        self::$locales = Language::get()->pluck('code')->toArray(); 

        return self::$locales;
    }
        
    public static function getLanguages($forse = false)
    {
        if (self::$languagesPublished !== null and ! $forse)
            return self::$languagesPublished;

        self::$languagesPublished = Language::published()->get(); 

        return self::$languagesPublished;
    }

    public static function getLanguagesAll($forse = false)
    {
        if (self::$languages !== null and ! $forse)
            return self::$languages;

        self::$languages = Language::all(); 

        return self::$languages;
    }

    public static function getLangUri($locale, $uri = false)
    {
        if ($uri == false)
            $uri = request()->path();

        $uri = str_replace('/' . Revy::getLocale(), '/' . $locale, 1);

        return $uri;
    }
}
