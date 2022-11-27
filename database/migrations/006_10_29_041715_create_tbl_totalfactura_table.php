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
        Schema::create('tbl_totalfacturas', function (Blueprint $table) {
            $table->integer('id', 10);
            $table->string('num_factura');
            $table->double('iva');
            $table->unsignedBigInteger('sub_total');
            $table->double('total');
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
        //
    }
};
