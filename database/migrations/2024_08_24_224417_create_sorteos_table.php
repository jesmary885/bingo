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

            $table->string('type_1'); //el tipo de sorteo (campo lleno, esquinas etc) primer lugar
            $table->string('type_2')->nullable();//2do lugar

            $table->string('status'); //Aperturado, Finalizado, Iniciado

            $table->string('precio_carton_dolar'); 

            $table->string('porcentaje_ganancia'); //porcentaje de ganancia del jugador

            $table->string('porcentaje_ganancia_2do_lugar')->nullable(); //porcentaje de ganancia del jugador
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
