@extends('layouts.master')

@section('title', 'Editar Género')

@section('content')
@if(auth()->user()->hasRole('admin'))
    <h1>Editar Género</h1>

    <form action="{{ route('genres.update', ['genre' => $genre->id]) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $genre->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
@else
    <br>
    <div class="alert alert-danger" role="alert">
        No tienes permisos para acceder a esta página.
    </div>
@endif   
@endsection
