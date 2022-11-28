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
        Schema::create('tbl_facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num_factura')->unique();
            $table->date('fecha');
            $table->String('tipo_factura', 20);
            $table->integer('valor_unitario');
            $table->integer('cantidad');
            $table->integer('iva_producto');
            $table->String('descripcion', 150);
            $table->integer('cod_articulo');
            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->timestamps();
        });
        Schema::table('tbl_facturas', function (Blueprint $table) {
            $table->foreign('cod_articulo')->references('cod_articulo')->on('tbl_articulos')->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('tbl_empresas')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_facturas');
    }
};
