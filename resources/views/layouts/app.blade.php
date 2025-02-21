<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; padding: 20px; }
        header { background: #333; color: white; padding: 10px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; }
        .container { max-width: 800px; margin: auto; }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ url('/partidos') }}">Partidos</a>
            <a href="{{ url('/equipos') }}">Clasificación</a>
            <a href="{{ url('/admin/login') }}">Admin</a>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
