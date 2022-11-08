<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = "municipio";
    protected $fillable = ['id','nombre','created_at','updated_at','departamento_id'];

    public function departamento(){
        return $this->belongsTo('App\Models\Departamento');
    }

    public function alumnos(){
        return $this->hasMany('App\Models\Alumno');
    }
}
