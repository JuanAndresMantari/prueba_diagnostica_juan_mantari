<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $dni
 * @property $correo
 * @property $fecha_nacimiento
 * @property $area
 * @property $cargo
 * @property $local
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $tipo_contrato
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'nombres' => 'required',
		'apellidos' => 'required',
		'dni' => 'required',
		'correo' => 'required',
		'fecha_nacimiento' => 'required',
		'area' => 'required',
		'cargo' => 'required',
		'local' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
		'tipo_contrato' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','apellidos','dni','correo','fecha_nacimiento','area','cargo','local','fecha_inicio','fecha_fin','tipo_contrato'];



}
