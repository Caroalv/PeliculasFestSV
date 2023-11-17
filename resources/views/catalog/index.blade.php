@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <!-- Formulario de filtro -->
        <form method="GET" action="{{ url('/catalog') }}">
    <div class="row">
        <div class="col-md-3">
            <label for="category">Categoría:</label>
            <select name="category" class="form-control">
                <option value="">Seleccione</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->name }}" {{ request('category') === $genre->name ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="classification">Clasificación:</label>
            <select name="classification" class="form-control">
                <option value="">Seleccione</option>
                <option value="U" {{ request('classification') === 'U' ? 'selected' : '' }}>U</option>
                <option value="PG" {{ request('classification') === 'PG' ? 'selected' : '' }}>PG</option>
                <option value="12A" {{ request('classification') === '12A' ? 'selected' : '' }}>12A</option>
                <option value="+15" {{ request('classification') === '+15' ? 'selected' : '' }}>+15</option>
                <option value="+18" {{ request('classification') === '+18' ? 'selected' : '' }}>+18</option>
                <!-- Agrega las opciones restantes -->
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </div>
</form>

        <!-- Muestra las películas filtradas -->
        <div class="row mt-3">
            @foreach( $peliculas as $key => $pelicula )
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <a href="{{ url('/catalog/show/' . $pelicula->id ) }}" style="color:#1B2631">
                        <img src="{{$pelicula->poster}}" style="height:200px"/>
                        <h4 style="min-height:45px;margin:5px 0 10px 0">
                            {{$pelicula->title}}
                        </h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
