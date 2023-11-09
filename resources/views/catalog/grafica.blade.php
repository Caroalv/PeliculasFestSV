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

        // Crea las gráficas en los canvas
        var ctxPeliculasAlquiladas = document.getElementById('graficoPeliculasAlquiladas').getContext('2d');
        var miGraficoPeliculasAlquiladas = new Chart(ctxPeliculasAlquiladas, configuracionPeliculasAlquiladas);

        var ctxPeliculasGenero = document.getElementById('graficoPeliculasGenero').getContext('2d');
        var miGraficoPeliculasGenero = new Chart(ctxPeliculasGenero, configuracionPeliculasGenero);
    </script>
@endsection