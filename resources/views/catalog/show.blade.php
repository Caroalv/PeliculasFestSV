@extends('layouts.master')
@section('title', 'Ver película')
@section('content')
    <br>
    <div class="row">
        <div class="col-sm-4">
        <img src="{{$pelicula->poster}}" alt="" style="height:400px"> 
        </div>
        <div class="col-sm-8">
            <h3>{{ $pelicula->title }}</h3>
            <h6>Género: {{ $pelicula->genre->name }}</h6>
            <h6>Año: {{ $pelicula->year }}</h6>
            <h6>Clasificación: {{ $pelicula->classification }}</h6>
            <h6>Director: {{ $pelicula->director->name }}</h6>
            <h6>País: {{ $pelicula->country->name }}</h6>
            <h6>Idioma Original: {{ $pelicula->language->name }}</h6>
            <p><h5><strong>Resumen: </strong>{{ $pelicula->synopsis }}</h5></p>

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
                <form action="{{ action([App\Http\Controllers\CatalogController::class, 'putReturn'], ['id' => $pelicula->id]) }}"
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

            @if(auth()->user()->hasRole('admin'))
                <a class="btn btn-warning" href="/catalog/edit/{{ $pelicula->id }}">Editar película</a>
            @endif

            <a type="button" class="btn btn-dark" href="/catalog">Volver al listado</a>

            @if(auth()->user()->hasRole('admin'))
                <form action="{{ action([App\Http\Controllers\CatalogController::class, 'deleteMovie'], ['id' => $pelicula->id]) }}"
                      method="POST" style="display:inline">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-danger eliminar-pelicula" style="display:inline">
                        Eliminar pelicula
                    </button>
                </form>
            @endif
        </div>
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
    // Se ejecuta cuando el DOM ha sido completamente cargado
    document.addEventListener('DOMContentLoaded', function () {
        // Selecciona el primer botón con el ID "devolver_pelicula"
        const devolver_pelicula = document.querySelector('#devolver_pelicula');

        // Agrega un evento de clic al botón seleccionado
        devolver_pelicula.addEventListener('click', (event) => {
            // Previene el comportamiento predeterminado del evento (enviar el formulario)
            event.preventDefault();

            // Crea una instancia de Swal (SweetAlert) con personalizaciones de Bootstrap
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success", // Clase del botón de confirmación
                    cancelButton: "btn btn-danger"    // Clase del botón de cancelación
                },
                buttonsStyling: false // Desactiva el estilo predeterminado de los botones
            });

            // Muestra una alerta de confirmación personalizada
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro?",           // Título de la alerta
                text: "No podrás revertir esto",   // Texto descriptivo
                icon: "warning",                   // Icono de advertencia
                showCancelButton: true,            // Muestra el botón de cancelar
                confirmButtonText: "Sí, devolver película", // Texto del botón de confirmación
                cancelButtonText: "No, cancelar",          // Texto del botón de cancelar
                reverseButtons: true               // Invierte el orden de los botones (confirmar/cancelar)
            }).then((result) => { // Ejecuta una función después de que el usuario interactúa con la alerta
                if (result.isConfirmed) { // Si el usuario hace clic en confirmar
                    // Muestra una alerta de éxito y realiza la acción de envío del formulario
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Pelicula devuelta",
                        showConfirmButton: false,
                        timer: 15500
                    });

                    // Obtiene el formulario más cercano al botón y lo envía
                    const form = event.target.closest('form');
                    form.submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Si el usuario cancela, muestra una alerta de error
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "La película no ha sido devuelta",
                        icon: "error"
                    });
                } else if (result.isDenied) {
                    // Si hay algún error, muestra una alerta de error
                    Swal.fire('Cambios no Guardados', '', 'error');
                }
            });
        });
    });
</script>

@stop
