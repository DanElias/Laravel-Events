<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNombreAndAPaternoAndAMaternoAndEmpresaAndFechaNacimientoAndEstadoToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('nombre')->nullable();
            $table->string('a_paterno')->nullable();
            $table->string('a_materno')->nullable();
            $table->string('empresa')->nullable();
            $table->dateTime('fecha_nacimiento')->nullable();
            $table->string('estado')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn(['nombre', 'a_paterno', 'a_materno', 'empresa', 'fecha_nacimiento', 'estado']);
        });
    }
}
