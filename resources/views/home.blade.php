@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f0f0f0; /* Color de fondo minimalista - puedes cambiarlo según tus preferencias */
    }

    .container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-top: 50px;
    }

    .carousel-container {
        width: 30%;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s ease-in-out; /* Animación al pasar el ratón */
    }

    .carousel-container:hover {
        transform: scale(1.05); /* Efecto de escala al pasar el ratón */
    }

    .carousel-container img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 10px;
    }

    .logo-container {
        width: 50%;
        padding: 20px;
        text-align: center;
        background-color: #1f497d; /* Color de fondo llamativo - puedes cambiarlo según tus preferencias */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .logo-container img {
        max-width: 80%;
        height: auto;
        border-radius: 10px;
    }

    .logo-container h2 {
        color: #ffffff;
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .slogan {
        color: #cccccc;
        font-size: 1.2em;
    }
</style>

<div class="container">
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

