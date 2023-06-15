<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos_encargados extends Model
{
    use HasFactory;
    protected $table = "alumnos_encargados";
    protected $fillable = [
    'id',
    'alumno_id',
    'encargado_id'
    ];

    public function obtener_alumnos_encargados($id)
    {
        return Alumnos_encargados::find($id);
    }

    public function encargado(){
        return $this->hasMany('App\Models\Encargado');
    }
    public function alumnos(){
        return $this->hasMany('App\Models\Alumno');
    }
}
