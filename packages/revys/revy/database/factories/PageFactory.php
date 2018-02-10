<?php

use Faker\Generator as Faker;
use Revys\Revy\App\Page;

$factory->define(Page::class, function (Faker $faker) {
    return [
        \Revys\Revy\App\Entity::getUrlIDField() => $faker->slug,
        \Revys\Revy\App\Entity::getStringIdField() => $faker->word,
        'title' => $faker->word,
        'meta_title' => $faker->word,
        'meta_description' => $faker->paragraph,
        'meta_keywords' => $faker->words(5, true)
    ];
});