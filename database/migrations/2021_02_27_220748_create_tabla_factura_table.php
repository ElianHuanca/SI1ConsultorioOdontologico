<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_factura', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->string('nombre');
            $table->integer('nit');
            $table->string('descripcion');
            $table->decimal('importe');
            $table->unsignedBigInteger('pago_id');
            $table->foreign('pago_id')->references('id')->on('tabla_pago')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tabla_factura');
    }
}
