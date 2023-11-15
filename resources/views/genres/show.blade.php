@extends('layouts.master')

@section('title', 'Detalles del Género')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h1 class="card-title">Detalles del Género</h1>
        </div>

        <div class="card-body">
            <p class="card-text"><strong>ID:</strong> {{ $genre->id }}</p>
            <p class="card-text"><strong>Nombre:</strong> {{ $genre->name }}</p>
        </div>

        @if(auth()->user()->hasRole('admin'))
            <div class="card-footer">
                <div class="btn-group" role="group">
                    <a href="{{ route('genres.edit', ['genre' => $genre->id]) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('genres.destroy', ['genre' => $genre->id]) }}" method="POST" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <a href="{{ route('genres.index') }}" class="btn btn-secondary mt-3">Volver a la Lista</a>
</div>
@endsection
