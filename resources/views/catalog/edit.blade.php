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
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" value="{{$pelicula->title}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="gender">Género</label>
                            <input type="text" name="gender" id="gender" value="{{$pelicula->gender}}" class="form-control">
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
                            <input type="text" name="director" id="director" value="{{$pelicula->director}}" class="form-control">
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
                            <label for="country">Pais</label>
                            <input type="text" name="country" id="country" value="{{$pelicula->country}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="original_language">Idioma Original</label>
                            <input type="text" name="original_language" id="original_language" value="{{$pelicula->original_language}}" class="form-control">
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
        <script>
document.addEventListener('DOMContentLoaded', function () {
        // Selecciona todos los botones con el ID "guardar-alumno"
        const modificar_pelicula = document.querySelector('#modificar_pelicula');

        modificar_pelicula.addEventListener('click', (event) => {
            event.preventDefault(); 
            Swal.fire({
                title: 'Quieres modificar esta pelicula?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No Guardar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
         position: "center",
         icon: "success",
         title: "Pelicula modificada",
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
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cancelarVolverButton = document.querySelector('#cancelarVolver');

        cancelarVolverButton.addEventListener('click', (event) => {
            event.preventDefault();
            Swal.fire({
                title: "¿Estás seguro de que deseas cancelar y volver?",
                text: "Tus cambios no se guardarán.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, cancelar y volver",
                cancelButtonText: "No, quedarse en esta página",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirige al usuario a la página de catálogo
                    window.location.href = "{{ route('catalog.show', ['id' => $pelicula->id]) }}";
                }
            });
        });
    });
</script>
    </div>
@stop
