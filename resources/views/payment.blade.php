@extends('layouts.master')
@section('title', 'Pago de Película')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pago de Película - {{ $pelicula->title }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('payment.process') }}" novalidate>
                        @csrf

                        <div class="form-group">
                            <label for="card_number">Número de Tarjeta</label>
                            <input type="text" name="card_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="expiration_date">Fecha de Expiración</label>
                            <input type="text" name="expiration_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" name="cvv" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="duration">Duración</label>
                            <select name="duration" class="form-control" required>
                                <option value="1">1 mes - $5</option>
                                <option value="5">5 meses - $20</option>
                                <option value="12">1 año - $45</option>
                            </select>
                        </div>

                        <input type="hidden" name="pelicula_id" value="{{ $pelicula->id }}">

                        <button type="submit" class="btn btn-primary" id="pagar">Procesar Pago</button>
                        <a href="{{ route('catalog.show', ['id' => $pelicula->id]) }}" class="btn btn-secondary" id="cancelarVolver">Cancelar y Volver</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Selecciona el botón con el ID "pagar"
    const pagar = document.querySelector('#pagar');

    pagar.addEventListener('click', (event) => {
        event.preventDefault();

        const form = event.target.closest('form');
        if (form.checkValidity()) {
            // Verifica la validez del formulario antes de mostrar la alerta
            Swal.fire({
                title: "¿Quieres proceder con el pago?",
                showDenyButton: true,
                confirmButtonText: "Pagar",
                denyButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Compra completada",
                        showConfirmButton: false,
                        timer: 15500
                    });

                    // El formulario se envía si el usuario confirma
                    form.submit();
                } else if (result.isDenied) {
                    Swal.fire({
                        title: "Cambios no guardados",
                        icon: "info",
                        timer: 5000, // Establece una duración de 2 segundos
                        showConfirmButton: false, 
                    });
                }
            });
        } else {
            // Si el formulario no es válido, puedes mostrar un mensaje de error o realizar otra acción
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Por favor, completa todos los campos correctamente."
            });
        }
    });

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
@endsection
