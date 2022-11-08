<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;
    protected $table="encargado";
    protected $fillable=['id','nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada','direccion','celular','telefono_casa','correo','dpi','parentezco_id','created_at','updated_at'];
    public function parentezco(){
        return $this->belongsTo('App\Models\Parentezco');
    }

    public function alumnos(){
        return $this->hasMany('App\Models\Alumno');
    }
}
