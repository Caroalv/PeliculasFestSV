<?php

namespace App\Http\Controllers;
use App\Movie;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtén todas las películas con sus relaciones cargadas
        $peliculas = Movie::with(['director', 'genre', 'country', 'language'])->get();

        return view('home', compact('peliculas'));
    }
}
