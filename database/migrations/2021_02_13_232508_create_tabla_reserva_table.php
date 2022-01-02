<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_reserva', function (Blueprint $table) {
            $table->id();
            $table->datetime('inicio');
            $table->datetime('fin')->nullable()->default(null);
            $table->unsignedBigInteger('odontologo_id');
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('estadoRes_id');
           $table->foreign('odontologo_id')->references('id')->on('tabla_odontologo')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('estadoRes_id')->references('id')->on('estadoRes')->onUpdate('cascade')->onDelete('cascade');
           $table->foreign('paciente_id')->references('id')->on('table__paciente')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tabla_reserva');
    }
}
