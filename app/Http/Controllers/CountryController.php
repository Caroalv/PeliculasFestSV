<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    // Método para mostrar todos los países
    public function index()
    {
        // Obtener todos los países y mostrar la vista 'countries.index'
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    // Método para mostrar el formulario de creación de país
    public function create()
    {
        // Mostrar la vista 'countries.create'
        return view('countries.create');
    }

    // Método para almacenar un nuevo país
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Crear un nuevo país con los datos de la solicitud
        Country::create($request->all());

        // Redirigir a la vista de index de países con un mensaje de éxito
        return redirect()->route('countries.index')->with('success', 'País creado exitosamente.');
    }

    // Método para mostrar detalles de un país
    public function show($id)
    {
        // Obtener el país por su ID y mostrar la vista 'countries.show'
        $country = Country::findOrFail($id);
        return view('countries.show', compact('country'));
    }

    // Método para mostrar el formulario de edición de un país
    public function edit($id)
    {
        // Obtener el país por su ID y mostrar la vista 'countries.edit'
        $country = Country::findOrFail($id);
        return view('countries.edit', compact('country'));
    }

    // Método para actualizar un país existente
    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Obtener el país por su ID, actualizar con los datos de la solicitud y guardar
        $country = Country::findOrFail($id);
        $country->update($request->all());

        // Redirigir a la vista de index de países con un mensaje de éxito
        return redirect()->route('countries.index')->with('success', 'País actualizado exitosamente.');
    }

    // Método para eliminar un país
    public function destroy($id)
    {
        // Obtener el país por su ID y eliminar
        $country = Country::findOrFail($id);
        $country->delete();

        // Redirigir a la vista de index de países con un mensaje de éxito
        return redirect()->route('countries.index')->with('success', 'País eliminado exitosamente.');
    }
}
