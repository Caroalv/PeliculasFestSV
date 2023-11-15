@extends('layouts.master')

@section('title', 'Lista de Idiomas')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Idiomas</h1>

        @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('languages.create') }}" class="btn btn-success">Crear Nuevo Idioma</a>
        @endif
    </div>

    @if($languages->isEmpty())
        <div class="alert alert-info" role="alert">
            No hay idiomas disponibles.
        </div>
    @else
        <table class="table table-bordered">
            <thead class="thead-dark">
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
                        <td class="d-flex">
                            <a href="{{ route('languages.show', ['language' => $language->id]) }}" class="btn btn-primary mr-2">Ver</a>
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('languages.edit', ['language' => $language->id]) }}" class="btn btn-warning mr-2">Editar</a>
                                <form action="{{ route('languages.destroy', ['language' => $language->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
