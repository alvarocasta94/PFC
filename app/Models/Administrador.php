<?php


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrador extends Authenticatable
{
    use HasFactory;

    protected $table = 'administradores'; // Nombre correcto de la tabla

    protected $fillable = ['usuario', 'password']; // Campos permitidos

    protected $hidden = ['password']; // Oculta el password al devolver JSON
}
