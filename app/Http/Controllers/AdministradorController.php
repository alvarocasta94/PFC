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

    public function gestionarPartidos()
    {
        $partidos = Partido::all();
        return view('admin.gestionar_partidos', compact('partidos'));
    }

    public function gestionarEquipos()
    {
        $equipos = Equipo::all();
        return view('admin.gestionar_equipos', compact('equipos'));
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

        return redirect()->route('admin.gestionar_partidos')->with('success', 'Resultado actualizado');
    }

    public function updateEquipo(Request $request, $equipoId)
    {
        $request->validate([
            'nombre' => 'required|string',
            'puntos' => 'required|integer',
            'partidos_jugados' => 'required|integer',
            'victorias' => 'required|integer',
            'empates' => 'required|integer',
            'derrotas' => 'required|integer',
            'goles_a_favor' => 'required|integer',
            'goles_en_contra' => 'required|integer',
        ]);

        $equipo = Equipo::findOrFail($equipoId);

        $equipo->update($request->all());

        return redirect()->route('admin.gestionar_equipos')->with('success', 'Estadísticas del equipo actualizadas');
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

        $admin = Administrador::where('usuario', $credentials['usuario'])->first();

        if ($admin && $admin->password === $credentials['password']) {
            Auth::guard('admin')->loginUsingId($admin->id);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['usuario' => 'Credenciales incorrectas'])->onlyInput('usuario');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
