<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //"username": "juana",
        //"comentario": "soy un comentario",
        Schema::create('comentarios', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('user')->unsigned();
          $table->integer('bien')->unsigned();
          $table->text('comentario');
          $table->string('habilitado');
          $table->timestamps();

          $table->foreign('user')->references('id')->on('users');
          $table->foreign('bien')->references('id')->on('bienes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
