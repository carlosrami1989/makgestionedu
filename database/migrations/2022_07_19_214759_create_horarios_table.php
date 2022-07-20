<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tb_horarios');
        Schema::create('tb_horarios', function (Blueprint $table) {
            $table->id();
            $table->integer('id_curso')->nullable()->default(1);
            $table->integer('id_dia')->nullable()->default(1);
            $table->integer('id_hora')->nullable()->default(1);
            $table->integer('id_docente')->nullable()->default(1);
            $table->integer('id_materia')->nullable()->default(1);
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
        Schema::dropIfExists('horarios');
    }
}
