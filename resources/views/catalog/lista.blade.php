
@extends('layouts.master')
@section('title', 'Lista de Películas')
@section('content')

<div class="row" style="margin-top: 40px">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center navbar-danger bg-danger" style="color: #ffffff">
                Lista de Películas
            </div>
            <div class="card-body" style="padding: 30px">
                <table id="example" class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Género</th>
                            <th>Año</th>
                            <th>Clasificación</th>
                            <th>Director</th>
                            <th>Estado de Alquiler</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($peliculas as $pelicula)
                        <tr>
                            <td>{{ $pelicula->title }}</td>
                            <td>{{ $pelicula->genre->name }}</td>
                            <td>{{ $pelicula->year }}</td>
                            <td>{{ $pelicula->classification }}</td>
                            <td>{{ $pelicula->director->name }}</td>
                            <td>
                                <span class="badge {{ $pelicula->rented ? 'badge-danger' : 'badge-success' }}" style="font-size: 1.2em;">
                                    {{ $pelicula->rented ? 'Alquilada' : 'Disponible' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
