<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->string('MNombres', 200)->nullable()->default('text');
            $table->string('MApellidos', 200)->nullable()->default('text');
            $table->string('MOcupacion', 200)->nullable()->default('text');
            $table->string('MDomicilio', 200)->nullable()->default('text');
            $table->string('MLugar_Trabajo', 200)->nullable()->default('text');
            $table->string('MTelefono', 200)->nullable()->default('text');
            $table->string('MFecha_Nacimiento', 200)->nullable()->default('text');
            
            $table->string('PNombres', 200)->nullable()->default('text');
            $table->string('PApellidos', 200)->nullable()->default('text');
            $table->string('POcupacion', 200)->nullable()->default('text');
            $table->string('PDomicilio', 200)->nullable()->default('text');
            $table->string('PLugar_Trabajo', 200)->nullable()->default('text');
            $table->string('PTelefono', 200)->nullable()->default('text');
            $table->string('PFecha_Nacimiento', 200)->nullable()->default('text');
            

            $table->string('PARNombres', 200)->nullable()->default('text');
            $table->string('PARApellidos', 200)->nullable()->default('text');
            $table->string('PAROcupacion', 200)->nullable()->default('text');
            $table->string('PARentesco', 200)->nullable()->default('text');
            $table->string('PARTelefono', 200)->nullable()->default('text');

            $table->string('Medico', 200)->nullable()->default('text');
            $table->string('Telefono', 200)->nullable()->default('text');
            $table->string('observacion_medica', 200)->nullable()->default('text');
      

            $table->integer('id_Estudiante')->nullable()->default(1);



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
        Schema::dropIfExists('familias');
    }
}
