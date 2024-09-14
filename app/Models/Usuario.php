<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mchev\Banhammer\Traits\Bannable; // Importar el trait Bannable

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable, Bannable;

    protected $fillable = [
        'nombre_usuario',
        'apellido_usuario',
        'image',
        'rol',
        'telefono',
        'password',
        'banned',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Agregar el cast para el campo banned
    protected $casts = [
        'banned' => 'boolean',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getAuthIdentifierName()
    {
        return 'telefono';
    }
}
