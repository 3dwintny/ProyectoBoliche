<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = "departamento";
    protected $fillable = ['id','nombre','created_at','updated_at','estado'];

    public function municipios(){
        return $this->hasMany('App\Models\Municipio');
    }

    public function centros(){
        return $this->hasMany('App\Models\Centro');
    }

    public function alumnos(){
        return $this->hasMany('App\Models\Alumno');
    }

    public function entrenadores(){
        return $this->hasMany('App\Models\Entrenador');
    }
}
