<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table="horario";
    protected $fillable = ['id','hora_inicio','hora_fin','lunes','martes','miercoles','jueves','viernes','sabado','domingo','created_at','updated_at','centro_id','estado'];

    public function centros(){
        return $this->belongsToMany('App\Models\Centro');
    }

    public function obtenerHorarioById($id){
        return Horario::find($id);
    }
}
