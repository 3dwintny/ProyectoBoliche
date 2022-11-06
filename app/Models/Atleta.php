<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    use HasFactory;
    protected $table = "atleta";
    protected $fillable = ['id','fecha_ingreso','adaptado','estado_civil','etnia','escolaridad','centro_id', 'entrenador_id','alumno_id','categoria_id','etapa_deportiva_id','asistencia_id','otro_programa_id','linea_desarrollo_id','deporte_id','modalidad_id','prt_id','created_at','updated_at'];
    
    public function alumno(){
        return $this->belongsTo('App\Models\Alumno');
    }
    
}
