@extends('layouts.app')

@section('title', 'Clasificación')

@section('content')
    <h1>Clasificación</h1>
    <link rel="stylesheet" href="{{ asset('css/equipos.css') }}">
    <table class="tabla-clasificacion">
        <thead>
            <tr>
                <th>Pos</th>
                <th>Equipo</th>
                <th>Puntos</th>
                <th>PJ</th>
                <th>V</th>
                <th>E</th>
                <th>D</th>
                <th>GF</th>
                <th>GC</th>
                <th>DG</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($equipos as $index => $equipo)
        <tr class="{{ strcasecmp(trim($equipo->nombre), 'Racing') == 0 ? 'fondo-verde' : '' }}">
            <td>{{ $index + 1 }}</td>
            <td>{{ $equipo->nombre }}</td>
            <td>{{ $equipo->puntos }}</td>
            <td>{{ $equipo->partidos_jugados }}</td>
            <td>{{ $equipo->victorias }}</td>
            <td>{{ $equipo->empates }}</td>
            <td>{{ $equipo->derrotas }}</td>
            <td>{{ $equipo->goles_a_favor }}</td>
            <td>{{ $equipo->goles_en_contra }}</td>
            <td>{{ $equipo->goles_a_favor - $equipo->goles_en_contra }}</td>
        </tr>
    @endforeach
</tbody>
    </table>

    <style>
        .tabla-clasificacion {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .tabla-clasificacion th, .tabla-clasificacion td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .tabla-clasificacion th {
            background-color: #4CAF50;
            color: white;
        }
        .tabla-clasificacion tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .tabla-clasificacion tr:hover {
            background-color: #ddd;
        }
        /* Nueva clase para el fondo verde con !important */
        .fondo-verde {
            background-color: #98FB98 !important; /* Color verde claro */
        }
    </style>
@endsection
