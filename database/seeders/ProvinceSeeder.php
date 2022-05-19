<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
            'name'=>'Maputo'
        ]);
        Province::create([
            'name'=>'Gaza'
        ]);

        Province::create([
            'name'=>'Inhambane'
        ]);

        Province::create([
            'name'=>'Sofala'
        ]);

        Province::create([
            'name'=>'Manina'
        ]);

        Province::create([
            'name'=>'Tete'
        ]);

        Province::create([
            'name'=>'Zambézia'
        ]);

        Province::create([
            'name'=>'Cabo Delgado'
        ]);
        Province::create([
            'name'=>'Niassa'
        ]);
    }
}
