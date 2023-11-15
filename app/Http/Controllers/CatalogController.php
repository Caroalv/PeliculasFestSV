<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Director;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function postCreate(Request $data)
    {
        Movie::create([
            'title' => $data['title'],
            'genre_id' => $data['genre_id'],
            'year' => $data['year'],
            'classification' => $data['classification'],
            'director_id' => $data['director_id'], // Asegúrate de incluir el valor para director_id
            'poster' => $data['poster'],
            'synopsis' => $data['synopsis'],
            'country_id' => $data['country_id'],
            'language_id' => $data['language_id'],
            'movie_url' => $data['movie_url'],
            'rented' => false
        ]);
    
        return $this->getIndex();
    }
    
    
    
    public function edit(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
    
        $movie->title = $request->input('title');
        $movie->genre_id = $request->input('genre_id');
        $movie->year = $request->input('year');
        $movie->classification = $request->input('classification');
        $movie->director_id = $request->input('director_id'); // Asegúrate de incluir el valor para director_id
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->country_id = $request->input('country_id');
        $movie->language_id = $request->input('language_id');
        $movie->movie_url = $request->input('movie_url');
        $movie->save();
    
        return redirect()->route('catalog.show', ['id' => $id]);
    }
    
    

        public function getIndex(){
            $peliculas = Movie::all();
            $genres = Genre::all();
            $countries = Country::all();
            $directors = Director::all();
            $languages = Language::all();
        
            return view('catalog.index', compact('peliculas', 'genres', 'countries', 'directors', 'languages'));
        }
        
        
        public function getShow($id){
            try {
                $pelicula = Movie::findOrFail($id);
                return view('catalog.show', compact('pelicula'));
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                // Manejar el caso en que la película no es encontrada
                // Puedes redirigir al usuario o mostrar un mensaje de error
                return redirect()->route('catalog.index')->with('error', 'Película no encontrada.');
            }
        }
        

    public function getCreate(){
        $genres = Genre::all();
        $countries = Country::all();
        $directors = Director::all();
        $languages = Language::all();
    
        return view('catalog.create', compact('genres', 'countries', 'directors', 'languages'));
    }
    


    public function getEdit($id){
        $pelicula = Movie::findOrFail($id);
        $directors = Director::all(); // Obtén la lista de directores
        $genres = Genre::all(); // Obtén la lista de géneros
        $countries = Country::all(); // Obtén la lista de países
        $languages = Language::all(); // Obtén la lista de idiomas
    
        return view('catalog.edit', compact('pelicula', 'directors', 'genres', 'countries', 'languages'));
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

    public function listarPeliculas()
    {
        $movies = Movie::all(); // Cambiado de $movie a $movies
        return view('catalog.lista', ['peliculas' => $movies]); // Cambiado de 'pelicula' a 'peliculas'
    }

    public function mostrarGrafico()
    {
        $alquiladas = Movie::where('rented', true)->count();
        $disponibles = Movie::where('rented', false)->count();

    
        $clasificacionPeliculas = Movie::select('classification', DB::raw('count(*) as cantidad'))
            ->groupBy('classification')
            ->get();
    
        return view('catalog.grafica', compact('alquiladas', 'disponibles', 'clasificacionPeliculas'));
    }
    
    




        public function buscarPeliculas(Request $request)
    {
        $query = $request->input('query');
        $peliculas = Movie::where('title', 'LIKE', "%$query%")->get();

        // Puedes pasar las películas encontradas a una vista
        return view('catalog.search', ['peliculas' => $peliculas]);
    }


  

}