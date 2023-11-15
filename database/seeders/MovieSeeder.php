<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Country;
use App\Models\Language;
use App\Models\Director;
use App\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
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
        ),
        
        array(
            'title' => 'Spider-Man: Lejos de Casa',
            'gender' => 'Acción/Aventura',
            'year' => '2019',
            'classification' => '12A',
            'director' => 'Jon Watts',
            'poster' => 'https://play-lh.googleusercontent.com/JusxG5ceS8fWzfG1fC4LNyjE2TI4Z98f2xa8aQG3qMCtYIKWqHTfBjmJQaydf7Rnfn7qcN1w5sArwqIjBqym=w240-h480-rw',
            'rented' => false,
            'synopsis' => 'Peter Parker se va de vacaciones a Europa con sus amigos, pero su descanso se ve interrumpido cuando Nick Fury lo recluta para una misión urgente. Debe enfrentarse a nuevas amenazas, como Mysterio, y descubrir el misterio detrás de los Elementales.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/_CazeprALO8'
        ),
    
        array(
            'title' => 'Transformers: El Lado Oscuro de la Luna',
            'gender' => 'Acción/Ciencia ficción',
            'year' => '2011',
            'classification' => '12A',
            'director' => 'Michael Bay',
            'poster' => 'https://i.blogs.es/21972d/transformers-lado-oscuro-luna-poster/1366_2000.jpg',
            'rented' => false,
            'synopsis' => 'Los Autobots y Decepticons se ven involucrados en una carrera espacial entre Estados Unidos y la Unión Soviética, y descubren la verdad sobre la misión Apolo 11 en la luna. Mientras tanto, Sam Witwicky se encuentra en medio de la lucha entre los dos grupos de robots.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/znmSDttImkI'
        ),
    
        array(
            'title' => 'El Señor de los Anillos: El Retorno del Rey',
            'gender' => 'Aventura/Fantasía',
            'year' => '2003',
            'classification' => '12A',
            'director' => 'Peter Jackson',
            'poster' => 'https://m.media-amazon.com/images/I/71Xle4-8u+L._AC_SL1000_.jpg',
            'rented' => false,
            'synopsis' => 'La batalla final por la Tierra Media se desencadena cuando Frodo y Sam llegan al Monte del Destino para destruir el Anillo Único. Mientras tanto, Aragorn lidera las fuerzas de Gondor en una lucha desesperada contra Sauron.',
            'country' => 'Nueva Zelanda',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/h-9RYiqyqjk'
        ),
    
        array(
            'title' => 'Capitán América: Civil War',
            'gender' => 'Acción/Aventura',
            'year' => '2016',
            'classification' => '12A',
            'director' => 'Anthony Russo, Joe Russo',
            'poster' => 'https://im.ziffdavisinternational.com/ign_es/screenshot/default/cpkf2a1_zrhc.jpg',
            'rented' => false,
            'synopsis' => 'Tras un incidente internacional que involucra a los Vengadores, el gobierno de los Estados Unidos decide supervisar y controlar las actividades de los superhéroes. Esto lleva a una fractura en el equipo, con Capitán América liderando una facción y Iron Man liderando la otra.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/LuOLcuKVFwY'
        ),
    
        array(
            'title' => 'Los Minions',
            'gender' => 'Animación/Comedia',
            'year' => '2015',
            'classification' => 'PG',
            'director' => 'Kyle Balda, Pierre Coffin',
            'poster' => 'https://i.pinimg.com/736x/77/37/8f/77378ff26cc6707fbe5a97e331771258.jpg',
            'rented' => false,
            'synopsis' => 'Los Minions son seres amarillos que existen desde el principio de los tiempos y buscan al amo más despreciable para servirlo. En la década de 1960, se unen a Scarlet Overkill, una supervillana que planea robar la corona de Inglaterra.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/vzWZWI2UNpA'
        ),
    
        array(
            'title' => 'Iron Man 3',
            'gender' => 'Acción/Ciencia ficción',
            'year' => '2013',
            'classification' => '12A',
            'director' => 'Shane Black',
            'poster' => 'https://cdn.europosters.eu/image/750webp/14496.webp',
            'rented' => false,
            'synopsis' => 'Tony Stark, también conocido como Iron Man, se enfrenta a un enemigo cuyo poder no conoce límites. Debe utilizar su ingenio y su ingenio para proteger a su ser querido y enfrentar a un enemigo que conoce todos sus secretos.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/6Cl8PmVm3YE'
        ),
    
        array(
            'title' => 'Fast & Furious 8',
            'gender' => 'Acción',
            'year' => '2017',
            'classification' => '12A',
            'director' => 'F. Gary Gray',
            'poster' => 'https://es.web.img3.acsta.net/r_1920_1080/pictures/17/03/27/09/49/121118.jpg',
            'rented' => false,
            'synopsis' => 'La familia de Dom Toretto se enfrenta a un enemigo inesperado cuando Dom se une a Cipher, una mujer criminal que lo chantajea para que traicione a sus amigos. La lealtad y la velocidad son puestas a prueba en esta emocionante aventura.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/BLKaI3D9P2E'
        ),
    
        array(
            'title' => 'Los Increíbles 2',
            'gender' => 'Animación/Acción',
            'year' => '2018',
            'classification' => 'PG',
            'director' => 'Brad Bird',
            'poster' => 'https://http2.mlstatic.com/D_NQ_NP_881191-MLA28573952667_112018-O.webp',
            'rented' => false,
            'synopsis' => 'Los superhéroes de la familia Parr regresan a la acción cuando Helen Parr (Elastigirl) es reclutada para una misión especial, dejando a Bob Parr (Mr. Incredible) en casa para cuidar a los niños. Juntos, enfrentarán a un nuevo villano.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/92iqVqYGpxo'
        ),
        array(
            'title' => 'Jurassic World: El Reino Caído',
            'gender' => 'Acción/Aventura',
            'year' => '2018',
            'classification' => '12A',
            'director' => 'J.A. Bayona',
            'poster' => 'https://www.mubis.es/media/users/3724/194664/jurassic-world-el-reino-caido-fan-poster-l_cover.jpg',
            'rented' => false,
            'synopsis' => 'Cuando el volcán de la isla Nublar entra en erupción, Owen y Claire regresan para rescatar a los dinosaurios restantes de la extinción. Sin embargo, descubren una conspiración que podría amenazar a toda la humanidad.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/Pbxxz5uytCo'
        ),
    
        array(
            'title' => 'Star Wars: Episodio VIII - Los últimos Jedi',
            'gender' => 'Ciencia ficción/Aventura',
            'year' => '2017',
            'classification' => '12A',
            'director' => 'Rian Johnson',
            'poster' => 'https://img.fruugo.com/product/8/71/63842718_max.jpg',
            'rented' => false,
            'synopsis' => 'Rey busca la ayuda de Luke Skywalker para aprender a controlar la Fuerza, mientras la Resistencia lucha contra la Primera Orden. Secretos del pasado se revelan en una épica batalla entre el bien y el mal.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/anOJjqQb8x0'
        ),
    
        array(
            'title' => 'Harry Potter y las reliquias de la muerte: parte 2',
            'gender' => 'Aventura/Fantasía',
            'year' => '2011',
            'classification' => '12A',
            'director' => 'David Yates',
            'poster' => 'https://www.themoviedb.org/t/p/original/aM1TuUiPtV8OAZyu61CTdy9Ymtk.jpg',
            'rented' => false,
            'synopsis' => 'Harry, Ron y Hermione continúan su búsqueda de los Horrocruxes de Voldemort para destruirlo. La batalla final se avecina en Hogwarts, donde el bien y el mal se enfrentan en una lucha épica.',
            'country' => 'Reino Unido',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/HguSMW8XveQ'
        ),
    
        array(
            'title' => 'Black Panther',
            'gender' => 'Acción/Aventura',
            'year' => '2018',
            'classification' => '12A',
            'director' => 'Ryan Coogler',
            'poster' => 'https://www.cuartomundo.cl/wp-content/uploads/2018/02/black-panther-poster-oficial.jpg',
            'rented' => false,
            'synopsis' => 'T Challa, el rey de Wakanda, debe asumir el trono y enfrentar amenazas tanto desde dentro como desde fuera de su país. Black Panther debe proteger a su nación y su legado como superhéroe.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/JK-wAfAvJ0g'
        ),
    
        array(
            'title' => 'Frozen 2',
            'gender' => 'Animación/Aventura',
            'year' => '2019',
            'classification' => 'PG',
            'director' => 'Chris Buck, Jennifer Lee',
            'poster' => 'https://i.ebayimg.com/images/g/3rIAAOSwaE1fjorN/s-l1600.jpg',
            'rented' => false,
            'synopsis' => 'Elsa, Anna y sus amigos se aventuran en un bosque encantado para descubrir el origen de los poderes de Elsa y salvar su reino. En el camino, enfrentan desafíos y descubrimientos sorprendentes.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/I-oJ5QjrX9M'
        ),
    
        array(
            'title' => 'Top Gun: Maverick',
            'gender' => 'Acción/Drama',
            'year' => '2022',
            'classification' => '12A',
            'director' => 'Joseph Kosinski',
            'poster' => 'https://www.movieposters.com/cdn/shop/products/top_gun_maverick_ver2_480x.progressive.jpg?v=1578430896',
            'rented' => false,
            'synopsis' => 'El Capitán Pete "Maverick" Mitchell se enfrenta a un mundo de combate aéreo cada vez más tecnológico, mientras entrena a una nueva generación de pilotos de combate. Se enfrenta a desafíos personales y profesionales.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/zmFdhZ6gyUM'
        ),
    
        array(
            'title' => 'Los Vengadores',
            'gender' => 'Acción/Aventura',
            'year' => '2012',
            'classification' => '12A',
            'director' => 'Joss Whedon',
            'poster' => 'https://cinembrollos.files.wordpress.com/2012/03/avengers_ver26_xlg.jpg?w=768&h=1087',
            'rented' => false,
            'synopsis' => 'Nick Fury reúne a un grupo de superhéroes, Los Vengadores, para enfrentarse a la amenaza de Loki y su ejército. Los héroes más poderosos de la Tierra se unen en una batalla épica.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/HQIyqOVTWo'
        ),
    
        array(
            'title' => 'El Rey León',
            'gender' => 'Animación/Aventura',
            'year' => '2019',
            'classification' => 'PG',
            'director' => 'Jon Favreau',
            'poster' => 'https://hips.hearstapps.com/hmg-prod/images/rey-leon-poster-1551063927.jpeg?resize=2048:*',
            'rented' => false,
            'synopsis' => 'El joven león Simba debe enfrentar su destino y reclamar su lugar como rey de la Sabana, después de ser exiliado por su tío Scar. Una aventura épica de autodescubrimiento y coraje.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/7rxwEfFMbaY'
        ),
    
        array(
            'title' => 'Jurassic World',
            'gender' => 'Acción/Aventura',
            'year' => '2015',
            'classification' => '12A',
            'director' => 'Colin Trevorrow',
            'poster' => 'https://i.pinimg.com/564x/a4/80/06/a4800605a7f3f2373031c10f872a807d.jpg',
            'rented' => false,
            'synopsis' => 'En el parque temático Jurassic World, los dinosaurios son una realidad. Pero cuando un dinosaurio modificado genéticamente escapa, el caos se desata y las vidas están en peligro.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/W5sk3lZULU4'
        ),
    
        array(
            'title' => 'Vengadores: Infinity War',
            'gender' => 'Acción/Aventura',
            'year' => '2018',
            'classification' => '12A',
            'director' => 'Anthony Russo, Joe Russo',
            'poster' => 'https://www.cinemascomics.com/wp-content/uploads/2018/03/nuevo-poster-oficial-marvel-studios-vengadores-infinity-war.jpg.webp',
            'rented' => false,
            'synopsis' => 'Thanos, el titán loco, busca las Gemas del Infinito para llevar a cabo su plan de destrucción. Los Vengadores y sus aliados deben unirse para detenerlo y salvar el universo.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/-f5PwE_Q8Fs'
        ),
    
        array(
            'title' => 'Titanic',
            'gender' => 'Drama/Romance',
            'year' => '1997',
            'classification' => '12A',
            'director' => 'James Cameron',
            'poster' => 'https://m.media-amazon.com/images/I/71ZJ8am0mKL._AC_SY879_.jpg',
            'rented' => false,
            'synopsis' => 'En su viaje inaugural, el RMS Titanic choca con un iceberg y se hunde en el Atlántico Norte. La historia de amor entre Jack y Rose se desarrolla en medio de la tragedia.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/FiRVcExwBVA'
        ),
    
        array(
            'title' => 'Avatar',
            'gender' => 'Ciencia ficción/Aventura',
            'year' => '2009',
            'classification' => '12A',
            'director' => 'James Cameron',
            'poster' => 'https://m.media-amazon.com/images/I/61OtW2-WU+L._AC_SX679_.jpg',
            'rented' => false,
            'synopsis' => 'En el planeta Pandora, los humanos explotan los recursos naturales mientras los nativos Na vi luchan por proteger su hogar. Un ex-marine se encuentra en medio de este conflicto y debe elegir un bando.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/qZAC7c3nBfY'
        ),
        array(
            'title' => 'La Bella y la Bestia',
            'gender' => 'Fantasía/Musical',
            'year' => '2017',
            'classification' => 'PG',
            'director' => 'Bill Condon',
            'poster' => 'https://i.pinimg.com/564x/d1/66/e2/d166e2ab327b51e2ed55d6a40c3a32a3.jpg',
            'rented' => false,
            'synopsis' => 'Bella, una joven brillante y apasionada por los libros, es tomada prisionera por una bestia en su castillo. A medida que conoce a los encantados objetos y descubre el pasado de la bestia, se desarrolla un inesperado romance.',
            'country' => 'Estados Unidos',
            'original_language' => 'Inglés',
            'movie_url' => 'https://youtu.be/XpMjfUJ1lUc'
        )


        
    );

    public function run()
    {
        $this->seedCatalog();
    }

    private function seedCatalog()
    {
        DB::table('movies')->delete();

        foreach ($this->arrayPeliculas as $pelicula) {
            $genre = Genre::firstOrCreate(['name' => $pelicula['gender']]);
            $country = Country::firstOrCreate(['name' => $pelicula['country']]);
            $language = Language::firstOrCreate(['name' => $pelicula['original_language']]);
            $director = Director::firstOrCreate(['name' => $pelicula['director']]);

            $p = new Movie;
            $p->title = $pelicula['title'];
            $p->year = $pelicula['year'];
            $p->classification = $pelicula['classification'];
            $p->poster = $pelicula['poster'];
            $p->rented = $pelicula['rented'];
            $p->synopsis = $pelicula['synopsis'];
            $p->movie_url = $pelicula['movie_url'];

            // Asignar las relaciones
            $p->genre()->associate($genre);
            $p->country()->associate($country);
            $p->language()->associate($language);
            $p->director()->associate($director);

            $p->save();
        }
    }
}
