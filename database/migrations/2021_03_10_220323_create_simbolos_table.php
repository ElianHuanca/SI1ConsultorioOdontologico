<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateSimbolosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simbolos', function (Blueprint $table) {
            $table->id();
            $table->string('Imagen1','100')->nullable();
            $table->string('Imagen2','100')->nullable();
            $table->string('Imagen3','100')->nullable();
            $table->string('Imagen4','100')->nullable();
            $table->string('Imagen5','100')->nullable();
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
        Schema::dropIfExists('simbolos');
    }
}
