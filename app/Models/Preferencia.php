<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Preferencia
 *
 * @property $id
 * @property $usuarios_id
 * @property $cultivos_id
 * @property $departamentos_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cultivo $cultivo
 * @property Departamento $departamento
 * @property Usuario $usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Preferencia extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['usuarios_id', 'cultivos_id', 'departamentos_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cultivo()
    {
        return $this->belongsTo(\App\Models\Cultivo::class, 'cultivos_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class, 'departamentos_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'usuarios_id', 'id');
    }
    
}
