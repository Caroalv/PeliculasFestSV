@extends('layouts.master')

@section('title', 'Detalles del Director')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h2 class="card-title">Detalles del Director</h2>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>ID:</strong> {{ $director->id }}</p>
            <p class="card-text"><strong>Nombre:</strong> {{ $director->name }}</p>

            @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('directors.edit', $director->id) }}" class="btn btn-warning mr-2">Editar</a>
                <form action="{{ route('directors.destroy', $director->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            @endif

            <a href="{{ route('directors.index') }}" class="btn btn-secondary">Volver al listado</a>
        </div>
    </div>
</div>
@endsection
