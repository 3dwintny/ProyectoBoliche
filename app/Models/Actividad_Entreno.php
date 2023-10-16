<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad_Entreno extends Model
{
    use HasFactory;
    protected $table = 'actividad_entreno';
    protected $fillable =['id','fecha','actividad','entrenador_id','created_at','updated_at'];

    public function actividad_atleta(){
        return $this->hasMany('App\Models\Actividad_Atleta');
    }

    public function entrenador(){
        return $this->belongsTo('App\Models\Entrenador');
    }
}