@extends('layouts.app')
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
   // Obtener datos de películas alquiladas y disponibles
var alquiladas = <?php echo $alquiladas; ?>;//está tomando un valor almacenado en la variable
var disponibles = <?php echo $disponibles; ?>;
var datosPeliculasAlquiladas = [alquiladas, disponibles];  //Aquí se crea un array en JavaScript llamado datosPeliculasAlquiladas que contiene los valores de alquiladas y disponibles.
var etiquetasPeliculasAlquiladas = ['Alquiladas', 'Disponibles'];//Se crea un array llamado etiquetasPeliculasAlquiladas que contiene las etiquetas para el gráfico.

// Obtener datos de géneros de películas
var generos = <?php echo json_encode($generos); ?>;
var etiquetasGeneros = generos.map(function (item) { //crea un nuevo array llamado etiquetasGeneros que contiene los valores de la propiedad gender(generos) 
    return item.gender;
});
var datosPeliculasGenero = generos.map(function (item) {
    return item.total;
});

// Obtener datos de clasificación de películas
var clasificacionPeliculas = <?php echo json_encode($clasificacionPeliculas); ?>;
var etiquetasClasificacion = clasificacionPeliculas.map(function (item) {
    return item.classification;
});
var datosClasificacion = clasificacionPeliculas.map(function (item) {
    return item.cantidad;
});

// Configuración del gráfico de películas alquiladas
var configuracionPeliculasAlquiladas = {
    type: 'bar',
    data: {
        labels: etiquetasPeliculasAlquiladas, //etiqueta para el grafico 
        datasets: [{  //etiqueta del conjunto de datos
            label: 'Películas Alquiladas vs Disponibles',
            data: datosPeliculasAlquiladas, //datos los cuales se utilizaran en la grafica
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

// Configuración del gráfico de géneros de películas
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

// Configuración del gráfico de clasificación de películas
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

// Crear instancias de Chart.js para cada gráfico
var ctxPeliculasAlquiladas = document.getElementById('graficoPeliculasAlquiladas').getContext('2d'); //: Esto busca en el documento HTML el elemento con el ID 'graficoPeliculasAlquiladas'
var miGraficoPeliculasAlquiladas = new Chart(ctxPeliculasAlquiladas, configuracionPeliculasAlquiladas); //Aquí se crea una nueva instancia de la clase Chart proporcionada por la librería Chart.js. Se le pasa el contexto de renderizado (ctxPeliculasAlquiladas) 
                                                                                                        //y la configuración del gráfico (configuracionPeliculasAlquiladas).

var ctxPeliculasGenero = document.getElementById('graficoPeliculasGenero').getContext('2d');
var miGraficoPeliculasGenero = new Chart(ctxPeliculasGenero, configuracionPeliculasGenero);

var ctxClasificacionPeliculas = document.getElementById('graficoClasificacionPeliculas').getContext('2d');
var miGraficoClasificacionPeliculas = new Chart(ctxClasificacionPeliculas, configuracionClasificacionPeliculas);

</script>


@endsection
