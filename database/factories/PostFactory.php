<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        /* 
            El factory debe tener una estrecha relación con la tabla
            Faker es un generador de datos de pruba muy util a la hora de testear la app
        */
        
        'user_id' => 1,
        'title' => $faker->sentence,
        'body' => $faker->text(800)
    ];
});
