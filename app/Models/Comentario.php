<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'partido_id', 'contenido', 'fecha',
    ];
    

    // Relación con el partido
    public function partido()
    {
        return $this->belongsTo(Partido::class, 'partido_id');
    }
}
