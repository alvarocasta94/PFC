<?php

// app/Http/Controllers/EquipoController.php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::orderByDesc('puntos')->get();
        return view('home.equipos', compact('equipos'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'puntos' => 'required|integer',
        ]);

        Equipo::updateOrCreate(
            ['nombre' => $request->nombre],
            ['puntos' => $request->puntos]
        );

        return redirect()->route('equipos')->with('success', 'Clasificación actualizada');
    }

    public function mostrarEquipo()
    {
        // Obtener los datos de la clasificación
        $equipos = Equipo::all();
    
        // Pasar la variable a la vista
        return view('home.equipos', compact('equipos'));
    }
    
}
