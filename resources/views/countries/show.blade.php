@extends('layouts.master')

@section('title', 'Detalles del País')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h2 class="card-title">Detalles del País</h2>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>ID:</strong> {{ $country->id }}</p>
            <p class="card-text"><strong>Nombre:</strong> {{ $country->name }}</p>

            @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-warning mr-2">Editar</a>
                <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            @endif

            <a href="{{ route('countries.index') }}" class="btn btn-secondary">Volver al listado</a>
        </div>
    </div>
</div>
@endsection
