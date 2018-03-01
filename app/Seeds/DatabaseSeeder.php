<?php

namespace App\Seeds;

use Illuminate\Database\Seeder;
use Revys\RevyAdmin\App\AdminMenu;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = AdminMenu::create([
            'title' => 'Информация',
            'controller' => 'services',
            'action' => 'index'
        ]);

        AdminMenu::create([
            'title' => 'Чем мы занимаемся',
            'controller' => 'services',
            'action' => 'index',
            'parent_id' => $object->id
        ]);
    }
}