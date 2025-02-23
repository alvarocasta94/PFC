@extends('layouts.app')

@section('title', 'Clasificación')

@section('content')
    <h1>Clasificación</h1>
    <link rel="stylesheet" href="{{ asset('css/equipos.css') }}">
    <div class="tabla-container">
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
    </div>

    <style>
        .tabla-container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }
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
            background-color: #007bff;
            color: white;
        }
        .tabla-clasificacion tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .tabla-clasificacion tr:hover {
            background-color: #ddd;
        }
        .fondo-verde {
            background-color: #98FB98 !important; /* Color verde claro */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .tabla-container {
                padding: 10px;
            }

            .tabla-clasificacion th, .tabla-clasificacion td {
                padding: 8px;
            }

            h1 {
                font-size: 1.5rem;
            }

            .tabla-clasificacion {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .tabla-clasificacion th, .tabla-clasificacion td {
                display: inline-block;
                width: auto;
                text-align: left;
            }

            .tabla-clasificacion th {
                background-color: #007bff;
                color: white;
                position: sticky;
                top: 0;
                z-index: 1;
            }
        }
    </style>
@endsection
