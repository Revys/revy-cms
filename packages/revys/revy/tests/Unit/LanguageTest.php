<?php

namespace Revys\Revy\Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Revys\Revy\App\Language;
use Revys\Revy\App\Revy;
use Revys\Revy\Tests\TestCase;

class LanguageTest extends TestCase
{
    use DatabaseMigrations;

    public function testFindByCode()
    {
        $language = Language::first();

        if ($language) {
            $this->assertEquals(Language::findByCode($language->code), $language);
        }
    }

    public function testIsSelected()
    {
        $languages = Language::all();

        foreach ($languages as $language) {
            $selectedLanguage = Revy::setLanguage($language);
            $this->assertEquals($selectedLanguage, $language);
        }
    }
}
