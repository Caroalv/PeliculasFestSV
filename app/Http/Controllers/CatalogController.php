<?php

namespace App\Http\Controllers;

use App\Movie;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    private $arrayPeliculas = array(
        array(
            'title' => 'El padrino', 
            'year' => '1972',
            'director' => 'Francis Ford Coppola',
            'poster' => 'http://ia.media-imdb.com/images/M/MV5BMjEyMjcyNDI4MF5BMl5BanBnXkFtZTcwMDA5Mzg3OA@@._V1_SX214_AL_.jpg',
            'rented' => false,
            'synopsis' => 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.',
            'movie_url' => 'https://youtu.be/v72XprPxy3E?si=a0cB3b7ZyQAljZdt'
            )
    );
    public function postCreate(Request $data){
        Movie::create([
            'title' => $data['title'],
            'year' => $data['year'],
            'director' => $data['director'], // Campo añadido
            'poster' => $data['poster'],
            'synopsis' => $data['synopsis'],
            'movie_url' => $data['movie_url'],
            'rented' => false
            ]);
            // $movie = new Movie;
            // dd($movie);
            // $movie->title = $request->input('title');
            // $movie->year = $request->input('year');
            // $movie->director = $request->input('director');
            // $movie->poster = $request->input('poster');
            // $movie->synopsis = $request->input('synopsis');
            // $movie->save();
            return $this->getIndex();
    }
    public function edit(Request $request, $id){
        $movie=Movie::findOrFail($id);
       // dd($movie);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->movie_url = $request->input('movie_url');
        $movie->save();
       // return view('catalog.index');
       return redirect()->route('catalog.show', ['id' => $id]);
        }

    public function getIndex(){
        $peliculas=Movie::all();
        //dd($arrayPeliculas);
        return view('catalog.index', array( 'peliculas' => $peliculas));
    }

    public function getShow($id){
        $pelicula=Movie::findOrFail($id);
        return view('catalog.show',array( 'pelicula' => $pelicula));

    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit($id){
        $pelicula=Movie::findOrFail($id);
        return view('catalog.edit', array('pelicula'=>$pelicula));
    }
    
    public function putRent($id)
    {
        $movie = Movie::findOrFail( $id );
        $movie->rented = true;
        $movie->save();
        return view('catalog.show',array( 'pelicula' => $movie));
    }
    public function putReturn($id)
    {
        $movie = Movie::findOrFail( $id );
        $movie->rented = false;
        $movie->save();
        return view('catalog.show',array( 'pelicula' => $movie));
    }
    public function deleteMovie($id)
    {
        $movie = Movie::findOrFail( $id );
        $movie->delete();
        return $this->getIndex();
    }


}

