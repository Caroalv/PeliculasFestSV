@extends('layouts.master')

@section('title', 'Editar Idioma')

@section('content')
    <h1>Editar Idioma</h1>

    <form action="{{ route('languages.update', ['language' => $language->id]) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $language->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
@endsection
