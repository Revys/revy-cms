<?php

namespace Revys\Revy\Database\Seeds;

use App\User;
use Illuminate\Database\Seeder;
use Revys\Revy\App\Entity;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'login' => config('admin.config.auth.login'),
            'email' => config('admin.config.auth.email'),
            'password' => \Hash::make(config('admin.config.auth.password'))
        ]);
    }
}