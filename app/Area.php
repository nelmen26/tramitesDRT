<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'activo'
    ];

    /**
     * Convertir el atributo nombres a mayusculas cuando se guarda o se edita.
     *
     * @var value
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value);
    }
    
    /**
     * Convertir el atributo nombres a mayusculas cuando se guarda o se edita.
     *
     * @var value
     */
    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = mb_strtoupper($value);
    }

    /**
     * Darle nombre al estado dependiendo del binario
     *
     * 1: ACTIVO
     * 0: INACTIVO
     *
     */
    public function getFullEstadoAttribute()
    {
        return $this->activo==1 ? 'ACTIVO' : 'INACTIVO';
    }
}
