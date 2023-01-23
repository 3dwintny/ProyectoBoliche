<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;
    protected $table="encargado";
    protected $fillable=['id','nombre1p','nombre2p','nombre3p','apellido1p','apellido2p','apellido_casada',
    'direccionp','celularp','telefono_casap','correop','dpi','parentezco_id','created_at','updated_at'];

    public function parentezco(){
        return $this->belongsTo('App\Models\Parentesco');
    }

    public function alumnos(){
        return $this->hasMany('App\Models\Alumno');
    }
    public function obtenerEncargado()
    {
        return Encargado::all();
    }

}
