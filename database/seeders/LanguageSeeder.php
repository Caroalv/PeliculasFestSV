<?php

namespace Database\Seeders;

use App\Models\Language; // Importa el modelo Language para interactuar con la tabla 'languages'
use Illuminate\Database\Seeder; // Importa la clase Seeder para la creación de semillas (seeds)

class LanguageSeeder extends Seeder
{
    public function run()
    {
        // Lista de idiomas para poblar la tabla 'languages'
        $languages = [
            'Español',
            'Inglés',
            'Francés',
            'Alemán',
            'Italiano',
            'Portugués',
            'Chino',
            'Japonés',
            'Coreano',
            'Ruso',
            // Añade más idiomas según sea necesario
        ];

        // Itera sobre la lista de idiomas y crea una entrada en la tabla 'languages' para cada uno
        foreach ($languages as $language) {
            Language::create([
                'name' => $language,
            ]);
        }
    }
}
