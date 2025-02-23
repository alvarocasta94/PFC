<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar">
            <div class="container">
                <a href="{{ url('/admin') }}" class="navbar-brand">Admin Panel</a>
                <div class="navbar-nav">
                    <a href="{{ url('/admin/partidos') }}" class="nav-item nav-link">Gestionar Partidos</a>
                    <a href="{{ url('/admin/equipos') }}" class="nav-item nav-link">Gestionar Clasificación</a>
                    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-item nav-link btn-link">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
