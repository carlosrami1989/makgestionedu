<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
          Schema::dropIfExists('tb_docentes');
          Schema::create('tb_docentes', function (Blueprint $table) {
            $table->id();
            $table->string('CtxApellidoPaterno', 200)->nullable()->default('text');
            $table->string('CtxApellidoMaterno', 200)->nullable()->default('text');
            $table->string('CtxPrimerNombre', 200)->nullable()->default('text');
            $table->string('CtxSegundoNombre', 200)->nullable()->default('text');
            $table->string('cedula', 10)->default('0000000000')->nullable();
            $table->string('telefono', 10)->default('0000000000')->nullable();
            $table->string('direccion', 150)->default('-')->nullable();
            $table->string('sexo', 150)->default('-')->nullable();
            $table->string('direccion_secundaria', 150)->default('-')->nullable();
            $table->string('ciudad', 150)->default('-')->nullable();
            $table->string('provincia', 150)->default('-')->nullable();
            $table->string('parroquia', 150)->default('-')->nullable();
            $table->boolean('es_extranjero')->nullable()->default(false);
            $table->string('email')->unique();
            $table->string('CtxNombre', 200)->nullable()->default('text');
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
  
    }
}
