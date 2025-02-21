<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; padding: 20px; background: #f8f9fa; }
        header { background: #333; color: white; padding: 10px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
    </style>
</head>
<body>
    
    <header>
    <nav>
        <ul>
            <li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/partidos') }}">Gestión de Partidos</a></li>
            <li><a href="{{ url('/admin/equipos') }}">Clasificación</a></li>
            <li>
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</header>

    

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
