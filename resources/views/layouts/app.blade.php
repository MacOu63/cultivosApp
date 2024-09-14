<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<title>{{ config('app.name', 'AgroMarket') }}</title>-->
    <title>Agro Market - Administración</title>
    <link rel="icon" type="image/x-icon" href="assets/IconoAgri.png" />
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Estilo de la tabla */
        .table-container table {
            color: black !important;
            font-size: 16px !important;
            background-color: #f8f9fa;
        }

        .table-container th, .table-container td {
            border-color: #ddd !important;
        }

        /* Ajuste de tamaño para los botones de la tabla */
        .table-container .btn {
            padding: 5px 10px !important;
            font-size: 14px !important;
            width: auto !important;
        }

        /* Estilos para la barra lateral */
        .col-md-2.bg-dark {
            background-color: #343a40 !important;
            color: #ffffff !important;
        }

        .col-md-2.bg-dark .nav-link {
            color: #ffffff !important;
            font-weight: 500 !important;
            padding: 10px 15px !important;
            border-radius: 5px !important;
            margin-bottom: 10px !important;
            text-decoration: none !important;
        }

        .col-md-2.bg-dark .nav-link.active,
        .col-md-2.bg-dark .nav-link:hover {
            background-color: #007bff !important;
            color: #fff !important;
        }

        .col-md-2.bg-dark .navbar-brand {
            font-weight: bold !important;
            margin-bottom: 20px !important;
        }

        .navbar-brand-container {
            padding: 20px !important;
            background-color: #2c2f33 !important;
            width: 100% !important;
            height: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2) !important;
            margin-bottom: 30px !important;
        }

        /* Estilos para la paginación */
        .pagination .page-link {
            color: #ffffff !important;
            background-color: #333 !important;
            border: none !important;
            padding: 4px 8px !important;
            font-size: 12px !important;
            border-radius: 4px !important;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff !important;
            border-color: #007bff !important;
        }

        .pagination .page-link:hover {
            background-color: #444 !important;
        }

        .pagination .page-link svg {
            fill: #ffffff !important;
        }

        /* Estilo del contenedor principal de la tabla */
        .table-container {
            background-color: #fff !important;
            color: #000 !important;
            padding: 15px !important;
            border-radius: 8px !important;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2) !important;
        }

        .pagination .relative.inline-flex.items-center svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        /* Barra superior compacta */
        .navbar-profile {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            background-color: #2c3e50;
            color: white;
            padding: 10px;
        }

        .navbar-profile img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .navbar-profile h4, .navbar-profile span {
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        .navbar-profile h4 {
            font-size: 16px;
            font-weight: bold;
        }

        .navbar-profile span {
            display: block;
            font-size: 12px;
            color: #ecf0f1;
        }

        /* Para alinear contenido del navbar */
        .navbar-custom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2c3e50;
            padding: 0 20px;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .navbar-custom .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        @media (max-width: 768px) {
            /* Ajustar la barra lateral para pantallas pequeñas */
            .col-md-2.bg-dark {
                width: 100%;
                min-height: auto;
                position: relative;
                padding: 10px 0;
            }

            /* Ocultar el texto de los enlaces del menú y dejar solo los íconos */
            .col-md-2.bg-dark .nav-link {
                font-size: 21px;
                padding: 8px 0;
                text-align: center;
            }

            .col-md-2.bg-dark .nav-link::before {
                display: block;
                font-size: 18px;
                margin-bottom: 5px;
            }

            /* Hacer la tabla más flexible */
            .table-container table {
                font-size: 14px;
                width: 100%;
            }

            .table-container .btn {
                font-size: 12px;
                padding: 4px 8px;
            }

            .table-container th, .table-container td {
                padding: 8px;
            }

            /* Ajustar la barra de navegación superior */
            .navbar-custom {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar-profile {
                justify-content: space-between;
                width: 100%;
                margin-top:20px;
                padding: 5px;
            }

            .navbar-toggler {
                margin-top: 10px;
                margin-bottom: 40px;
            }

            .navbar-brand {
                width: 200px;
                align-items:center;
                justify-content:center;
                margin-left:20px;
            }
        }

        @media (max-width: 1068px) {
            /* Ajustar la barra lateral para pantallas pequeñas */
            .col-md-2.bg-dark {
                width: 100%;
                min-height: auto;
                position: relative;
                padding: 10px 0;
            }

            /* Ocultar el texto de los enlaces del menú y dejar solo los íconos */
            .col-md-2.bg-dark .nav-link {
                font-size: 21px;
                padding: 8px 0;
                text-align: center;
            }

            .col-md-2.bg-dark .nav-link::before {
                display: block;
                font-size: 18px;
                margin-bottom: 5px;
            }

            /* Hacer la tabla más flexible */
            .table-container table {
                font-size: 14px;
                width: 100%;
            }

            .table-container .btn {
                font-size: 12px;
                padding: 4px 8px;
            }

            .table-container th, .table-container td {
                padding: 8px;
            }

            /* Ajustar la barra de navegación superior */
            .navbar-custom {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
            }

            .navbar-profile {
                justify-content: space-between;
                width: 100%;
                margin-top:20px;
                padding: 5px;
            }

            .navbar-toggler {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .navbar-brand {
                width: 200px;
                align-items:center;
                justify-content:center;
                margin-left:20px;
            }

            .col-md-10{
                width: 100%;
            }
        }

        /* Footer Styles */
        footer {
            background-color: #2c2f33;
            color: #fff;
            padding: 20px 0;
        }
    
        .footer-bottom {
            text-align: center;
            border-top: 1px solid #333;
            margin-top: -20px;
            padding-top: 30px;
        }
    </style>

    <script>
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm("¿Estás seguro que quieres cerrar sesión?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
</head>
<body>
    <div id="app" class="container-fluid">
        <div class="row">
            <!-- Menú Vertical -->
            <div class="col-md-2 bg-dark" style="min-height: 100vh;">
                <nav class="navbar navbar-dark flex-column">
                    <div class="navbar-brand-container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('assets/iconoAgri.png') }}" alt="AgroMarket Logo" style="max-width: 100%; height: auto; margin-bottom: 15px;">
                            <br>
                            <h4 style="font-family: 'Lora'; font-size: 28px; text-align: center; color: white;">
                                 AgroMarket
                            </h4>
                        </a>
                    </div>
                    
                    @if (Auth::check())
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cultivos.index') }}">{{ __('Cultivos') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('precios.index') }}">{{ __('Precios') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('departamentos.index') }}">{{ __('Departamentos') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('usuarios.index') }}">{{ __('Usuarios') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('noticias.index') }}">{{ __('Noticias') }}</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('anunciantes.index') }}">{{ __('Anunciantes') }}</a>
                            </li>
                        </ul>
                    @endif
                </nav>
            </div>

            <!-- Contenido Principal -->
            <div class="col-md-10">
                <!-- Nueva barra superior con nombre, rol e imagen -->
                <nav class="navbar navbar-custom">
                    <div class="navbar-profile">
                        <img id="avatarPreview" src="{{ Auth::user()->image ? asset('avatars/' . Auth::user()->image) : asset('images/default-avatar.jpg') }}" alt="Avatar">
                        <div>
                            <h4>{{ Auth::user()->nombre_usuario }} {{ Auth::user()->apellido_usuario }}</h4>
                            <span>{{ Auth::user()->rol }}</span>
                        </div>
                    </div>

                    <!-- Botón de alternancia -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16" onclick="confirmLogout(event)">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
                        </svg>
                    </button>
                </nav>

                <main class="py-4 table-container">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Formulario de cierre de sesión -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <footer>
        <div class="footer-bottom">
            <p>&copy; Agro Market - Tu Portal de Información Agrícola - Todos los Derechos Reservados - 2024</p>
        </div>
    </footer>

</body>
</html>