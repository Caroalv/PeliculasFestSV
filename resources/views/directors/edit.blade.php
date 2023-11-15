@extends('layouts.master')

@section('title', 'Editar Director')

@section('content')
    <h2>Editar Director</h2>

    <form action="{{ route('directors.update', $director->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $director->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
@endsection

