@extends('layouts.master')

@section('title', 'Lista de Géneros')

@section('content')
    <h1>Lista de Géneros</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <a href="{{ route('genres.show', ['genre' => $genre->id]) }}" class="btn btn-primary">Ver</a>
                        @if(auth()->user()->hasRole('admin'))
                        <a href="{{ route('genres.edit', ['genre' => $genre->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('genres.destroy', ['genre' => $genre->id]) }}" method="POST" style="display:inline">
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
    <a href="{{ route('genres.create') }}" class="btn btn-success">Crear Nuevo Género</a>
    @endif
@endsection

