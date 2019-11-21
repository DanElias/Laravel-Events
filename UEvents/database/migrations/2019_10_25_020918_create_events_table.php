<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('idEvento');
            //$table->integer('idAdmin')->unsigned();
            $table->string('nombre');
            $table->string('siglas');
            $table->text('descripcion');
            $table->dateTime('fecha');
            $table->integer('duracion');
            $table->integer('limiteAsistentes');
            $table->float('costo', 8, 2);
            $table->string('lugar');
            $table->timestamps();

            //$table->foreign('idAdmin')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
