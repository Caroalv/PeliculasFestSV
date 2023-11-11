@extends('layouts.master')
@section('title', 'Ver película')
@section('content')
<br>
    <div class="row">
        <div class="col-sm-4">
            <img src="{{$pelicula->poster}}" alt="" style="height:400px"> 
        </div>
        <div class="col-sm-8">
            <h3>{{$pelicula->title}}</h3>
            <h6>Genero: {{$pelicula->gender}}</h6>        
            <h6>Año: {{$pelicula->year}}</h6>
            <h6>Clasificación: {{$pelicula->classification}}</h6>        
            <h6>Director: {{$pelicula->director}}</h6>
            <h6>Pais: {{$pelicula->country}}</h6> 
            <h6>Idioma Original: {{$pelicula->original_language}}</h6> 
            <p><h5><strong>Resumen: </strong>{{$pelicula->synopsis}}</h5></p>       
            @if($pelicula->rented)
                <!-- Muestra el enlace de YouTube como un botón -->
                <form action="{{ $pelicula->movie_url }}" target="_blank">
                    <button type="submit" class="btn btn-primary">Ver película</button>
                </form>
            @else
                <!-- No muestres el botón hasta que la película se alquile -->
            @endif
            <br>
            @if($pelicula->rented)
                <form action="{{action([App\Http\Controllers\CatalogController::class, 'putReturn'], ['id' => $pelicula->id])}}" 
                    method="POST" style="display:inline">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-danger" style="display:inline" id="devolver_pelicula">
                        Devolver película
                    </button>
                </form>
            @else
                <form action="{{ route('payment.show', ['id' => $pelicula->id]) }}" method="GET" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="display:inline">
                        Alquilar película
                    </button>
                </form>
            @endif
            <a class="btn btn-warning" href="/catalog/edit/{{$pelicula->id}}">Editar película</a>
            <a type="button" class="btn btn-dark" href="/catalog">Volver al listado</a>
            <form action="{{action([App\Http\Controllers\CatalogController::class, 'deleteMovie'], ['id' => $pelicula->id])}}" 
                method="POST" style="display:inline">
                @method('DELETE')
                @csrf
                <button type="button" class="btn btn-danger eliminar-pelicula" style="display:inline">
                    Eliminar pelicula
                </button>
            </form>
        </div>
        <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Selecciona todos los botones con la clase "delete-task"
        const deleteButtons = document.querySelectorAll('.eliminar-pelicula');

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción no se puede deshacer.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // El formulario se envía si el usuario confirma
                        button.closest('form').submit();
                    }
                });
            });
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los botones con el ID "devolver_pelicula"
    const devolver_pelicula = document.querySelector('#devolver_pelicula');

    devolver_pelicula.addEventListener('click', (event) => {
        event.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "¿Estás seguro?",
            text: "No podrás revertir esto",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, devolver película",
            cancelButtonText: "No, cancelar",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
         position: "center",
         icon: "success",
         title: "Pelicula devuelta",
         showConfirmButton: false,
             timer: 15500
                });

                const form = event.target.closest('form');
                form.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelado",
                    text: "La película no ha sido devuelta",
                    icon: "error"
                });
            } else if (result.isDenied) {
                Swal.fire('Cambios no Guardados', '', 'error');
            }
        });
    });
});

</script>


    </div>
@stop
