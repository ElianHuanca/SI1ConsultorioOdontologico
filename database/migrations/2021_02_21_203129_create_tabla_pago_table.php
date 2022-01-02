<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_pago', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->float('montoTotal');
            $table->integer('nroCouta')->nullable();
            $table->unsignedBigInteger('planPago_id')->nullable();
            $table->unsignedBigInteger('atencion_id')->nullable();
           
            $table->foreign('planPago_id')->references('id')->on('tabla_plan_pago')->onUpdate('cascade')->onDelete('cascade');
           /* $table->foreign('atencion_id')->references('id')->on('atencion')->onUpdate('cascade')->onDelete('cascade');
            */
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
        Schema::dropIfExists('tabla_pago');
    }
}
