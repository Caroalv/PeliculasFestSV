@extends('layouts.master')

@section('title', 'Países')

@section('content')
    <h2>Listado de Países</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->name }}</td>
                    <td>
                        <a href="{{ route('countries.show', $country->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('countries.create') }}" class="btn btn-success">Agregar País</a>
@endsection
