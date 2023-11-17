@extends('layouts.app')

@section('title', 'Gráficas de Películas')

@section('content')
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
<div class="container">
    <!-- Contenedor para la primera gráfica: Películas Alquiladas -->
    <div class="chart-container">
        <h2>Gráfica de Películas Alquiladas</h2>
        <!-- Contenedor para la gráfica con un ancho máximo de 600px y centrado -->
        <div style="width: 100%; max-width: 600px; margin: 0 auto;">
            <canvas id="graficoPeliculasAlquiladas"></canvas> <!-- Lienzo de la gráfica de Películas Alquiladas -->
        </div>
    </div>

    <!-- Contenedor para la segunda gráfica: Clasificación de Películas -->
    <div class="chart-container">
        <h2>Gráfica de Clasificación de Películas</h2>
        <!-- Contenedor para la gráfica con un ancho máximo de 600px y centrado -->
        <div style="width: 100%; max-width: 600px; margin: 0 auto;">
            <canvas id="graficoClasificacionPeliculas"></canvas> <!-- Lienzo de la gráfica de Clasificación de Películas -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Inclusión de la biblioteca Chart.js -->
<script>
    // Variables PHP para datos de la primera gráfica
    var alquiladas = <?php echo $alquiladas; ?>;
    var disponibles = <?php echo $disponibles; ?>;
    var datosPeliculasAlquiladas = [alquiladas, disponibles];
    var etiquetasPeliculasAlquiladas = ['Alquiladas', 'Disponibles'];

    // Variables PHP para datos de la segunda gráfica
    var clasificacionPeliculas = <?php echo json_encode($clasificacionPeliculas); ?>;
    var etiquetasClasificacion = clasificacionPeliculas.map(function (item) {
        return item.classification;
    });
    var datosClasificacion = clasificacionPeliculas.map(function (item) {
        return item.cantidad;
    });

    // Configuración de la primera gráfica (Películas Alquiladas)
    var configuracionPeliculasAlquiladas = {
        type: 'bar', // Tipo de gráfica: barras
        data: {
            labels: etiquetasPeliculasAlquiladas,
            datasets: [{
                label: 'Películas Alquiladas vs Disponibles',
                data: datosPeliculasAlquiladas,
                backgroundColor: ['green', 'red'] // Colores de las barras
            }]
        },
        options: {
            responsive: true, // Hace que la gráfica sea responsive
            scales: {
                y: {
                    beginAtZero: true // Empieza en el eje Y desde cero
                }
            }
        }
    };

    // Configuración de la segunda gráfica (Clasificación de Películas)
    var configuracionClasificacionPeliculas = {
        type: 'bar', // Tipo de gráfica: barras
        data: {
            labels: etiquetasPeliculasAlquiladas,
            datasets: [{
                label: 'Películas Alquiladas vs Disponibles',
                data: datosPeliculasAlquiladas,
                backgroundColor: ['green', 'red'] // Colores de las barras
            }]
        },
        options: {
            responsive: true, // Hace que la gráfica sea responsive
            scales: {
                y: {
                    beginAtZero: true // Empieza en el eje Y desde cero
                }
            }
        }
    };

    // Obtención del contexto del lienzo para la primera gráfica
    var ctxPeliculasAlquiladas = document.getElementById('graficoPeliculasAlquiladas').getContext('2d');
    // Creación de la instancia de la gráfica de Películas Alquiladas
    var miGraficoPeliculasAlquiladas = new Chart(ctxPeliculasAlquiladas, configuracionPeliculasAlquiladas);

    // Obtención del contexto del lienzo para la segunda gráfica
    var ctxClasificacionPeliculas = document.getElementById('graficoClasificacionPeliculas').getContext('2d');
    // Creación de la instancia de la gráfica de Clasificación de Películas
    var miGraficoClasificacionPeliculas = new Chart(ctxClasificacionPeliculas, configuracionClasificacionPeliculas);
</script>
@endsection
