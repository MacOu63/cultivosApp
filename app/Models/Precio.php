<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Precio
 *
 * @property $id
 * @property $precio
 * @property $cultivos_id
 * @property $departamentos_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cultivo $cultivo
 * @property Departamento $departamento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Precio extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['precio', 'cultivos_id', 'departamentos_id'];


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
    
}
