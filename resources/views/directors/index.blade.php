@extends('layouts.master')

@section('title', 'Directores')

@section('content')
<div class="container mt-4">
    <h2>Listado de Directores</h2>

    @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('directors.create') }}" class="btn btn-success mb-3">Agregar Director</a>
    @endif

    <table class="table table-striped">
        <thead class="thead-dark">
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
                        <a href="{{ route('directors.show', $director->id) }}" class="btn btn-info btn-sm">Ver</a>
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('directors.edit', $director->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('directors.destroy', $director->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
