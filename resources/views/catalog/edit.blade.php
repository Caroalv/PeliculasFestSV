@extends('layouts.master')
@section('title', 'Modificar película')
@section('content')
<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center navbar-danger bg-danger" style="color:#ffffff">
                Modificar película
            </div>
            <div class="card-body" style="padding:30px">
                <form action="/catalog/edit/{{ $pelicula->id }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" value="{{$pelicula->title}}" class="form-control">
                    </div>
                    <div class="form-group">
    <label for="genre_id">Género</label>
    <select name="genre_id" id="genre_id" class="form-control">
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}" {{ $pelicula->genre_id == $genre->id ? 'selected' : '' }}>
                {{ $genre->name }}
            </option>
        @endforeach
    </select>
</div>


                    <div class="form-group">
                        <label for="year">Año</label>
                        <input type="text" name="year" id="year" value="{{$pelicula->year}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="classification">Clasificación</label>
                        <select name="classification" id="classification" class="form-control">
                            <option value="U" {{ $pelicula->classification == 'U' ? 'selected' : '' }}>U (Todo público)</option>
                            <option value="PG" {{ $pelicula->classification == 'PG' ? 'selected' : '' }}>PG (Con supervisión de padres)</option>
                            <option value="12A" {{ $pelicula->classification == '12A' ? 'selected' : '' }}>12A (Mayores de 12 años)</option>
                            <option value="+15" {{ $pelicula->classification == '+15' ? 'selected' : '' }}>15 (Mayores de 15 años)</option>
                            <option value="+18" {{ $pelicula->classification == '+18' ? 'selected' : '' }}>18 (Mayores de 18 años)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="director">Director</label>
                        <select name="director_id" id="director_id" class="form-control">
                            @foreach($directors as $director)
                                <option value="{{ $director->id }}" {{ $pelicula->director_id == $director->id ? 'selected' : '' }}>{{ $director->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="poster">Poster</label>
                        <input type="text" name="poster" id="poster"  value="{{$pelicula->poster}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="synopsis">Resumen</label>
                        <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$pelicula->synopsis}}</textarea>
                    </div>

                    <div class="form-group">
    <label for="country_id">País</label>
    <select name="country_id" id="country_id" class="form-control">
        @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ $pelicula->country_id == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
    </select>
</div>

                    <div class="form-group">
    <label for="language_id">Idioma Original</label>
    <select name="language_id" id="language_id" class="form-control">
        @foreach($languages as $language)
            <option value="{{ $language->id }}" {{ $pelicula->language_id == $language->id ? 'selected' : '' }}>
                {{ $language->name }}
            </option>
        @endforeach
    </select>
</div>


                    <div class="form-group">
                        <label for="movie_url">Enlace de la película</label>
                        <input type="text" name="movie_url" id="movie_url" value="{{$pelicula->movie_url}}" class="form-control">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-dark" id="modificar_pelicula" style="padding:8px 100px;margin-top:25px;">
                            Modificar película
                        </button>
                        <a href="{{ route('catalog.show', ['id' => $pelicula->id]) }}" class="btn btn-secondary" id="cancelarVolver">Cancelar y Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modificarPeliculaButton = document.querySelector('#modificar_pelicula');

        modificarPeliculaButton.addEventListener('click', (event) => {
            event.preventDefault();
            Swal.fire({
                title: '¿Quieres modificar esta película?',
                showDenyButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: 'No Guardar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Película modificada',
                        showConfirmButton: false,
                    });

                    // Aquí puedes enviar el formulario manualmente
                    const form = event.target.closest('form');
                    form.submit();
                } else if (result.isDenied) {
                    Swal.fire('Cambios no Guardados', '', 'Ups');
                }
            });
        });

        const cancelarVolverButton = document.querySelector('#cancelarVolver');

        cancelarVolverButton.addEventListener('click', (event) => {
            event.preventDefault();
            Swal.fire({
                title: '¿Estás seguro de que deseas cancelar y volver?',
                text: 'Tus cambios no se guardarán.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, cancelar y volver',
                cancelButtonText: 'No, quedarse en esta página',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirige al usuario a la página de catálogo
                    window.location.href = "{{ route('catalog.show', ['id' => $pelicula->id]) }}";
                }
            });
        });
    });
</script>
@endsection
