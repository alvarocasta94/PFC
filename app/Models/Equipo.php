<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipos';  // Asegúrate de que el nombre sea 'equipos'

    protected $fillable = [
        'nombre', 'puntos', 'partidos_jugados', 'victorias', 'empates', 'derrotas', 'goles_a_favor', 'goles_en_contra',
    ];
}
