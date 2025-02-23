@extends('layouts.app')

@section('title', 'Detalles del Partido')
<h1>Detalles del Partido</h1>
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{ asset('css/partido_selec.css') }}">

<div class="container p-4">
    <div class="partido-card">
        <img src="{{ asset('img/racing.jpg') }}" alt="Equipo Local" class="equipo-logo">
        <div class="contenido">
            <h3 id="fecha-partido">{{ $partido->fecha }}</h3>
            <p>Racing - {{ $partido->rival }}</p>
            <p>Resultado:
                @if ($partido->goles_racing !== null && $partido->goles_rival !== null)
                {{ $partido->goles_racing }} - {{ $partido->goles_rival }}
                @else
                Pendiente
                @endif
            </p>
        </div>
        <img src="{{ asset('img/' . strtolower(str_replace(' ', '_', $partido->rival)) . '.jpg') }}"
            alt="Escudo {{ $partido->rival }}"
            class="equipo-logo">
    </div>

    <h2>Comentarios</h2>
    <ul class="comentarios">
        @foreach ($comentarios as $comentario)
        <li>
            <div class="comentario">
                <p>{{ $comentario->contenido }}</p>
                <small>{{ $comentario->created_at->format('d/m/Y H:i') }}</small>
            </div>
        </li>
        @endforeach
    </ul>

    <h3 id="comentarios">Deja tu comentario</h3>
    <form action="{{ route('comentarios.store', ['partidoId' => $partido->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="partido_id" value="{{ $partido->id }}">
        <textarea name="contenido" required placeholder="Escribe tu comentario aquí..."></textarea>

        <!-- Contenedor para los botones -->
        <div class="botones-container">
            <button type="submit" class="btn-enviar">Enviar</button>
            <a href="{{ route('partidos.index') }}" class="btn-volver">Volver a partidos</a>
        </div>
    </form>

</div>

@endsection