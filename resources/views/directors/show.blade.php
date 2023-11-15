@extends('layouts.master')

@section('title', 'Detalles del Director')

@section('content')
    <h2>Detalles del Director</h2>
    
    <p><strong>ID:</strong> {{ $director->id }}</p>
    <p><strong>Nombre:</strong> {{ $director->name }}</p>
    @if(auth()->user()->hasRole('admin'))
    <a href="{{ route('directors.edit', $director->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('directors.destroy', $director->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
    </form>
    @endif
    <a href="{{ route('directors.index') }}" class="btn btn-secondary">Volver al listado</a>
@endsection

