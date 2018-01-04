<?php

namespace Revys\Revy\Tests\Feature;

use Revys\Revy\Tests\TestCase;
use Revys\Revy\App\Http\Middleware\LanguageMiddleware;
use Illuminate\Http\Request;
use Revys\Revy\App\Language;
use Revys\Revy\App\Revy;

class LanguageTest extends TestCase
{
    public function testLanguageIdentifying()
    {
        $middleware = new LanguageMiddleware();

        $languages = Language::all();

        foreach ($languages as $language) {
            $request = Request::create('/' . $language->code, 'GET');

            $response = $middleware->handle($request, function () {});

            $this->assertEquals($request->getDefaultLocale(), $language->code);
        }
        
        // Default
        $request = Request::create('/', 'GET');

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($request->getDefaultLocale(), config('app.locale'));
    }

    public function testFindByCode()
    {
        $language = Language::first();

        $this->assertEquals(Language::findByCode($language->code), $language);
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