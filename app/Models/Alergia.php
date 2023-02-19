<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    use HasFactory;
    protected $table ="alergia";
    protected $fillable = ['id', 'nombre','descripcion','created_at','updated_at','estado'];

    public function obtenerAlergiaById($id) {
        return Alergia::find($id);
    }
    
    public function alumnos(){
        return $this->hasMany('App\Models\Alumno');
    }
}
