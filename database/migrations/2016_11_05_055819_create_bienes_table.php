<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBienesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bienes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('canton');
          $table->string('provincia');
          $table->string('distrito');
          $table->string('localizacion');
          $table->text('descripcion');
          $table->string('lote');
          $table->string('contruccion');
          $table->string('precio');
          $table->string('entidad');
          $table->string('contacto_email');
          //$table->json('comentarios');
          /*
          [{
            "username": "juana",
            "comentario": "soy un comentario",
            "respuestas" : [
              {
                "username": "juana",
                "comentario": "soy una respuesta"
              },
              {
                "username": "juana",
                "comentario": "soy una respuesta"
              }
            ]
          },{
          "username": "juana",
          "comentario": "soy un comentario",
          "respuestas" : [
            {
              "username": "juana",
              "comentario": "soy una respuesta"
            },
            {
              "username": "juana",
              "comentario": "soy una respuesta"
            }ß
          }]
          */
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bienes');
    }
}
