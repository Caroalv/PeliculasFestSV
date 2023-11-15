@extends('layouts.master')

@section('title', 'Países')

@section('content')
<div class="container mt-4">
    <h2>Listado de Países</h2>

    @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('countries.create') }}" class="btn btn-success mb-3">Agregar País</a>
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
            @foreach ($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->name }}</td>
                    <td>
                        <a href="{{ route('countries.show', $country->id) }}" class="btn btn-info btn-sm">Ver</a>
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline">
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
