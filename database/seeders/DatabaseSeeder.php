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
            'classification' => '+18',
            'director' => 'Francis Ford Coppola',
            'poster' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq_qdHarij8GQCHNSwTp-EefWqC-q-QjdFLw&usqp=CAU',
            'rented' => false,
            'synopsis' => 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de Il consigliere Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/v72XprPxy3E?si=a0cB3b7ZyQAljZdt'            
        ),

        array(
            'title' => 'La Vida es Bella',
            'gender' => 'Comedia/Drama',
            'year' => '1997',
            'classification' => 'PG',
            'director' => 'Roberto Benigni',
            'poster' => 'https://th.bing.com/th/id/R.1d66ddea10a4065e951b719f844896fa?rik=Nwfa9lweyF2VnA&pid=ImgRaw&r=0',
            'rented' => false,
            'synopsis' => 'Guido, un judío italiano, se muda a la Toscana con la promesa de darle a su hijo una vida mejor. Juntos, enfrentan los horrores de un campo de concentración nazi mientras Guido utiliza su ingenio para proteger a su hijo de la dura realidad que los rodea.',
            'country' => 'Italia',
            'original_language' => 'Italiano',
            'movie_url' => 'https://youtu.be/s1DG6H_hc8E?si=fH4rwv6br0MtQBdM'
                
        ),

        array(
            'title' => 'El Viaje de Chihiro',
            'gender' => 'Animación/Fantasía',
            'year' => '2001',
            'classification' => 'PG',
            'director' => 'Hayao Miyazaki',
            'poster' => 'https://www.pelisxd.com/wp-content/uploads/2020/06/el-viaje-de-chihiro-26317-poster.jpg',
            'rented' => false,
            'synopsis' => 'La historia sigue a Chihiro, una niña que se encuentra atrapada en un mundo espiritual después de que sus padres sean transformados en cerdos. Chihiro debe buscar una forma de liberar a sus padres y regresar al mundo real, enfrentándose a numerosos desafíos y criaturas mágicas en el proceso.',
            'country' => 'Japon',
            'original_language' => 'Japonés',
            'movie_url' => 'https://youtu.be/ByXuk9QqQkk?si=x_CTVsW08KdEWjmx'
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
            $p->country = $pelicula['country'];
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
