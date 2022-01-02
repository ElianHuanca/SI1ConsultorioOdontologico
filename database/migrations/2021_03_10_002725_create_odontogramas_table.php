<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdontogramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odontogramas', function (Blueprint $table) {
            $table->unsignedInteger('idRegistro')->nullable();
            $table->string('idimagen','20')->nullable();
            $table->string('img11','100')->nullable();
            $table->string('img12','100')->nullable();
            $table->string('img13','100')->nullable();
            $table->string('img14','100')->nullable();
            $table->string('img15','100')->nullable();
            $table->string('img16','100')->nullable();
            $table->string('img17','100')->nullable();
            $table->string('img18','100')->nullable();
            $table->string('img21','100')->nullable();
            $table->string('img22','100')->nullable();
            $table->string('img23','100')->nullable();
            $table->string('img24','100')->nullable();
            $table->string('img25','100')->nullable();
            $table->string('img26','100')->nullable();
            $table->string('img27','100')->nullable();
            $table->string('img28','100')->nullable();
            $table->string('img31','100')->nullable();
            $table->string('img32','100')->nullable();
            $table->string('img33','100')->nullable();
            $table->string('img34','100')->nullable();
            $table->string('img35','100')->nullable();
            $table->string('img36','100')->nullable();
            $table->string('img37','100')->nullable();
            $table->string('img38','100')->nullable();
            $table->string('img41','100')->nullable();
            $table->string('img42','100')->nullable();
            $table->string('img43','100')->nullable();
            $table->string('img44','100')->nullable();
            $table->string('img45','100')->nullable();
            $table->string('img46','100')->nullable();
            $table->string('img47','100')->nullable();
            $table->string('img48','100')->nullable();
            $table->unsignedInteger('paciente_id')->nullable();
            //$table->foreign('paciente_id')->references('id')->on('table__paciente')->onDelete('update');
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
        Schema::dropIfExists('odontogramas');
    }
}
