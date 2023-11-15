<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            'Estados Unidos',
            'Italia',
            'Japón',
            'El Salvador',
            'Nueva Zelanda',
            'Reino Unido',
        ];

        foreach ($countries as $country) {
            Country::create([
                'name' => $country,
            ]);
        }
    }
}
