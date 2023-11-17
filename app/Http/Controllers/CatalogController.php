<?php

namespace App\Http\Controllers; // Declara el namespace para los controladores en la aplicación

use App\Movie; // Importa el modelo Movie para su uso en el controlador
use App\Models\Genre; // Importa el modelo Genre para su uso en el controlador
use App\Models\Country; // Importa el modelo Country para su uso en el controlador
use App\Models\Director; // Importa el modelo Director para su uso en el controlador
use App\Models\Language; // Importa el modelo Language para su uso en el controlador
use Illuminate\Http\Request; // Importa la clase Request de Laravel para manejar solicitudes HTTP
use Illuminate\Support\Facades\DB; // Importa la fachada DB de Laravel para interactuar con la base de datos

class CatalogController extends Controller
{
    // Definición del namespace y uso de clases necesarias
    // para el controlador
    public function postCreate(Request $data)
    {
        // Crear una nueva película con los datos de la solicitud
        Movie::create([
            'title' => $data['title'],
            'genre_id' => $data['genre_id'],
            'year' => $data['year'],
            'classification' => $data['classification'],
            'director_id' => $data['director_id'],
            'poster' => $data['poster'],
            'synopsis' => $data['synopsis'],
            'country_id' => $data['country_id'],
            'language_id' => $data['language_id'],
            'movie_url' => $data['movie_url'],
            'rented' => false
        ]);

        // Crear una nueva solicitud y redirigir al método getIndex
        $request = new Request();
        return $this->getIndex($request);
    }

    // Editar una película existente
    public function edit(Request $request, $id)
    {
        // Obtener la película por su ID
        $movie = Movie::findOrFail($id);

        // Actualizar los atributos de la película con los datos de la solicitud
        $movie->title = $request->input('title');
        $movie->genre_id = $request->input('genre_id');
        $movie->year = $request->input('year');
        $movie->classification = $request->input('classification');
        $movie->director_id = $request->input('director_id');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->country_id = $request->input('country_id');
        $movie->language_id = $request->input('language_id');
        $movie->movie_url = $request->input('movie_url');
        $movie->save(); // Guardar la película actualizada

        // Redirigir a la vista de detalles de la película
        return redirect()->route('catalog.show', ['id' => $id]);
    }

    // Obtener y mostrar películas con filtros
    public function getIndex(Request $request)
    {
        // Iniciar una consulta para obtener películas
        $query = Movie::query();

        // Filtrar por categoría si se proporciona en la solicitud
        if ($request->filled('category')) {
            $query->whereHas('genre', function ($q) use ($request) {
                $q->where('name', $request->input('category'));
            });
        }

        // Filtrar por clasificación si se proporciona en la solicitud
        if ($request->filled('classification')) {
            $query->where('classification', $request->input('classification'));
        }

        // Obtener películas filtradas
        $peliculas = $query->get();
        $genres = Genre::all();
        $countries = Country::all();
        $directors = Director::all();
        $languages = Language::all();

        // Mostrar la vista 'catalog.index' con las películas y listas obtenidas
        return view('catalog.index', compact('peliculas', 'genres', 'countries', 'directors', 'languages'));
    }

    // Mostrar detalles de una película
    public function getShow($id)
    {
        try {
            // Obtener la película por su ID
            $pelicula = Movie::findOrFail($id);

            // Mostrar la vista 'catalog.show' con la película recuperada
            return view('catalog.show', compact('pelicula'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Manejar el caso en que la película no es encontrada
            return redirect()->route('catalog.index')->with('error', 'Película no encontrada.');
        }
    }

    // Mostrar formulario de creación de películas
    public function getCreate()
    {
        // Obtener listas de géneros, países, directores e idiomas
        $genres = Genre::all();
        $countries = Country::all();
        $directors = Director::all();
        $languages = Language::all();

        // Mostrar la vista 'catalog.create' con las listas obtenidas
        return view('catalog.create', compact('genres', 'countries', 'directors', 'languages'));
    }

    // Mostrar formulario de edición de una película
    public function getEdit($id)
    {
        // Obtener la película por su ID y listas de géneros, países, directores e idiomas
        $pelicula = Movie::findOrFail($id);
        $directors = Director::all();
        $genres = Genre::all();
        $countries = Country::all();
        $languages = Language::all();

        // Mostrar la vista 'catalog.edit' con la película y listas obtenidas
        return view('catalog.edit', compact('pelicula', 'directors', 'genres', 'countries', 'languages'));
    }

    // Cambiar el estado de alquiler de una película a alquilada
    public function putRent($id)
    {
        // Obtener la película por su ID
        $movie = Movie::findOrFail($id);

        // Cambiar el estado de alquiler y guardar
        $movie->rented = true;
        $movie->save();

        // Mostrar la vista 'catalog.show' con la película actualizada
        return view('catalog.show', ['pelicula' => $movie]);
    }

    // Cambiar el estado de alquiler de una película a disponible
    public function putReturn($id)
    {
        // Obtener la película por su ID
        $movie = Movie::findOrFail($id);

        // Cambiar el estado de alquiler y guardar
        $movie->rented = false;
        $movie->save();

        // Mostrar la vista 'catalog.show' con la película actualizada
        return view('catalog.show', ['pelicula' => $movie]);
    }

    // Eliminar una película
    public function deleteMovie($id)
    {
        // Obtener la película por su ID
        $movie = Movie::findOrFail($id);

        // Eliminar la película
        $movie->delete();

        // Crear una nueva solicitud y redirigir al método getIndex
        $request = new Request();
        return $this->getIndex($request);
    }

    // Listar todas las películas
    public function listarPeliculas()
    {
        // Obtener todas las películas
        $movies = Movie::all();

        // Mostrar la vista 'catalog.lista' con la lista de películas
        return view('catalog.lista', ['peliculas' => $movies]);
    }

    // Mostrar una gráfica con estadísticas de películas
    public function mostrarGrafico()
    {
        // Contar películas alquiladas y disponibles
        $alquiladas = Movie::where('rented', true)->count();
        $disponibles = Movie::where('rented', false)->count();

        // Obtener clasificación de películas por cantidad
        $clasificacionPeliculas = Movie::select('classification', DB::raw('count(*) as cantidad'))
            ->groupBy('classification')
            ->get();

        // Mostrar la vista 'catalog.grafica' con las estadísticas obtenidas
        return view('catalog.grafica', compact('alquiladas', 'disponibles', 'clasificacionPeliculas'));
    }

    // Buscar películas por título
    public function buscarPeliculas(Request $request)
    {
        // Obtener la consulta de búsqueda
        $query = $request->input('query');

        // Buscar películas por título
        $peliculas = Movie::where('title', 'LIKE', "%$query%")->get();

        // Mostrar la vista 'catalog.search' con las películas encontradas
        return view('catalog.search', ['peliculas' => $peliculas]);
    }
}
