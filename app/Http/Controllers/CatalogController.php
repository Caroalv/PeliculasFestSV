<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Movie;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    // Array de películas (no utilizado en el código actual)
    private $arrayPeliculas = array(
        array(
            // Detalles de una película
            'title' => 'El padrino',
            'gender' => 'Accion',
            'year' => '1972',
            'classification' => '18',
            'director' => 'Francis Ford Coppola',
            'poster' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq_qdHarij8GQCHNSwTp-EefWqC-q-QjdFLw&usqp=CAU',
            'rented' => false,
            'synopsis' => 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York...',
            'original_language' => 'Italiano',
            'movie_url' => 'https://youtu.be/v72XprPxy3E?si=a0cB3b7ZyQAljZdt'
        )
    );

    // Método para crear una película
    public function postCreate(Request $data){
        Movie::create([
            'title' => $data['title'],
            'gender' => $data['gender'],
            'year' => $data['year'],
            'classification' => $data['classification'],
            'director' => $data['director'],
            'poster' => $data['poster'],
            'synopsis' => $data['synopsis'],
            'country' => $data['country'],
            'original_language' => $data['original_language'],
            'movie_url' => $data['movie_url'],
            'rented' => false
        ]);

        // Redirige a la página principal del catálogo después de crear la película
        return $this->getIndex();
    }

    // Método para editar una película
    public function edit(Request $request, $id){
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->gender = $request->input('gender');
        $movie->year = $request->input('year');
        $movie->classification = $request->input('classification');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->country = $request->input('country');
        $movie->original_language = $request->input('original_language');
        $movie->movie_url = $request->input('movie_url');
        $movie->save();
        // Redirige a la página de detalles de la película después de editar
        return redirect()->route('catalog.show', ['id' => $id]);
    }

    // Método para obtener todas las películas y mostrarlas en la vista principal
    public function getIndex(){
        $peliculas = Movie::all();
        return view('catalog.index', array('peliculas' => $peliculas));
    }

    // Método para mostrar los detalles de una película específica
    public function getShow($id){
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', array('pelicula' => $pelicula));
    }

    // Método para mostrar la vista de creación de una película
    public function getCreate(){
        return view('catalog.create');
    }

    // Método para mostrar la vista de edición de una película
    public function getEdit($id){
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array('pelicula' => $pelicula));
    }

    // Método para cambiar el estado de alquiler de una película a true
    public function putRent($id)
    {
        $movie = Movie::findOrFail( $id );
        $movie->rented = true;
        $movie->save();
        return view('catalog.show', array( 'pelicula' => $movie));
    }

    // Método para cambiar el estado de alquiler de una película a false
    public function putReturn($id)
    {
        $movie = Movie::findOrFail( $id );
        $movie->rented = false;
        $movie->save();
        return view('catalog.show', array( 'pelicula' => $movie));
    }

    // Método para eliminar una película de la base de datos
    public function deleteMovie($id)
    {
        $movie = Movie::findOrFail( $id );
        $movie->delete();
        return $this->getIndex();
    }

    // Método para listar todas las películas
    public function listarPeliculas()
    {
        $movies = Movie::all(); 
        return view('catalog.lista', ['peliculas' => $movies]); 
    }

    // Método para mostrar estadísticas en una vista de gráficos
    public function mostrarGrafico()
    {
        $alquiladas = Movie::where('rented', true)->count();
        $disponibles = Movie::where('rented', false)->count();
    
        $generos = Movie::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();
    
        $clasificacionPeliculas = Movie::select('classification', DB::raw('count(*) as cantidad'))
            ->groupBy('classification')
            ->get();
    
        return view('catalog.grafica', compact('alquiladas', 'disponibles', 'generos', 'clasificacionPeliculas'));
    }

    // Método para buscar películas por título
    public function buscarPeliculas(Request $request)
    {
        $query = $request->input('query');
        $peliculas = Movie::where('title', 'LIKE', "%$query%")->get();

        // Puedes pasar las películas encontradas a una vista
        return view('catalog.search', ['peliculas' => $peliculas]);
    }
}

