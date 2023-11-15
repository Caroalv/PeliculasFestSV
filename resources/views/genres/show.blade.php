@extends('layouts.master')

@section('title', 'Detalles del Género')

@section('content')
    <h1>Detalles del Género</h1>

    <p><strong>ID:</strong> {{ $genre->id }}</p>
    <p><strong>Nombre:</strong> {{ $genre->name }}</p>
    @if(auth()->user()->hasRole('admin'))
    <a href="{{ route('genres.edit', ['genre' => $genre->id]) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('genres.destroy', ['genre' => $genre->id]) }}" method="POST" style="display:inline">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
@endif
    <a href="{{ route('genres.index') }}" class="btn btn-secondary">Volver a la Lista</a>
@endsection
