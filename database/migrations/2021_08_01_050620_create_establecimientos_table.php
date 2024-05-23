<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('tiempos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('users_id')->references('id')->on('users');
            $table->foreignId('categorias_id')->references('id')->on('categorias');
            $table->foreignId('localidades_id')->references('id')->on('localidades');
            $table->string('logo')->nullable();
            $table->char('protection');
            $table->char('delivery');
            $table->string('direccion');
            $table->string('colonia');
            $table->string('lat');
            $table->string('lng');
            $table->string('telefono');
            $table->text('descripcion');
            $table->text('horario');
            $table->timestamps();
        });

        Schema::create('anuncios', function(Blueprint $table){
            $table->id();
            $table->string('titulo');
            $table->foreignId('users_id')->references('id')->on('users');
            $table->foreignId('establecimientos_id')->nullable()->references('id')->on('establecimientos');
            $table->foreignId('categorias_id')->nullable()->references('id')->on('categorias');
            $table->foreignId('localidades_id')->nullable()->references('id')->on('localidades');
            $table->foreignId('tiempos_id')->nullable()->references('id')->on('tiempos');
            $table->string('img')->nullable();
            $table->text('descripcion');
            $table->text('direccion');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
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
        Schema::dropIfExists('establecimientos');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('localidades');
        Schema::dropIfExists('anuncios');
        Schema::dropIfExists('status');
        Schema::dropIfExists('tiempos');
    }
}
