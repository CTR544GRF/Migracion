<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->String('nom_user', 20);
            $table->String('apellidos_user', 20);
            $table->date('fecha_ingreso', 20);
            $table->String('telefono_user', 10);
            $table->String('direccion_user', 30);
            // $table->foreignId('cod_rol');
            // $table->foreign('cod_rol')->references('id')->on('roles');
            // ->onDelete('set null')
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
    }
};
