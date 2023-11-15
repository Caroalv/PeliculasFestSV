<?php

namespace Database\Seeders;
use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run()
    {
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

        foreach ($languages as $language) {
            Language::create([
                'name' => $language,
            ]);
        }
    }
}
