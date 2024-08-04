<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cultivo
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Consulta[] $consultas
 * @property Precio[] $precios
 * @property Preferencia[] $preferencias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cultivo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultas()
    {
        return $this->hasMany(\App\Models\Consulta::class, 'id', 'cultivos_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function precios()
    {
        return $this->hasMany(\App\Models\Precio::class, 'id', 'cultivos_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preferencias()
    {
        return $this->hasMany(\App\Models\Preferencia::class, 'id', 'cultivos_id');
    }
    
}
