<?php

namespace Database\Seeders;

use App\Models\Country; // Importa el modelo Country para interactuar con la tabla correspondiente en la base de datos
use Illuminate\Database\Seeder; // Importa la clase Seeder para la creación de semillas de datos

class CountrySeeder extends Seeder // Declara la clase CountrySeeder que extiende de Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() // Método para ejecutar la semilla de datos
    {
        $countries = [ // Arreglo con nombres de países
            'Estados Unidos',
            'Italia',
            'Japón',
            'El Salvador',
            'Nueva Zelanda',
            'Reino Unido',
        ];

        // Itera sobre el arreglo de países y crea registros en la tabla 'countries'
        foreach ($countries as $country) {
            Country::create([ // Crea un nuevo registro en la tabla 'countries' con el nombre del país actual
                'name' => $country,
            ]);
        }
    }
}
