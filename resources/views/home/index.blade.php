@extends('layouts.app')
@section('title', 'Inicio')
<h1>Real Racing Club</h1>
@section('content')

<link rel="stylesheet" href="{{ asset('css/partidos.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

<div class="container-fluid">
    <div class="inicio-container fade-in">
        <div class="inicio-card slide-up">

            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-calendar-week-fill" viewBox="0 0 16 16">
                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2M9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5m3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5M2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5" />
            </svg>

            <h2>Próximos Partidos</h2>
            <p>Consulta los próximos partidos del Racing y no te pierdas ningún detalle.</p>
            <a href="{{ url('/partidos') }}" class="btn-ver-partidos">Ver partidos</a>
        </div>
        <div class="inicio-card slide-up">

            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-trophy-fill" viewBox="0 0 16 16">
                <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935" />
            </svg>

            <h2>Clasificación</h2>
            <p>Revisa la clasificación actual y sigue el progreso del equipo.</p>
            <a href="{{ url('/equipos') }}" class="btn-ver-clasificacion">Ver clasificación</a>
        </div>
    </div>
</div>

@endsection