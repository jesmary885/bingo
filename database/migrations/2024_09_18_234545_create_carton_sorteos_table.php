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
        Schema::create('carton_sorteos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('sorteo_id')->nullable();
            $table->foreign('sorteo_id')->references('id')->on('sorteos');

            $table->unsignedBigInteger('carton_id')->nullable();
            $table->foreign('carton_id')->references('id')->on('cartons');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('pago_id')->nullable();
            $table->foreign('pago_id')->references('id')->on('pagos');

            $table->string('status_carton'); //No disponible, Reservado, Disponible
            $table->string('status_pago')->nullable(); //Pendiente, Pago recibido,  Pago no recibido
            $table->string('status_juego')->nullable(); //Gano, Sin estado

            $table->string('duplicado_1er')->nullable();//al inicio no, si hay duplicidad si
            $table->string('duplicado_2do')->nullable();//al inicio no, si hay duplicidad si
            $table->string('duplicado_3er')->nullable();//al inicio no, si hay duplicidad si

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carton_sorteos');
    }
};
