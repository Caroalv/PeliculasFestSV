@extends('layouts.master')

@section('title', 'Detalles del Idioma')

@section('content')
    <h1>Detalles del Idioma</h1>

    <p><strong>ID:</strong> {{ $language->id }}</p>
    <p><strong>Nombre:</strong> {{ $language->name }}</p>
    @if(auth()->user()->hasRole('admin'))
    <a href="{{ route('languages.edit', ['language' => $language->id]) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('languages.destroy', ['language' => $language->id]) }}" method="POST" style="display:inline">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
    @endif
    <a href="{{ route('languages.index') }}" class="btn btn-secondary">Volver a la Lista</a>
@endsection
