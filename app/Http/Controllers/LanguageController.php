<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    public function create()
    {
        return view('languages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Language::create($request->all());

        return redirect()->route('languages.index')->with('success', 'Idioma creado correctamente.');
    }

    public function show($id)
    {
        $language = Language::findOrFail($id);
        return view('languages.show', compact('language'));
    }

    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('languages.edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $language = Language::findOrFail($id);
        $language->update($request->all());

        return redirect()->route('languages.index')->with('success', 'Idioma actualizado correctamente.');
    }

    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->route('languages.index')->with('success', 'Idioma eliminado correctamente.');
    }
}
