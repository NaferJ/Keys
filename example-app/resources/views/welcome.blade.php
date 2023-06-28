<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

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
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
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

        .login-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3490dc;
            color: #ffffff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .login-button:hover {
            background-color: #2979bd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Lobby') }}</div>
            <div class="card-body">
                <!-- Pills navs -->
                <div class="login-container">
                    <div class="d-flex">
                        <a class="login-button" id="tab-login" data-mdb-toggle="pill" href="{{ route('login') }}" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                        <a class="login-button" id="tab-login" data-mdb-toggle="pill" href="{{ route('register') }}" role="tab" aria-controls="pills-login" aria-selected="true">Register</a>
                    </div>
                </div>

                <button onclick="toggleDarkMode()" id="darkModeButton">Toggle Dark Mode</button>
            </div>
            <div class="text-center text-sm text-gray-500 version-info">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>

    <script>
        // Función para activar o desactivar el modo oscuro
        function toggleDarkMode() {
            const body = document.querySelector('body');
            body.classList.toggle('dark');
            const isDarkMode = body.classList.contains('dark');
            localStorage.setItem('darkMode', isDarkMode);
        }

        // Restaurar el modo oscuro al cargar la página
        function restoreDarkMode() {
            const isDarkMode = localStorage.getItem('darkMode') === 'true';
            const body = document.querySelector('body');
            if (isDarkMode) {
                body.classList.add('dark');
            } else {
                body.classList.remove('dark');
            }
        }

        // Llamar a la función de restaurar el modo oscuro al cargar la página
        restoreDarkMode();
    </script>
</body>
</html>
