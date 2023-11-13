<nav class="navbar navbar-expand-lg navbar-danger bg-danger navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="/home" style="color:#ffffff"><span style="font-size:20pt">&#9820;</span> PeliculasFestSV</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link"  style="color:#ffffff" href="{{url('/catalog')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Catálogo
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('catalog/listar') ? 'active' : ''}}">
                        <a class="nav-link" style="color:#ffffff" href="{{url('/catalog/listar')}}">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        Lista de Peliculas
                            </a>
                       </li>
                       <li class="nav-item {{  Request::is('catalog/grafica') ? 'active' : ''}}">
                        <a class="nav-link" style="color:#ffffff" href="{{url('/catalog/grafica')}}">
                        </span>Grafica
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                        <a class="nav-link" style="color:#ffffff" href="{{url('/catalog/create')}}">
                            <span>&#10010</span> Nueva película
                        </a>
                    </li>
                </ul>
                
                <form class="form-inline my-2 my-lg-0" action="{{ route('peliculas.buscar') }}" method="GET">
                    <input class="form-control mr-sm-2" type="text" name="query" placeholder="Buscar películas" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                
                <ul class="navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" style="color:#ffffff" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                    
                </ul>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
        // Selecciona todos los botones con el ID "guardar-alumno"
        const cerrar_sesion = document.querySelector('#cerrar_sesion');

        cerrar_sesion.addEventListener('click', (event) => {
            event.preventDefault(); 
            Swal.fire({
                title: 'Quieres Cerrar sesion?',
                showDenyButton: true,
                confirmButtonText: 'Cerrar sesion',
                denyButtonText: `Permanecer en la Pagina`,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
         position: "center",
         icon: "success",
         title: "Sesion cerrada ",
         showConfirmButton: false,
             timer: 15500
});
                    // Aquí puedes enviar el formulario manualmente
                    const form = event.target.closest('form');
                    form.submit();
                }
            });
        });
    });
                </script>
            </div>
        @endif
    </div>
</nav>
