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
        Schema::create('empresa_ganancias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('sorteo_id')->nullable();
            $table->foreign('sorteo_id')->references('id')->on('sorteos');

            $table->string('ganancia');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_ganancias');
    }
};
