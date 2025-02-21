@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <h1>Iniciar Sesión</h1>
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Iniciar sesión</button>
    </form>
@endsection
