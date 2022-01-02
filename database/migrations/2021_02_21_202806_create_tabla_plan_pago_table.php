<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaPlanPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_plan_pago', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidadCoutas');
            $table->float('montoCouta')->nullable();
            $table->integer('coutasPagadas')->nullable();
            $table->float('saldoPendiente')->nullable();
            $table->unsignedBigInteger('tratamiento_id');
            $table->unsignedBigInteger('estadoPlan_id');
            $table->foreign('tratamiento_id')->references('id')->on('tabla_tratamiento')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tabla_plan_pago');
    }
}
