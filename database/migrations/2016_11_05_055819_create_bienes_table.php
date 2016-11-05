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
          $table->string('titulo');
          $table->string('entidad');
          $table->string('contacto_email');
          $table->string('contacto_name');
          $table->string('canton');
          $table->string('provincia');
          $table->string('distrito');
          $table->text('otras_señas');
          $table->text('descripcion');
          $table->string('lote');
          $table->string('contruccion');
          $table->string('localizacion');
          $table->decimal('precio',10,8);
          $table->doble('descuento',4,2);
          $table->json('comentarios');
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
