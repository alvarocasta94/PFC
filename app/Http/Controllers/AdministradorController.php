<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministradorController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function addResultado(Request $request, $partidoId)
    {
        $request->validate([
            'goles_racing' => 'required|integer',
            'goles_rival' => 'required|integer',
        ]);

        $partido = Partido::findOrFail($partidoId);

        $partido->update([
            'goles_racing' => $request->goles_racing,
            'goles_rival' => $request->goles_rival,
        ]);

        $this->actualizarEquipo($partido);

        return redirect()->route('admin.gestionar_partidos')->with('success', 'Resultado actualizado');
    }

    public function actualizarEquipo($partido)
    {
        $local = Equipo::where('equipo', 'Racing')->first();
        $visitante = Equipo::where('equipo', $partido->rival)->first();

        if (!$local || !$visitante) {
            return;
        }

        if ($partido->goles_racing > $partido->goles_rival) {
            $local->increment('puntos', 3);
        } elseif ($partido->goles_racing < $partido->goles_rival) {
            $visitante->increment('puntos', 3);
        } else {
            $local->increment('puntos', 1);
            $visitante->increment('puntos', 1);
        }

        $local->save();
        $visitante->save();
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
    
        return back()->withErrors(['usuario' => 'Credenciales incorrectas'])->onlyInput('usuario');
    }
}
