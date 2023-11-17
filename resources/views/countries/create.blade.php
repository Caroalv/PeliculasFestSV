@extends('layouts.master')

@section('title', 'Crear País')

@section('content')
<div class="container mt-4">
    @if(auth()->user()->hasRole('admin'))
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
            <div class="card-header bg-info text-white">
                <h2 class="mb-0">Crear País</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('countries.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Nombre del País</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg btn-block mt-3">Guardar País</button>
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
