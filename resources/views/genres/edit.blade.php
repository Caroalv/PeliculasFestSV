@extends('layouts.master')

@section('title', 'Editar Género')

@section('content')
<div class="container mt-4">
    @if(auth()->user()->hasRole('admin'))
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Editar Género</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('genres.update', ['genre' => $genre->id]) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $genre->name }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-danger mt-3" role="alert">
            <strong>Error:</strong> No tienes permisos para acceder a esta página.
        </div>
    @endif
</div>
@endsection
