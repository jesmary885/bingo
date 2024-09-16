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
        Schema::create('cuentas_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->string('metodo_pago'); //pago movil, usdt binance
            $table->string('banco')->nullable(); //en el caso que sea pago movil
            $table->string('cedula')->nullable(); 
            $table->string('telefono')->nullable(); 
            $table->string('correo_id')->nullable(); //en el caso que sea binance

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas_users');
    }
};
