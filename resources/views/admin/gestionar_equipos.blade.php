@extends('layouts.admin')

@section('title', 'Gestionar Clasificación')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Gestión de Clasificación</h1>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Tabla de clasificación -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-secondary text-center">
                <tr>
                    <th>Equipo</th>
                    <th>Puntos</th>
                    <th>PJ</th>
                    <th>V</th>
                    <th>E</th>
                    <th>D</th>
                    <th>GF</th>
                    <th>GC</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                <tr>
                    <form action="{{ route('admin.updateEquipo', $equipo->id) }}" method="POST" class="d-flex flex-column flex-md-row gap-2 align-items-center">
                        @csrf
                        @method('PUT')
                        <td><input type="text" name="nombre" class="form-control form-control-sm text-center" value="{{ $equipo->nombre }}" required></td>
                        <td><input type="number" name="puntos" class="form-control form-control-sm text-center" value="{{ $equipo->puntos }}" required></td>
                        <td><input type="number" name="partidos_jugados" class="form-control form-control-sm text-center" value="{{ $equipo->partidos_jugados }}" required></td>
                        <td><input type="number" name="victorias" class="form-control form-control-sm text-center" value="{{ $equipo->victorias }}" required></td>
                        <td><input type="number" name="empates" class="form-control form-control-sm text-center" value="{{ $equipo->empates }}" required></td>
                        <td><input type="number" name="derrotas" class="form-control form-control-sm text-center" value="{{ $equipo->derrotas }}" required></td>
                        <td><input type="number" name="goles_a_favor" class="form-control form-control-sm text-center" value="{{ $equipo->goles_a_favor }}" required></td>
                        <td><input type="number" name="goles_en_contra" class="form-control form-control-sm text-center" value="{{ $equipo->goles_en_contra }}" required></td>
                        <td><button type="submit" class="btn btn-sm btn-primary">Actualizar</button></td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection