@extends('layouts.admin')

@section('title', 'Gestionar Clasificación')

@section('content')
    <h1>Gestión de Clasificación</h1>

    <!-- Tabla de clasificación -->
    <table border="1">
        <tr>
            <th>Equipo</th>
            <th>Puntos</th>
            <th>Acciones</th>
        </tr>
        @foreach ($equipos as $equipo)
            <tr>
                <td>{{ $equipo->nombre }}</td>
                <td>{{ $equipo->puntos }}</td>
                <td>
                    <form action="{{ url('/admin/equipos') }}" method="POST">
                        @csrf
                        <input type="hidden" name="equipo_id" value="{{ $equipo->id }}">
                        <input type="number" name="puntos" value="{{ $equipo->puntos }}" required>
                        <button type="submit">Actualizar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
