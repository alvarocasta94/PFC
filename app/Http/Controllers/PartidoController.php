<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Comentario;
use Illuminate\Http\Request;


class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::orderBy('fecha')->get();
        return view('partidos.partidos', compact('partidos'));
    }

    public function show($id)
    {
        // Buscar el partido por su ID
        $partido = Partido::findOrFail($id);

        // Obtener los comentarios asociados al partido
        $comentarios = Comentario::where('partido_id', $partido->id)->get();

        // Pasar los comentarios a la vista
        return view('partidos.partido', compact('partido', 'comentarios'));
    }
}
