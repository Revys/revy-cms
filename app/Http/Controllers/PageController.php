<?php

namespace App\Http\Controllers;

use Revys\Revy\App\Language;
use Revys\Revy\App\Menu;
use Revys\Revy\App\Page;
use Revys\Revy\App\Settings;
use Revys\Revy\App\Textblock;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends \Revys\Revy\App\Http\Controllers\PageController
{
    /**
     * Display homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        $navigation = Menu::getBlock('top');

        $languages = Language::published()->get();

        $phone = Settings::value('phone');
        $email = Settings::value('email');

        $textblocks = [
            'banner_text' => Textblock::getText('banner_text')
        ];

        return view('page.index', compact('page', 'navigation', 'languages', 'phone', 'email', 'textblocks'));
    }

    /**
     * Routes to page method
     *
     * Appends meta data
     *
     * @throws NotFoundHttpException
     * @param string $page
     * @return mixed
     */
    public function page($page = 'index')
    {
        $page = Page::findByUrlID($page);

        if (! $page)
            abort(404);

        $page->assignMeta();

        if (! method_exists($this, $page->sid))
            return $this->text($page);

        return $this->{$page->sid}($page);
    }

    /**
     * @param Page $page
     * @return string
     */
    public function text(Page $page)
    {
        return $page->meta_title;
    }

}
