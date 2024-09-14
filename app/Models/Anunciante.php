<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anunciante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'subtitulo',
        'contenido',
        'image',
        'link',
        'addedBy',
    ];

    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'addedBy');
    }
}
