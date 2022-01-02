<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atencions', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->dateTime('fechaInicio');
            $table->dateTime('fechaFin');
            $table->unsignedBigInteger('reserva_id')->nullable()->unique();
            $table->unsignedBigInteger('historial_id')->nullable();
            $table->foreign('reserva_id')->references('id')->on('tabla_reserva')->onDelete('set null');
            $table->foreign('historial_id')->references('id')->on('historials')->onDelete('set null');
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
        Schema::dropIfExists('atencions');
    }
}
