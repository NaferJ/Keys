<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        * {
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7fafc;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: ;
        }

        .card {
            width: 600px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            margin-top: 80px;
            margin-right: 350px;
        }

        .card-header {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 10px;
            
            text-align: center;
        }

        .nav-pills {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .nav-pills .nav-link {
            border-radius: 20px;
            padding: 8px 20px;
            color: #ffffff;
            background-color: #3490dc;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-pills .nav-link.active {
            background-color: #ffffff;
            color: #3490dc;
        }

        .text-center {
            text-align: center;
        }

        .text-sm {
            font-size: 14px;
        }

        .text-gray-500 {
            color: #777777;
        }

        .dark .text-gray-500 {
            color: #cccccc;
        }

        .text-right {
            text-align: right;
        }

        .version-info {
            margin-top: 20px;
            font-size: 12px;
            color: #777777;
        }

        .dark {
            background-color: #333333;
            color: #ffffff;
        }

        .dark .card {
            background-color: #444444;
            box-shadow: 0 2px 4px rgba(255, 255, 255, 0.1);
        }

        .dark .nav-pills .nav-link {
            background-color: #ffffff;
            color: #333333;
        }

        .dark .nav-pills .nav-link.active {
            background-color: #333333;
            color: #ffffff;
        }

        #darkModeButton {
            position: absolute;
            top: 10px;
            right: 10px;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            background-color: #3490dc;
            color: #ffffff;
            transition: background-color 0.3s ease, color 0.3s ease;
            cursor: pointer;
        }

        #darkModeButton:hover {
            background-color: #ffffff;
            color: #3490dc;
        }

        .login-container {
            display: flex;
            justify-content: center;
        }
        
        /* Estilos para el botón de modo oscuro en el navbar */
        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #cccccc;
        }
        
        /* Estilos para el botón de modo oscuro en el navbar */
        .navbar-dark .navbar-nav .nav-link .dark-mode-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #3490dc;
            color: #ffffff;
            transition: background-color 0.3s ease, color 0.3s ease;
            cursor: pointer;
        }

        .navbar-dark .navbar-nav .nav-link .dark-mode-button:hover {
            background-color: #ffffff;
            color: #3490dc;
        }

        .navbar-dark .navbar-nav .nav-link .dark-mode-button i {
            margin-right: 5px;
        }

        .navbar-dark .navbar-nav .nav-link .dark-mode-button.dark {
            background-color: #ffffff;
            color: #3490dc;
        }

        .navbar-dark .navbar-nav .nav-link .dark-mode-button.dark i {
            transform: rotate(180deg);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    
                    <!-- Botón de modo oscuro -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link dark-mode-button" href="#" onclick="toggleDarkMode()">
                                <i class="fas fa-moon"></i> Modo Oscuro
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleDarkMode() {
            const body = document.body;
            const navbar = document.querySelector(".navbar");
            const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
            const darkModeButton = document.querySelector(".dark-mode-button");

            body.classList.toggle("dark");
            navbar.classList.toggle("navbar-dark");
            navbar.classList.toggle("navbar-light");
            navLinks.forEach((link) => link.classList.toggle("dark"));
            darkModeButton.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                darkModeButton.innerHTML = '<i class="fas fa-sun"></i> Modo Claro';
                localStorage.setItem("darkMode", "true");
            } else {
                darkModeButton.innerHTML = '<i class="fas fa-moon"></i> Modo Oscuro';
                localStorage.setItem("darkMode", "false");
            }
        }

        // Verificar el estado del modo oscuro al cargar la página
        function checkDarkMode() {
            const darkMode = localStorage.getItem("darkMode");
            const body = document.body;
            const navbar = document.querySelector(".navbar");
            const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
            const darkModeButton = document.querySelector(".dark-mode-button");

            if (darkMode === "true") {
                body.classList.add("dark");
                navbar.classList.add("navbar-dark");
                navbar.classList.remove("navbar-light");
                navLinks.forEach((link) => link.classList.add("dark"));
                darkModeButton.classList.add("dark");
                darkModeButton.innerHTML = '<i class="fas fa-sun"></i> Modo Claro';
            }
        }

        // Ejecutar la función al cargar la página
        checkDarkMode();
    </script>
</body>
</html>
