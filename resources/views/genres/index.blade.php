@extends('layouts.master')

@section('title', 'Lista de Géneros')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Géneros</h1>

        @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('genres.create') }}" class="btn btn-success">Crear Nuevo Género</a>
        @endif
    </div>

    @if($genres->isEmpty())
        <div class="alert alert-info" role="alert">
            No hay géneros disponibles.
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
                @foreach($genres as $genre)
                    <tr>
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('genres.show', ['genre' => $genre->id]) }}" class="btn btn-primary mr-2">Ver</a>
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('genres.edit', ['genre' => $genre->id]) }}" class="btn btn-warning mr-2">Editar</a>
                                <form action="{{ route('genres.destroy', ['genre' => $genre->id]) }}" method="POST">
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
