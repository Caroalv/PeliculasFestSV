<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Country::create($request->all());

        return redirect()->route('countries.index')->with('success', 'País creado exitosamente.');
    }

    public function show($id)
    {
        $country = Country::findOrFail($id);
        return view('countries.show', compact('country'));
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $country = Country::findOrFail($id);
        $country->update($request->all());

        return redirect()->route('countries.index')->with('success', 'País actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return redirect()->route('countries.index')->with('success', 'País eliminado exitosamente.');
    }
}
