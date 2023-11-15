@extends('layouts.master')

@section('title', 'Detalles del País')

@section('content')
    <h2>Detalles del País</h2>
    
    <p><strong>ID:</strong> {{ $country->id }}</p>
    <p><strong>Nombre:</strong> {{ $country->name }}</p>

    <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
    </form>
    <a href="{{ route('countries.index') }}" class="btn btn-secondary">Volver al listado</a>
@endsection
