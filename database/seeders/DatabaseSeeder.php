<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

use App\Movie;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private function seedUsers(){
        // Borramos los datos de la tabla
        DB::table('users')->delete();
        // Añadimos una entrada a esta tabla
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
    private $arrayPeliculas = array(
        array(
            'title' => 'El Padrino',
            'gender' => 'Drama/Crimen',
            'year' => '1972',
            'classification' => '18',
            'director' => 'Francis Ford Coppola',
            'poster' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq_qdHarij8GQCHNSwTp-EefWqC-q-QjdFLw&usqp=CAU',
            'rented' => false,
            'synopsis' => 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de Il consigliere Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/v72XprPxy3E?si=a0cB3b7ZyQAljZdt'            
        )
        
    );

    private function seedCatalog(){
        DB::table('movies')->delete();
        foreach( $this->arrayPeliculas as $pelicula ) {
            $p = new Movie;
            $p->title = $pelicula['title'];
            $p->gender = $pelicula['gender'];
            $p->year = $pelicula['year'];
            $p->classification = $pelicula['classification'];
            $p->director = $pelicula['director'];
            $p->poster = $pelicula['poster'];
            $p->rented = $pelicula['rented'];
            $p->synopsis = $pelicula['synopsis'];
            $p->original_language = $pelicula['original_language'];
            $p->movie_url = $pelicula['movie_url'];
            $p->save();
        }
    }

    public function run(){
        self::seedUsers();
        $this->command->info('Tabla usuarios fue inicializada con datos');
        self::seedCatalog();
        $this->command->info('Tabla catálogo inicializada con datos!');
        
        // $this->call(UsersTableSeeder::class);

    }
}   
