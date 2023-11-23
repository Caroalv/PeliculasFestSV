@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <!-- Formulario de filtro -->
        <form method="GET" action="{{ url('/catalog') }}" class="mb-4">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-2 mb-2">
                    <button type="submit" class="btn btn-primary btn-block rounded-pill py-2 px-3 text-uppercase font-weight-bold">FILTRAR POR</button>
                </div>
                <div class="col-md-4 mb-2">
                    <label for="category" class="mb-1 font-weight-bold">Categoría:</label>
                    <select name="category" class="form-control custom-select bg-light">
                        <option value="" class="font-weight-bold">Seleccione</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->name }}" {{ request('category') === $genre->name ? 'selected' : '' }} class="font-weight-bold">
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <label for="classification" class="mb-1 font-weight-bold">Clasificación:</label>
                    <select name="classification" class="form-control custom-select bg-light">
                        <option value="" class="font-weight-bold">Seleccione</option>
                        <option value="U" {{ request('classification') === 'U' ? 'selected' : '' }} class="font-weight-bold">U</option>
                        <option value="PG" {{ request('classification') === 'PG' ? 'selected' : '' }} class="font-weight-bold">PG</option>
                        <option value="12A" {{ request('classification') === '12A' ? 'selected' : '' }} class="font-weight-bold">12A</option>
                        <option value="+15" {{ request('classification') === '+15' ? 'selected' : '' }} class="font-weight-bold">+15</option>
                        <option value="+18" {{ request('classification') === '+18' ? 'selected' : '' }} class="font-weight-bold">+18</option>
                        <!-- Agrega las opciones restantes -->
                    </select>
                </div>
            </div>
        </form>

        <!-- Muestra las películas filtradas -->
        <div class="row mt-3">
            @foreach( $peliculas as $key => $pelicula )
                <div class="col-xs-6 col-sm-4 col-md-3 text-center mb-4">
                    <a href="{{ url('/catalog/show/' . $pelicula->id ) }}" style="text-decoration: none; color: #1B2631;">
                        <img src="{{$pelicula->poster}}" style="height:200px" class="mb-2 mx-auto d-block"/>
                        <h4 style="min-height:45px; margin: 0;">
                            {{$pelicula->title}}
                        </h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

