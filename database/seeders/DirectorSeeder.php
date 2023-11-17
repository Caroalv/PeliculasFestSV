<?php

namespace Database\Seeders;

use App\Models\Director; // Importa el modelo Director para interactuar con la tabla 'directors'
use Illuminate\Database\Seeder; // Importa la clase Seeder para la creación de semillas (seeds)

class DirectorSeeder extends Seeder
{
    public function run()
    {
        // Lista de directores para poblar la tabla 'directors'
        $directors = [
            'Francis Ford Coppola',
            'Roberto Benigni',
            'Hayao Miyazaki',
            'Jon Watts',
            'Michael Bay',
            'Peter Jackson',
            'Anthony Russo, Joe Russo',
            'Kyle Balda, Pierre Coffin',
            'Shane Black',
            'F. Gary Gray',
            'Brad Bird',
            'J.A. Bayona',
            'Rian Johnson',
            'David Yates',
            'Ryan Coogler',
            'Chris Buck, Jennifer Lee',
            'Joseph Kosinski',
            'Joss Whedon',
            'Jon Favreau',
            'Colin Trevorrow',
            'Anthony Russo, Joe Russo',
            'James Cameron',
            'James Cameron',
            'Bill Condon'
        ];

        // Itera sobre la lista de directores y crea una entrada en la tabla 'directors' para cada uno
        foreach ($directors as $director) {
            Director::create([
                'name' => $director,
            ]);
        }
    }
}
