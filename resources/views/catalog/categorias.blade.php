

@extends('layouts.master')
@section('title', 'Categorias de Películas')
@section('content')

<div class="row" style="margin-top: 40px">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center navbar-danger bg-danger" style="color: #ffffff">
                <h2><b></B>Listado de Peliculas por Género</b></h2>
            </div>
            <div class="card-body" style="padding: 30px">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60%">Título de la Película</th>
                                <th>Género</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peliculas as $pelicula)
                                <tr>
                                    <td>{{ $pelicula->title }}</td>
                                    <td>{{ $pelicula->gender }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
