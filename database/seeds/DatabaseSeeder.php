<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\Revys\Revy\Database\Seeds\DatabaseSeeder::class);
        $this->call(\Revys\RevyAdmin\Database\Seeds\DatabaseSeeder::class);

        $this->call(\App\Seeds\DatabaseSeeder::class);
    }
}
