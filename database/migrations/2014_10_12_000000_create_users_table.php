<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('state_users', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });

        Schema::create('tipo_users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('localidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->foreignId('state_users_id')->default(0)->references('id')->on('state_users');
            $table->foreignId('localidad_users_id')->default(2)->references('id')->on('localidades');
            $table->foreignId('tipo_users_id')->default(3)->references('id')->on('tipo_users');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('tipo_users');
        Schema::dropIfExists('localidades');
        Schema::dropIfExists('state_users');
    }
}
