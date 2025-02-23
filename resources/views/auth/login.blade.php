@extends('layouts.app')

@section('title', 'Admin Login')
<h1>Iniciar Sesión</h1>
@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="contenedor-login">
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button class="btn" type="submit">Iniciar sesión</button>
    </form>
</div>
@endsection