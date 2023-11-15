@extends('layouts.master')

@section('title', 'Directores')

@section('content')
    <h2>Listado de Directores</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($directors as $director)
                <tr>
                    <td>{{ $director->id }}</td>
                    <td>{{ $director->name }}</td>
                    <td>
                        <a href="{{ route('directors.show', $director->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('directors.edit', $director->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('directors.destroy', $director->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('directors.create') }}" class="btn btn-success">Agregar Director</a>
@endsection
