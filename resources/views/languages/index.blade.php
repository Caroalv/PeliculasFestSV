@extends('layouts.master')

@section('title', 'Lista de Idiomas')

@section('content')
    <h1>Lista de Idiomas</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
                <tr>
                    <td>{{ $language->id }}</td>
                    <td>{{ $language->name }}</td>
                    <td>
                        <a href="{{ route('languages.show', ['language' => $language->id]) }}" class="btn btn-primary">Ver</a>
                        @if(auth()->user()->hasRole('admin'))
                        <a href="{{ route('languages.edit', ['language' => $language->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('languages.destroy', ['language' => $language->id]) }}" method="POST" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if(auth()->user()->hasRole('admin'))
    <a href="{{ route('languages.create') }}" class="btn btn-success">Crear Nuevo Idioma</a>
    @endif
@endsection
