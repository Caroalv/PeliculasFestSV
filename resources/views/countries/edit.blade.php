@extends('layouts.master')

@section('title', 'Editar País')

@section('content')
@if(auth()->user()->hasRole('admin'))

    <h2>Editar País</h2>

    <form action="{{ route('countries.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $country->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
    @else
        <br>
        <div class="alert alert-danger" role="alert">
            No tienes permisos para acceder a esta página.
        </div>
    @endif
@endsection
