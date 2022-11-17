<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = "alumno";
    protected $fillable = [
    'id',
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
    'encargado_id',
    'alergia_id',
    'departamento_id',
    'municipio_id',
    'nacionalidad_id',
    'created_at',
    'updated_at',
    'departamento_residencia_id',
    'municipio_residencia_id'];

    public function obtener_nombre($id)
    {
        return Alumno::find($id);
    }
    public function atletas(){
        return $this->hasMany('App\Models\Atleta');
    }

    public function alergia(){
        return $this->belongsTo('App\Models\Alergia');
    }

    public function departamento(){
        return $this->belongsTo('App\Models\Departamento');
    }

    public function departamento_residencia(){
        return $this->belongsTo('App\Models\Departamento');
    }

    public function encargado(){
        return $this->belongsTo('App\Models\Encargado');
    }

    public function municipio(){
        return $this->belongsTo('App\Models\Municipio');
    }

    public function municipio_residencia(){
        return $this->belongsTo('App\Models\Municipio');
    }

    public function nacionalidad(){
        return $this->belongsTo('App\Models\Nacionalidad');
    }
}
