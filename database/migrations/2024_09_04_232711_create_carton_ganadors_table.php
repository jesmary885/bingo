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
        Schema::create('carton_ganadors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('sorteo_id')->nullable();
            $table->foreign('sorteo_id')->references('id')->on('sorteos');

            $table->unsignedBigInteger('carton_id')->nullable();
            $table->foreign('carton_id')->references('id')->on('cartons');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('type'); //el tipo de sorteo (campo lleno, esquinas etc)

            $table->string('lugar')->nullable(); //Primero,Segundo,
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carton_ganadors');
    }
};
