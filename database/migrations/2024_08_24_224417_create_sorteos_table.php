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
        Schema::create('sorteos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->dateTime('fecha_ejecucion')->nullable();

            $table->string('type_1'); //el tipo de sorteo (campo lleno, esquinas etc)
            $table->string('type_2')->nullable();

            $table->string('status'); //Aperturado, Finalizado

            $table->string('premio')->nullable(); //Aperturado, iniciado, Finalizado


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sorteos');
    }
};
