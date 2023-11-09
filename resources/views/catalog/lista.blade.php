
@extends('layouts.master')
@section('title', 'Lista de Películas')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                    <h2>Lista de Películas</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Género</th>
                                    <th>Año</th>
                                    <th>Clasificación</th>
                                    <th>Director</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peliculas as $pelicula)
                                <tr>
                                    <td>{{ $pelicula->title }}</td>
                                    <td>{{ $pelicula->gender }}</td>
                                    <td>{{ $pelicula->year }}</td>
                                    <td>{{ $pelicula->classification }}</td>
                                    <td>{{ $pelicula->director }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
