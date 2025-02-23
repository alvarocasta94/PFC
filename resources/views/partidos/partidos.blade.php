@extends('layouts.app')

@section('title', 'Partidos')
<h1>Lista de Partidos</h1>
@section('content')


<!-- Agregar Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{ asset('css/partidos.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach ($partidos as $partido)
        <div class="swiper-slide align-items-center">
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

                <div class="botones-container">
                    <a href="{{ route('partidos.partido', $partido->id) }}" class="btn-comentar">Comentarios</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Controles de navegación -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

    <!-- Paginación -->
    <div class="swiper-pagination"></div>
</div>

<!-- Agregar Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });
</script>

@endsection