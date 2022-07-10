<?php

namespace Database\Seeders;

use App\Models\Pais;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pais_id = Pais::where('descripcion', 'like', "%Ecuador%")
            ->first()
            ->value('id');

        $regions = [
            ['pais_id' =>  $pais_id, 'descripcion' => 'Costa', 'abreviatura' => 'COS'],
            ['pais_id' =>  $pais_id, 'descripcion' => 'Sierra', 'abreviatura' => 'SIE'],
            ['pais_id' =>  $pais_id, 'descripcion' => 'Oriente', 'abreviatura' => 'ORI'],
            ['pais_id' =>  $pais_id, 'descripcion' => 'Galápagos', 'abreviatura' => 'GAL'],
        ];

        Region::truncate();
        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
