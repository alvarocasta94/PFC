@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenido a la web del Racing</h1>
    <link rel="stylesheet" href="{{ asset('css/partidos.css') }}">
    <div class="inicio-container">
        <div class="inicio-card">
            <h2>Próximos Partidos</h2>
            <p>Consulta los próximos partidos del Racing y no te pierdas ningún detalle.</p>
            <a href="{{ url('/partidos') }}" class="btn-ver-partidos">Ver partidos</a>
        </div>
        <div class="inicio-card">
            <h2>Clasificación</h2>
            <p>Revisa la clasificación actual y sigue el progreso del equipo.</p>
            <a href="{{ url('/equipos') }}" class="btn-ver-clasificacion">Ver clasificación</a>
        </div>
    </div>

    <style>
        .inicio-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .inicio-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 45%;
            margin: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .inicio-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
        }
        .btn-ver-partidos, .btn-ver-clasificacion {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 6px;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .btn-ver-partidos:hover, .btn-ver-clasificacion:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
@endsection
