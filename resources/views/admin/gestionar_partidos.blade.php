@extends('layouts.admin')

@section('title', 'Gestionar Partidos')

@section('content')
    <h1>Gestión de Partidos</h1>

    <!-- Lista de partidos -->
    <table border="1">
        <tr>
            <th>Local</th>
            <th>Visitante</th>
            <th>Fecha</th>
            <th>Resultado</th>
            <th>Acciones</th>
        </tr>
        @foreach ($partidos as $partido)
            <tr>
                <td>{{ $partido->equipo_local }}</td>
                <td>{{ $partido->equipo_visitante }}</td>
                <td>{{ $partido->fecha }}</td>
                <td>{{ $partido->resultado ?? 'Pendiente' }}</td>
                <td>
                    <form action="{{ url('/admin/partidos/resultado/' . $partido->id) }}" method="POST">
                        @csrf
                        <input type="text" name="resultado" placeholder="Ej: 2-1" required>
                        <button type="submit">Actualizar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
