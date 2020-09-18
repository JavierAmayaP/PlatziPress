<?php

use App\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Se crean realmente los datos de configuración
     * @return void
     */
    public function run()
    {
        /* 
            Creación de un usuario para realizar pruebas.

            Utilizo eloquent directamente debido a que si
            si lo creo medinate factory se crearia un usuario
            aleatorio y no podria probar el sistema ya que no
            sabria el usuario ni la contraseña.
        */

        App\User::create([
            'name' => 'Javier Amaya Patricio',
            'email' => 'javieramayapat@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        /* 
            Creación de 24 posts mediante factory
        */

        factory(Post::class,24)->create();
    }
}
