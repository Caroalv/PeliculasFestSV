@extends('layouts.app')

@section('content')
<style>
    .carousel-container {
        width: 28%; /* Ancho del contenedor del carrusel */
        float: left; /* Alinea a la izquierda */
        overflow: hidden;
    }

    .carousel-container img {
        width: 100%; /* Ancho del 100% del contenedor */
        height: auto; /* Altura ajustada automáticamente según el ancho */
        object-fit: cover;
        border-radius: 10px; /* Bordes redondeados para suavizar la apariencia */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
    }

    .logo-container {
        width: 60%; /* Ancho del contenedor del logo y texto */
        float: left; /* Alinea a la derecha */
        padding: 20px; /* Añade un poco de espacio alrededor del logo y el texto */
        text-align: center; /* Centra el texto horizontalmente */
    }

    .logo-container img {
        max-width: 80%; /* Ancho máximo del logo */
        height: auto; /* Altura ajustada automáticamente según el ancho */
        border-radius: 10px; /* Bordes redondeados para suavizar la apariencia */
    }

    .logo-container h2 {
        color: #1a1a1a; /* Color del texto */
        font-size: 2.5em; /* Tamaño del texto */
        margin-bottom: 10px; /* Espaciado inferior */
    }

    .slogan {
        color: #555555; /* Color del texto del eslogan */
        font-size: 1.2em; /* Tamaño del texto del eslogan */
    }
</style>

<div class="container mt-5">
    <!-- Carrusel -->
    <div class="carousel-container">
        <div id="miCarrusel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($peliculas as $index => $pelicula)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ $pelicula->poster }}" class="d-block w-100" alt="{{ $pelicula->title }}">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#miCarrusel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#miCarrusel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>

    <!-- Logo y texto llamativo -->
    <div class="logo-container">
        <img src="{{ asset('img/peli1.jpeg') }}" alt="Logo de la empresa">
        <h2>Bienvenido a PeliculasFestSV</h2>
        <p class="slogan">Descubre una nueva forma de disfrutar del cine desde la comodidad de tu hogar.</p>
    </div>
</div>
@endsection
