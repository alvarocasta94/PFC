@extends('layouts.app')

@section('title', 'Detalles del Partido')

@section('content')
    <h1>Detalles del Partido</h1>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/partidos.css') }}">
    <div class="contenedor">
        <div class="partido-card">
            <img src="{{ asset('img/racing.jpg') }}" alt="Equipo Local" class="equipo-logo">
            <div class="contenido">
                <h3>{{ $partido->fecha }}</h3>
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

        <h3>Deja tu comentario</h3>
        <form action="{{ route('comentarios.store', ['partidoId' => $partido->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="partido_id" value="{{ $partido->id }}">
            <textarea name="contenido" required placeholder="Escribe tu comentario aquí..."></textarea>
            <button type="submit" class="btn-enviar">Enviar</button>
        </form>

        <a href="{{ route('partidos.index') }}" class="btn-volver">Volver a la lista de partidos</a>
    </div>

    <style>
        .contenedor {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }
        .partido-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .equipo-logo {
            width: 80px;
            height: auto;
            margin: 10px 0;
        }
        .contenido {
            text-align: center;
        }
        .comentarios {
            list-style: none;
            padding: 0;
        }
        .comentarios li {
            margin-bottom: 10px;
        }
        .comentario {
            background: #f4f4f9;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .comentario p {
            margin: 0;
        }
        .comentario small {
            display: block;
            text-align: right;
            color: #666;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }
        .btn-enviar {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 6px;
            transition: background 0.3s ease, transform 0.2s ease;
            border: none;
            cursor: pointer;
        }
        .btn-enviar:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .btn-volver {
            display: inline-block;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 6px;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .btn-volver:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
@endsection
