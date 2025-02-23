@extends('layouts.admin')

@section('title', 'Gestionar Clasificación')

@section('content')
    <h1>Gestión de Clasificación</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de clasificación -->
    <table class="tabla-gestion">
        <thead>
            <tr>
                <th>Equipo</th>
                <th>Puntos</th>
                <th>PJ</th>
                <th>V</th>
                <th>E</th>
                <th>D</th>
                <th>GF</th>
                <th>GC</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
                <tr>
                    <form action="{{ route('admin.updateEquipo', $equipo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td><input type="text" name="nombre" value="{{ $equipo->nombre }}" required></td>
                        <td><input type="number" name="puntos" value="{{ $equipo->puntos }}" required></td>
                        <td><input type="number" name="partidos_jugados" value="{{ $equipo->partidos_jugados }}" required></td>
                        <td><input type="number" name="victorias" value="{{ $equipo->victorias }}" required></td>
                        <td><input type="number" name="empates" value="{{ $equipo->empates }}" required></td>
                        <td><input type="number" name="derrotas" value="{{ $equipo->derrotas }}" required></td>
                        <td><input type="number" name="goles_a_favor" value="{{ $equipo->goles_a_favor }}" required></td>
                        <td><input type="number" name="goles_en_contra" value="{{ $equipo->goles_en_contra }}" required></td>
                        <td><button type="submit" class="btn">Actualizar</button></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>

    <style>
        .tabla-gestion {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .tabla-gestion th, .tabla-gestion td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .tabla-gestion th {
            background-color: #007bff;
            color: white;
        }
        .tabla-gestion tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .tabla-gestion tr:hover {
            background-color: #ddd;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .alert {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
        }
    </style>
@endsection
