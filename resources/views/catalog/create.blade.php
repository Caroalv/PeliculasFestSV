@extends('layouts.master')

@section('title', 'Crear película')

@section('content')
    @if(auth()->user()->hasRole('admin'))

        <div class="row" style="margin-top:40px">
            <div class="offset-md-3 col-md-6">
                <div class="card">
                    <div class="card-header text-center navbar-danger bg-danger" style="color:#ffffff">
                        Añadir película
                    </div>
                    <div class="card-body" style="padding:30px">
                        <form action="{{ route('catalog.create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Título</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="genre_id">Género</label>
                                <select name="genre_id" id="genre_id" class="form-control">
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="year">Año</label>
                                <input type="text" name="year" id="year" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="classification">Clasificación</label>
                                <select name="classification" id="classification" class="form-control">
                                    <option value="U">U (Todo público)</option>
                                    <option value="PG">PG (Con supervisión de padres)</option>
                                    <option value="12A">12A (Mayores de 12 años)</option>
                                    <option value="+15">15 (Mayores de 15 años)</option>
                                    <option value="+18">18 (Mayores de 18 años)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="director_id">Director</label>
                                <select name="director_id" id="director_id" class="form-control">
                                    @foreach($directors as $director)
                                        <option value="{{ $director->id }}">{{ $director->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="poster">Poster</label>
                                <input type="text" name="poster" id="poster" class="form-control" style="height:200px">
                            </div>

                            <div class="form-group">
                                <label for="synopsis">Resumen</label>
                                <textarea name="synopsis" id="synopsis" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="country_id">País</label>
                                <select name="country_id" id="country_id" class="form-control">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="original_language_id">Idioma Original</label>
                                <select name="language_id" id="original_language_id" class="form-control">
                                    @foreach($languages as $language)
                                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="movie_url">Enlace de la película</label>
                                <input type="text" name="movie_url" id="movie_url" class="form-control">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-dark" id="añadir_pelicula" style="padding:8px 100px;margin-top:25px;">
                                    Añadir película
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <br>
        <div class="alert alert-danger" role="alert">
            No tienes permisos para acceder a esta página.
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const añadir_pelicula = document.querySelector('#añadir_pelicula');

            añadir_pelicula.addEventListener('click', (event) => {
                event.preventDefault(); 
                Swal.fire({
                    title: '¿Quieres añadir esta película?',
                    showDenyButton: true,
                    confirmButtonText: 'Guardar',
                    denyButtonText: 'No Guardar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Película añadida',
                            showConfirmButton: false,
                            timer: 15500
                        });
                        const form = event.target.closest('form');
                        form.submit();
                    } else if (result.isDenied) {
                        Swal.fire('Cambios no Guardados', '', 'Ups');
                    }
                });
            });
        });
    </script>
@stop
