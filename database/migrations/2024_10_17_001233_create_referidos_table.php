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
        Schema::create('referidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Yo en tabla usuarios
            $table->foreignId('user_id')->constrained();

            //usuario que me refirio
            $table->unsignedBigInteger('refer_id');
            $table->foreign('refer_id')->references('id')->on('users');

            $table->string('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referidos');
    }
};
