@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenido a la web del Racing</h1>
    <p>Aquí encontrarás toda la información sobre los partidos y la clasificación.</p>
    <a href="{{ url('/partidos') }}">Ver partidos</a>
@endsection
