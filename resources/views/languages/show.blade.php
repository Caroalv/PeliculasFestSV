@extends('layouts.master')

@section('title', 'Detalles del Idioma')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h1 class="card-title">Detalles del Idioma</h1>
        </div>

        <div class="card-body">
            <p class="card-text"><strong>ID:</strong> {{ $language->id }}</p>
            <p class="card-text"><strong>Nombre:</strong> {{ $language->name }}</p>
        </div>

        @if(auth()->user()->hasRole('admin'))
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group" role="group">
                        <a href="{{ route('languages.edit', ['language' => $language->id]) }}" class="btn btn-warning">Editar</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">
                            Eliminar
                        </button>
                    </div>

                    <a href="{{ route('languages.index') }}" class="btn btn-secondary">Volver a la Lista</a>
                </div>
            </div>

            <!-- Modal de Confirmación de Eliminación -->
            <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteLabel">Confirmar Eliminación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que deseas eliminar este idioma?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <form action="{{ route('languages.destroy', ['language' => $language->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
