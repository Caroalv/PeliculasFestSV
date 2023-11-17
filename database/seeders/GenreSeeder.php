<?php

namespace Database\Seeders;

use App\Models\Genre; // Importa el modelo Genre para interactuar con la tabla 'genres'
use Illuminate\Database\Seeder; // Importa la clase Seeder para la creación de semillas (seeds)

class GenreSeeder extends Seeder
{
    public function run()
    {
        // Lista de géneros para poblar la tabla 'genres'
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

        // Itera sobre la lista de géneros y crea una entrada en la tabla 'genres' para cada uno
        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre,
            ]);
        }
    }
}
