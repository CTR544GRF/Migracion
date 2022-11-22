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
        Schema::create('tbl_empresas', function (Blueprint $table) {

            $table->id('id_empresa');
            $table->integer('nit_empresa');
            $table->String('nom_empresa', 30);
            $table->String('tel_empresa', 15);
            $table->String('direccion_empresa', 30);
            $table->String('email_empresa', 30);
            $table->foreignId('id')->nullable();
            $table->foreign('id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('tbl_empresas');
    }
};
