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
        Schema::create('tbl_inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cod_articulo');
            $table->string('tipo_articulo', 100);
            $table->string('descripcion_articulo')->nullable();
            $table->float('existencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_inventarios');
    }
};
