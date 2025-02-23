@extends('layouts.app')

@section('title', 'Clasificación')
<h1>Clasificación</h1>
@section('content')

<link rel="stylesheet" href="{{ asset('css/equipos.css') }}">
<div class="tabla-container">
    <table class="tabla-clasificacion">
        <thead>
            <tr>
                <th>Posición</th>
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

@endsection