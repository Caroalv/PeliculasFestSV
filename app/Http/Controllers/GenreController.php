<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    // Método para mostrar todos los géneros
    public function index()
    {
        // Obtener todos los géneros y mostrar la vista 'genres.index'
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    // Método para mostrar el formulario de creación de género
    public function create()
    {
        // Mostrar la vista 'genres.create'
        return view('genres.create');
    }

    // Método para almacenar un nuevo género
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Crear un nuevo género con los datos de la solicitud
        Genre::create($request->all());

        // Redirigir a la vista de index de géneros con un mensaje de éxito
        return redirect()->route('genres.index')->with('success', 'Género creado correctamente.');
    }

    // Método para mostrar detalles de un género
    public function show($id)
    {
        // Obtener el género por su ID y mostrar la vista 'genres.show'
        $genre = Genre::findOrFail($id);
        return view('genres.show', compact('genre'));
    }

    // Método para mostrar el formulario de edición de un género
    public function edit($id)
    {
        // Obtener el género por su ID y mostrar la vista 'genres.edit'
        $genre = Genre::findOrFail($id);
        return view('genres.edit', compact('genre'));
    }

    // Método para actualizar un género existente
    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Obtener el género por su ID, actualizar con los datos de la solicitud y guardar
        $genre = Genre::findOrFail($id);
        $genre->update($request->all());

        // Redirigir a la vista de index de géneros con un mensaje de éxito
        return redirect()->route('genres.index')->with('success', 'Género actualizado correctamente.');
    }

    // Método para eliminar un género
    public function destroy($id)
    {
        // Obtener el género por su ID y eliminar
        $genre = Genre::findOrFail($id);
        $genre->delete();

        // Redirigir a la vista de index de géneros con un mensaje de éxito
        return redirect()->route('genres.index')->with('success', 'Género eliminado correctamente.');
    }
}
