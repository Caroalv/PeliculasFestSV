@extends('layouts.master')
@section('title', 'Gráficas de Películas')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div style="display: flex; flex-direction: row;">
    <div style="width: 50%;">
        <h1>Gráfica de Películas Alquiladas</h1>
        <div style="width: 400px; height: 400px;">
            <canvas id="graficoPeliculasAlquiladas"></canvas>
        </div>
    </div>
    <div style="width: 50%;">
        <h1>Gráfica de Películas por Género</h1>
        <div style="width: 400px; height: 400px;">
            <canvas id="graficoPeliculasGenero"></canvas>
        </div>
    </div>
</div>
<div style="width: 50%;">
    <h1>Gráfica de Clasificación de Películas</h1>
    <div style="width: 400; height: 400px;">
        <canvas id="graficoClasificacionPeliculas"></canvas>
    </div>
</div>

<script>
    // Datos para la gráfica de películas alquiladas
    var alquiladas = <?php echo $alquiladas; ?>;
    var disponibles = <?php echo $disponibles; ?>;
    var datosPeliculasAlquiladas = [alquiladas, disponibles];
    var etiquetasPeliculasAlquiladas = ['Alquiladas', 'Disponibles'];

    // Datos para la gráfica de películas por género
    var generos = <?php echo json_encode($generos); ?>;
    var etiquetasGeneros = generos.map(function (item) {
        return item.gender;
    });
    var datosPeliculasGenero = generos.map(function (item) {
        return item.total;
    });

    // Datos para la gráfica de clasificación de películas
    var clasificacionPeliculas = <?php echo json_encode($clasificacionPeliculas); ?>;
    var etiquetasClasificacion = clasificacionPeliculas.map(function (item) {
        return item.classification; // Asegúrate de usar el nombre correcto del campo en la base de datos
    });
    var datosClasificacion = clasificacionPeliculas.map(function (item) {
        return item.cantidad; // Asegúrate de usar el nombre correcto del campo en la base de datos
    });

    // Configuración de la gráfica de películas alquiladas
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

    // Configuración de la gráfica de películas por género
    var configuracionPeliculasGenero = {
        type: 'bar',
        data: {
            labels: etiquetasGeneros,
            datasets: [{
                label: 'Cantidad',
                data: datosPeliculasGenero,
                backgroundColor: 'multi-color'
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

    // Configuración de la gráfica de clasificación de películas
    var configuracionClasificacionPeliculas = {
        type: 'bar',
        data: {
            labels: etiquetasClasificacion,
            datasets: [{
                label: 'Cantidad',
                data: datosClasificacion,
                backgroundColor: 'blue'
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
