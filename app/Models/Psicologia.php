<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psicologia extends Model
{
    use HasFactory;
    protected $table="psicologia";
    protected $fillable = ['id','nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada',
    'colegiado','telefono','correo','direccion','fecha_inicio_labores','created_at','updated_at'];
    public function terapias(){
        return $this->hasMany('App\Models\Terapia');
    }

    public function obtenerPsicologiaById($id){
        return Psicologia::find($id);
    }
}
