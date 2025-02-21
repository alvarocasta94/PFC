<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha', 'rival', 'goles_racing', 'goles_rival',
    ];

    // Relación con los comentarios (un partido tiene muchos comentarios)
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'partido_id');
    }
}
