<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->bigIncrements('id');

            // Creación de la llave foranea de usuarios
            $table->unsignedBigInteger('user_id');

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('body');
            $table->text('iframe')->nullable();

            // Crea las columnas de marca de tiempo en laravel created_at y updated_at
            $table->timestamps();

            // creación de relación entre la tabla post y usuarios
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
