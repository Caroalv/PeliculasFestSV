
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
                            <td>{{ $pelicula->gender }}</td>
                            <td>{{ $pelicula->year }}</td>
                            <td>{{ $pelicula->classification }}</td>
                            <td>{{ $pelicula->director->name }}</td>
                            <td>
                                @if($pelicula->rented)
                                    Alquilada
                                @else
                                    Disponible
                                @endif
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
