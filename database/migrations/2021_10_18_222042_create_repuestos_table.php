<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repuesto', function (Blueprint $table) {
            $table->id();

            $table->string('NOM_REP');
            $table->string('DESC_REP');
            $table->string('MARC_REP');
            $table->float('PREC_REP');
            $table->integer('EXIS_REP');
            $table->String('FOTO_REP');

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
        Schema::dropIfExists('repuesto');
    }
}
