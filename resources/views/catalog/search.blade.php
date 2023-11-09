@extends('layouts.master')

@section('title', 'Resultados de la búsqueda')

@section('content')
    <h1>Resultados de la búsqueda</h1>

    @if (count($peliculas) > 0)
        <div class="row">
            @foreach ($peliculas as $pelicula)
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <a href="{{ route('catalog.show', ['id' => $pelicula->id]) }}" style="color:#1B2631">
                        <img src="{{ $pelicula->poster }}" style="height: 200px" />
                        <h4 style="min-height: 45px; margin: 5px 0 10px 0">
                            {{ $pelicula->title }}
                        </h4>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p>No se encontraron resultados.</p>
    @endif
@endsection


