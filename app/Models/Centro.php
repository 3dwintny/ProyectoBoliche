<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;
    protected $table = "centro";

    protected $fillable =['id','nombre','direccion','fecha_registro','institucion','accesibilidad',
    'implementacion','espacio_fisico','departamento_id','created_at','updated_at','estado'];
    public function departamento(){
        return $this->belongsTo('App\Models\Departamento');
    }

    public function horarios(){
        return $this->belongsToMany('App\Models\Horario');
    }

    public function atletas(){
        return $this->hasMany('App\Models\Atleta');
    }

    public function obtenerCentroById($id){
        return Centro::find($id);
    }
}
