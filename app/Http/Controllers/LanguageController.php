<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    // Método para mostrar todos los idiomas
    public function index()
    {
        // Obtener todos los idiomas y mostrar la vista 'languages.index'
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    // Método para mostrar el formulario de creación de idioma
    public function create()
    {
        // Mostrar la vista 'languages.create'
        return view('languages.create');
    }

    // Método para almacenar un nuevo idioma
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Crear un nuevo idioma con los datos de la solicitud
        Language::create($request->all());

        // Redirigir a la vista de index de idiomas con un mensaje de éxito
        return redirect()->route('languages.index')->with('success', 'Idioma creado correctamente.');
    }

    // Método para mostrar detalles de un idioma
    public function show($id)
    {
        // Obtener el idioma por su ID y mostrar la vista 'languages.show'
        $language = Language::findOrFail($id);
        return view('languages.show', compact('language'));
    }

    // Método para mostrar el formulario de edición de un idioma
    public function edit($id)
    {
        // Obtener el idioma por su ID y mostrar la vista 'languages.edit'
        $language = Language::findOrFail($id);
        return view('languages.edit', compact('language'));
    }

    // Método para actualizar un idioma existente
    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Obtener el idioma por su ID, actualizar con los datos de la solicitud y guardar
        $language = Language::findOrFail($id);
        $language->update($request->all());

        // Redirigir a la vista de index de idiomas con un mensaje de éxito
        return redirect()->route('languages.index')->with('success', 'Idioma actualizado correctamente.');
    }

    // Método para eliminar un idioma
    public function destroy($id)
    {
        // Obtener el idioma por su ID y eliminar
        $language = Language::findOrFail($id);
        $language->delete();

        // Redirigir a la vista de index de idiomas con un mensaje de éxito
        return redirect()->route('languages.index')->with('success', 'Idioma eliminado correctamente.');
    }
}
