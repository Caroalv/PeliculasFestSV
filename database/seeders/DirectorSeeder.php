<?php

namespace Database\Seeders;

use App\Models\Director;
use Illuminate\Database\Seeder;

class DirectorSeeder extends Seeder
{
    public function run()
    {
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

        foreach ($directors as $director) {
            Director::create([
                'name' => $director,
            ]);
        }
    }
}
