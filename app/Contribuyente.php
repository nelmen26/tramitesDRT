<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model
{
    protected $fillable = [
        'carnet',
        'nombres'
    ];

    /**
	 * Convertir el atributo nombres a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
    public function setNombresAttribute($value)
    {
        $this->attributes['nombres'] = mb_strtoupper($value);
    }

    /**
	 * Convertir el atributo carnet a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
    public function setCarnetAttribute($value)
    {
        $this->attributes['carnet'] = mb_strtoupper($value);
    }
}
