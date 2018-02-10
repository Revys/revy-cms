<?php

namespace Revys\Revy\Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Revys\Revy\App\Entity;
use Revys\Revy\App\Page;
use Revys\Revy\Tests\Languages;
use Revys\Revy\Tests\TestCase;

class PagesTest extends TestCase
{
    use DatabaseMigrations, Languages;

    /**
     * @var \Revys\Revy\App\Page
     */
    private $page;

    public function setUp()
    {
        parent::setUp();

        $this->page = create("Revys\Revy\App\Page");
    }

    public function test_index_page_can_be_accessed()
    {
        self::mockLocale();

        $page = create("Revys\Revy\App\Page", [
            Entity::getUrlIDField() => 'index',
            Entity::getStringIdField() => 'index',
            'title' => 'Index page',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => ''
        ]);

        $this->get($page->getPath())
            ->assertSuccessful();
    }

    public function test_page_can_be_accessed()
    {
        self::mockLocale();

        $this->get($this->page->getPath())
            ->assertSuccessful();
    }
}
