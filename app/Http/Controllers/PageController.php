<?php

namespace App\Http\Controllers;

use Revys\Revy\App\Page;
use Revys\Revy\App\Menu;
use Revys\Revy\App\Language;
use Revys\Revy\App\Textblock;
use Illuminate\Http\Request;
use Revys\Revy\App\Settings;

class PageController extends \Revys\Revy\App\Http\Controllers\PageController
{
    /**
     * Display homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::findByUrlid('index')->assignMeta();

        $navigation = Menu::getBlock('top');

        $languages = Language::published()->get();

        $phone = Settings::value('phone');
        $email = Settings::value('email');

        $textblocks = [
            'banner_text' => Textblock::getText('banner_text')
        ];

        return view('page.index', compact('page', 'navigation', 'languages', 'phone', 'email', 'textblocks'));
    }
}
