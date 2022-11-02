<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = "alumno";
    protected $fillable = ['id',
    'nombre1',
    'nombre2',
    'nombre3',
    'apellido1',
    'apellido2',
    'cui',
    'fecha',
    'edad',
    'peso',
    'altura',
    'genero',
    'direccion',
    'telefono_casa',
    'celular',
    'correo',
    'contacto_emergencia',
    'foto',
    'fecha_fotografia',
    'estado',
    'nit',
    'pasaporte',
    'id_encargado',
    'id_alergia',
    'id_departamento',
    'id_municipio',
    'id_nacionalidad',
    'created_at',
    'updated_at',
    'id_departamento_residencia',
    'id_municipio_residencia'];
}
