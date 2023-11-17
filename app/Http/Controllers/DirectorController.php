<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    // Método para mostrar todos los directores
    public function index()
    {
        // Obtener todos los directores y mostrar la vista 'directors.index'
        $directors = Director::all();
        return view('directors.index', compact('directors'));
    }

    // Método para mostrar el formulario de creación de director
    public function create()
    {
        // Mostrar la vista 'directors.create'
        return view('directors.create');
    }

    // Método para almacenar un nuevo director
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Crear un nuevo director con los datos de la solicitud
        Director::create($request->all());

        // Redirigir a la vista de index de directores con un mensaje de éxito
        return redirect()->route('directors.index')->with('success', 'Director creado correctamente.');
    }

    // Método para mostrar detalles de un director
    public function show($id)
    {
        // Obtener el director por su ID y mostrar la vista 'directors.show'
        $director = Director::findOrFail($id);
        return view('directors.show', compact('director'));
    }

    // Método para mostrar el formulario de edición de un director
    public function edit($id)
    {
        // Obtener el director por su ID y mostrar la vista 'directors.edit'
        $director = Director::findOrFail($id);
        return view('directors.edit', compact('director'));
    }

    // Método para actualizar un director existente
    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Obtener el director por su ID, actualizar con los datos de la solicitud y guardar
        $director = Director::findOrFail($id);
        $director->update($request->all());

        // Redirigir a la vista de index de directores con un mensaje de éxito
        return redirect()->route('directors.index')->with('success', 'Director actualizado correctamente.');
    }

    // Método para eliminar un director
    public function destroy($id)
    {
        // Obtener el director por su ID y eliminar
        $director = Director::findOrFail($id);
        $director->delete();

        // Redirigir a la vista de index de directores con un mensaje de éxito
        return redirect()->route('directors.index')->with('success', 'Director eliminado correctamente.');
    }
}
