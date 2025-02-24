@extends('layouts.admin')

@section('title', 'Gestionar Partidos')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Gestión de Partidos</h1>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Tabla de partidos -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-secondary text-center">
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
                    <td class="fw-bold text-success">Racing</td>
                    <td>{{ $partido->rival }}</td>
                    <td>{{ $partido->fecha }}</td>
                    <td>
                        @if ($partido->goles_racing !== null && $partido->goles_rival !== null)
                        <span class="badge bg-success">{{ $partido->goles_racing }} - {{ $partido->goles_rival }}</span>
                        @else
                        <span class="badge bg-warning text-dark">Pendiente</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.addResultado', $partido->id) }}" method="POST" class="d-flex flex-column flex-md-row gap-2">
                            @csrf
                            <input type="number" name="goles_racing" class="form-control form-control-sm" placeholder="Goles Racing" value="{{ $partido->goles_racing }}" required>
                            <input type="number" name="goles_rival" class="form-control form-control-sm" placeholder="Goles Rival" value="{{ $partido->goles_rival }}" required>
                            <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection