@extends('layouts.admin')

@section('title', 'Gestionar Partidos')

@section('content')
    <h1>Gestión de Partidos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Lista de partidos -->
    <table class="tabla-gestion">
        <thead>
            <tr>
                
                <th>Local</th>
                <th>Visitante</th>
                <th>Fecha</th>
                <th>Resultado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partidos as $partido)
                <tr>
                <td>Racing</td>
                <td>{{ $partido->rival }}</td>
                    <td>{{ $partido->fecha }}</td>
                    
                    <td>
                        @if ($partido->goles_racing !== null && $partido->goles_rival !== null)
                            {{ $partido->goles_racing }} - {{ $partido->goles_rival }}
                        @else
                            Pendiente
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.addResultado', $partido->id) }}" method="POST">
                            @csrf
                            <input type="number" name="goles_racing" placeholder="Goles Racing" value="{{ $partido->goles_racing }}" required>
                            <input type="number" name="goles_rival" placeholder="Goles Rival" value="{{ $partido->goles_rival }}" required>
                            <button type="submit" class="btn">Actualizar</button>
                        </form>
                    </td>
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
