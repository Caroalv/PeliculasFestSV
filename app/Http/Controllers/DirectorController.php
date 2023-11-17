<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::all();
        return view('directors.index', compact('directors'));
    }

    public function create()
    {
        return view('directors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Director::create($request->all());

        return redirect()->route('directors.index')->with('success', 'Director creado correctamente.');
    }

    public function show($id)
    {
        $director = Director::findOrFail($id);
        return view('directors.show', compact('director'));
    }

    public function edit($id)
    {
        $director = Director::findOrFail($id);
        return view('directors.edit', compact('director'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $director = Director::findOrFail($id);
        $director->update($request->all());

        return redirect()->route('directors.index')->with('success', 'Director actualizado correctamente.');
    }

    public function destroy($id)
    {
        $director = Director::findOrFail($id);
        $director->delete();

        return redirect()->route('directors.index')->with('success', 'Director eliminado correctamente.');
    }
}
