<?php

namespace Database\Seeders;

use App\Models\Canton;
use App\Models\TipoParroquia;
use Illuminate\Database\Seeder;

class TipoParroquiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_parroquias = [
            ['descripcion' => 'Parroquias Urbanas', 'abreviatura' => 'PU', 'created_usu' => 1, 'updated_usu' => 1, 'created_ip' => '127.0.0.1', 'updated_ip' => '127.0.0.1',],
            ['descripcion' => 'Parroquias Rurales', 'abreviatura' => 'PR', 'created_usu' => 1, 'updated_usu' => 1, 'created_ip' => '127.0.0.1', 'updated_ip' => '127.0.0.1',],
        ];

        TipoParroquia::truncate();
        foreach ($tipo_parroquias as $tipo_parroquia) {
            TipoParroquia::create($tipo_parroquia);
        }
    }
}
