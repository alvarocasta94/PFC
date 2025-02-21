<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, $partidoId)
{
    $request->validate([
        'contenido' => 'required|max:255',
    ]);

    Comentario::create([
        'partido_id' => $partidoId,
        'contenido' => $request->contenido,
        'fecha' => now(), // Agregamos la fecha actual
    ]);

    return redirect()->route('partidos.partido', $partidoId)->with('success', 'Comentario añadido');
}

}
