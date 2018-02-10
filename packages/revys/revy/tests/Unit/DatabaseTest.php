<?php

namespace Revys\Revy\Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Revys\Revy\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Schema;

class DatabaseTest extends TestCase
{
    use DatabaseMigrations;

    public function testGeneralTables()
    {
        $this->assertTrue(Schema::hasTable('languages'));
        $this->assertTrue(Schema::hasTable('settings'));
        $this->assertTrue(Schema::hasTable('settings_groups'));
    }
}
