<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /**
	 * Los atributos que son asignados masivamente.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nombre', 'slogan', 'sigla', 'email','telefono', 'logo', 'direccion', 'zona'
	];

	/**
	 * Convertir el atributo nombre a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
	public function setNombreAttribute($value)
	{
		$this->attributes['nombre'] = mb_strtoupper($value);
	}

	/**
	 * Convertir el atributo sigla a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
	public function setSiglaAttribute($value)
	{
		$this->attributes['sigla'] = mb_strtoupper($value);
	}

	/**
	 * Convertir el atributo direccion a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
	public function setDireccionAttribute($value)
	{
		$this->attributes['direccion'] = mb_strtoupper($value);
	}

	/**
	 * Convertir el atributo zona a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
	public function setZonaAttribute($value)
	{
		$this->attributes['zona'] = mb_strtoupper($value);
  }
}
