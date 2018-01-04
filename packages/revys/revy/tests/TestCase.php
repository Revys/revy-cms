<?php

namespace Revys\Revy\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp()
    {
        parent::setUp();
        
        $pathToFactories = base_path('vendor/revys/revy/database/factories');
        
        $this->app->make('Illuminate\Database\Eloquent\Factory')->load($pathToFactories);
    }
}
