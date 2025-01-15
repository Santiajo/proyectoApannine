<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- Cargar estilos globales -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- Cambiar fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('styles')
    <!-- {{-- <link rel="stylesheet" href="{{ asset('cssbootstrap/bootstrap.css') }}"> --}} -->
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="{{ asset('img/apanine_logo.png') }}" alt="Logo">
                    </span>
                    <div class="text logo-text">
                        <span class="name">Apaninnet</span>
                        <span class="profession">Mis secciones</span>
                    </div>
                    <i class='bx bx-chevron-right toggle'></i>
                </div>

                <div class="menu-bar">
                    <div class="menu">
                        <li class="search-box">
                            <i class='bx bx-search icon'></i>
                            <input type="text" placeholder="Buscar...">
                        </li>
                        <ul class="menu-links">
                            <li class="nav-link">
                                <a href="{{ route('fichausuarios') }}">
                                    <i class='bx bx-user icon'></i>
                                    <span class="text nav-text">Usuarios</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="{{ route('fichabeneficiario') }}">
                                    <i class='bx bx-notepad icon'></i>
                                    <span class="text nav-text">Beneficiarios</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="{{ route('especialistas.listarEspecialistas') }}">
                                    <i class='bx bx-band-aid icon'></i>
                                    <span class="text nav-text">Especialistas</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="{{ route('asistencia') }}">
                                    <i class='bx bxs-school icon'></i>
                                    <span class="text nav-text">Talleres</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="{{ route('asistenciasEspecialistas') }}">
                                    <i class='bx bx-calendar-check icon'></i>
                                    <span class="text nav-text">Asistencias</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="bottom-content">
                        <li>
                            <a href="#">
                                <i class='bx bx-log-out icon'></i>
                                <span class="text nav-text">Cerrar sesión</span>
                            </a>
                        </li>

                        <li class="mode">
                            <div class="sun-moon">
                                <i class='bx bx-moon icon moon'></i>
                                <i class='bx bx-sun icon sun'></i>
                            </div>
                            <span class="mode-text text">Modo noche</span>

                            <div class="toggle-switch">
                                <span class="switch"></span>
                            </div>
                        </li>
                    </div>
                </div>
            </header>
        </nav>

        <!-- Contenido específico de cada página -->
        <main>
            @yield('navbar') <!-- Contenido dinámico de cada vista -->
            @yield('content') <!-- Contenido dinámico de cada vista -->
        </main>
    </div>
    {{-- script --}}
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");

        // Función para actualizar el margen del contenido
        const updateContentMargin = () => {
            if (sidebar.classList.contains("close")) {
                document.querySelector('.content').style.marginLeft = '88px';
            } else {
                document.querySelector('.content').style.marginLeft = '250px';
            }
        };

        // Agregar el evento de clic para alternar el sidebar
        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            updateContentMargin(); // Actualizamos el margen del contenido cuando se hace clic
        });

        // Cuando el buscador se hace clic, se abre el sidebar
        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
            updateContentMargin();
        });

        // Llamar a la función para asegurarse de que el margen esté correcto al cargar la página
        updateContentMargin();
    </script>

    <!-- Cargar archivos JS específicos si es necesario -->
    <script src="{{ asset('js/script.js') }}"></script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                notificacionExito('{{ session('success') }}');
            });
        </script>
    @endif
    
</body>

</html>