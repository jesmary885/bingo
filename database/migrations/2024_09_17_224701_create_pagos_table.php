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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->constrained();

            $table->string('metodo_pago')->nullable();

            $table->string('monto');
            $table->string('tipo'); //puede ser: Recarga, Pago de carton, Retiro
            $table->string('constancia')->nullable();
            $table->string('status'); //Pendiente, Pago recibido,  Pago no recibido
            $table->string('referencia')->nullable();
            $table->string('cantidad')->nullable();

            $table->unsignedBigInteger('cuenta_id')->nullable();
            $table->foreign('cuenta_id')->references('id')->on('cuentas_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
};
