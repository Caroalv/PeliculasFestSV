@extends('layouts.master')
@section('title', 'Gráficas de Películas')
@section('content')

<!-- Agregar un poco de estilo para mejorar la presentación -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .chart-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        padding: 20px;
    }

    h2 {
        color: #333;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container">

    <div class="chart-container">
        <h2>Gráfica de Películas Alquiladas</h2>
        <div style="width: 100%; max-width: 600px; margin: 0 auto;">
            <canvas id="graficoPeliculasAlquiladas"></canvas>
        </div>
    </div>

    <div class="chart-container">
        <h2>Gráfica de Películas por Género</h2>
        <div style="width: 100%; max-width: 600px; margin: 0 auto;">
            <canvas id="graficoPeliculasGenero"></canvas>
        </div>
    </div>

    <div class="chart-container">
        <h2>Gráfica de Clasificación de Películas</h2>
        <div style="width: 100%; max-width: 600px; margin: 0 auto;">
            <canvas id="graficoClasificacionPeliculas"></canvas>
        </div>
    </div>

</div>

<script>
    var alquiladas = <?php echo $alquiladas; ?>;
    var disponibles = <?php echo $disponibles; ?>;
    var datosPeliculasAlquiladas = [alquiladas, disponibles];
    var etiquetasPeliculasAlquiladas = ['Alquiladas', 'Disponibles'];

    var generos = <?php echo json_encode($generos); ?>;
    var etiquetasGeneros = generos.map(function (item) {
        return item.gender;
    });
    var datosPeliculasGenero = generos.map(function (item) {
        return item.total;
    });

    var clasificacionPeliculas = <?php echo json_encode($clasificacionPeliculas); ?>;
    var etiquetasClasificacion = clasificacionPeliculas.map(function (item) {
        return item.classification;
    });
    var datosClasificacion = clasificacionPeliculas.map(function (item) {
        return item.cantidad;
    });

    var configuracionPeliculasAlquiladas = {
        type: 'bar',
        data: {
            labels: etiquetasPeliculasAlquiladas,
            datasets: [{
                label: 'Películas Alquiladas vs Disponibles',
                data: datosPeliculasAlquiladas,
                backgroundColor: ['green', 'red']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    var configuracionPeliculasGenero = {
        type: 'bar',
        data: {
            labels: etiquetasGeneros,
            datasets: [{
                label: 'Cantidad',
                data: datosPeliculasGenero,
                backgroundColor: 'purple' // Cambiado a un solo color para simplificar
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    var configuracionClasificacionPeliculas = {
        type: 'bar',
        data: {
            labels: etiquetasClasificacion,
            datasets: [{
                label: 'Cantidad',
                data: datosClasificacion,
                backgroundColor: ['blue', 'green', 'purple', 'black'] // Colores diferentes para cada barra
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    var ctxPeliculasAlquiladas = document.getElementById('graficoPeliculasAlquiladas').getContext('2d');
    var miGraficoPeliculasAlquiladas = new Chart(ctxPeliculasAlquiladas, configuracionPeliculasAlquiladas);

    var ctxPeliculasGenero = document.getElementById('graficoPeliculasGenero').getContext('2d');
    var miGraficoPeliculasGenero = new Chart(ctxPeliculasGenero, configuracionPeliculasGenero);

    var ctxClasificacionPeliculas = document.getElementById('graficoClasificacionPeliculas').getContext('2d');
    var miGraficoClasificacionPeliculas = new Chart(ctxClasificacionPeliculas, configuracionClasificacionPeliculas);
</script>


@endsection
