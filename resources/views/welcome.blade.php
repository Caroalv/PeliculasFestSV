<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PeliculasFestSV</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            overflow: hidden;
            transition: background-color 0.5s ease;
        }

        header {
            background-color: #825bc1;
            color: #fff;
            text-align: center;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #fff;
            font-size: 50px;
            letter-spacing: 5px;
            margin: 0;
        }

        h2 {
            color: #333333;
            font-size: 40px;
            letter-spacing: 2px;
            margin-top: 20px;
        }

        h2:hover {
            color: #6a41a4;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        img {
            width: auto;
            height: 350px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.5s ease, transform 0.5s ease; /* Ajusta la duración de la transición */
        }

        img:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: scale(1.1); /* Agranda la imagen al 110% al pasar el ratón */
        }

        nav {
            background-color: #825bc1;
            padding: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #6a41a4;
        }

        .content {
            padding: 30px;
            text-align: center;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #825bc1, #ff5e62, #25b0ee, #825bc1);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            z-index: -1;
        }
    </style>
</head>
<body>

<header>
    <h1>PeliculasFestSV</h1>
</header>

<nav>
    @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ url('/home') }}">Inicio</a>
            @else
                <a href="{{ route('login') }}">Iniciar Sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registrarse</a>
                @endif
            @endauth
        </div>
    @endif
</nav>

<div class="content">
    <h2>¡Descubre el fascinante mundo del cine con PeliculasFestSV!</h2>
    <img src="{{ asset('img/peli1.jpeg') }}" alt="Icono de Película">
</div>

<footer>
    &copy; 2023 PeliculasFestSV. Todos los derechos reservados.
</footer>

<script>
    document.body.addEventListener("mouseover", function() {
        document.body.style.backgroundColor = "#e6e6e6";
    });

    document.body.addEventListener("mouseout", function() {
        document.body.style.backgroundColor = "#f4f4f4";
    });
</script>

</body>
</html>


