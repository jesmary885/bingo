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
        Schema::create('pago_sorteos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('pago_id');
            $table->foreign('pago_id')->references('id')->on('pagos');

            $table->unsignedBigInteger('sorteo_id');
            $table->foreign('sorteo_id')->references('id')->on('sorteos');

            $table->string('status'); //Pendiente Pago recibido
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pago_sorteos');
    }
};
