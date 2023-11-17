<?php

namespace Database\Seeders;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            'Acción',
            'Comedia',
            'Drama',
            'Ciencia Ficción',
            'Aventura',
            'Romance',
            'Fantasía',
            'Suspenso',
            'Terror',
            'Documental',
            // Agrega más géneros según sea necesario
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre,
            ]);
        }
    }
}
