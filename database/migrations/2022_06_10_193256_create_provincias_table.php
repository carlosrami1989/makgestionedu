<?php

use App\Models\Region;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('provincias')) {
            Schema::create('provincias', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Region::class)->constrained();
                $table->string('descripcion', 100)->unique();
                $table->char('abreviatura', 10)->nullable();
                $table->text('path')->nullable()->comment('guarda el codigo SVG HTML d');
                $table->double('latitud')->nullable()->default(0);
                $table->double('longitud')->nullable()->default(0);
                /* Datos para auditar */
                $table->timestamps();
                $table->integer('created_usu')->nullable()->default(1);
                $table->integer('updated_usu')->nullable()->default(1);
                $table->ipAddress('created_ip')->nullable()->default('127.0.0.1');
                $table->ipAddress('updated_ip')->nullable()->default('127.0.0.1');
                $table->boolean('is_visible')->nullable()->default(true)->comment('activará o desactivará el registro');
                $table->boolean('status')->nullable()->default(true)->comment('eliminación logica');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}
