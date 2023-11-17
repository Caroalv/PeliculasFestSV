@extends('layouts.master')

@section('title', 'Crear Nuevo Idioma')

@section('content')
<div class="container mt-4">
    @if(auth()->user()->hasRole('admin'))
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h1 class="card-title">Crear Nuevo Idioma</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('languages.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
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
