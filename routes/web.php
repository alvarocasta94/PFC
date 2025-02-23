<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\AdministradorController;

// Página principal con contenido de inicio
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Rutas de partidos
Route::get('/partidos', [PartidoController::class, 'index'])->name('partidos.index');
Route::get('/partidos/{id}', [PartidoController::class, 'show'])->name('partidos.partido');

// Ruta para comentarios anónimos
Route::post('/comentarios/{partidoId}', [ComentarioController::class, 'store'])->name('comentarios.store');

// Rutas de clasificación
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');

// Rutas de administración con middleware de autenticación
Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdministradorController::class, 'index']);
    Route::post('/admin/equipos', [EquipoController::class, 'update']);
});

// Rutas de autenticación para el administrador
Route::get('/admin/login', [AdministradorController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdministradorController::class, 'login']);
Route::post('/admin/logout', [AdministradorController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdministradorController::class, 'index'])->name('admin.dashboard');
