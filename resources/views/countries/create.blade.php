@extends('layouts.master')

@section('title', 'Crear País')

@section('content')
@if(auth()->user()->hasRole('admin'))

    <h2>Crear País</h2>

    <form action="{{ route('countries.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    @else
        <br>
        <div class="alert alert-danger" role="alert">
            No tienes permisos para acceder a esta página.
        </div>
    @endif
@endsection
