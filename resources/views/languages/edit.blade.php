@extends('layouts.master')

@section('title', 'Editar Idioma')

@section('content')
<div class="container mt-4">
    @if(auth()->user()->hasRole('admin'))
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Editar Idioma</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('languages.update', ['language' => $language->id]) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $language->name }}" required>
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
