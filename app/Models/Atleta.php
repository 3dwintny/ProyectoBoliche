<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    use HasFactory;
    protected $table = "atleta";
    protected $fillable = ['id','fecha_ingreso','adaptado','estado_civil','etnia','escolaridad',
    'centro_id', 'entrenador_id','alumno_id','categoria_id','etapa_deportiva_id','deporte_adaptado_id',
    'otro_programa_id','linea_desarrollo_id','deporte_id','modalidad_id','prt_id','created_at',
    'updated_at'];

    public function alumno(){
        return $this->belongsTo('App\Models\Alumno');
    }

    public function centro(){
        return $this->belongsTo('App\Models\Centro');
    }

    public function entrenador(){
        return $this->belongsTo('App\Models\Entrenador');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function etapa_deportiva(){
        return $this->belongsTo('App\Models\Etapa_Deportiva');
    }

    public function deporte_adaptado(){
        return $this->belongsTo('App\Models\Deporte_Adaptado');
    }

    public function otro_programa(){
        return $this->belongsTo('App\Models\Otro_Programa');
    }

    public function linea_desarrollo(){
        return $this->belongsTo('App\Models\Linea_Desarrollo');
    }

    public function deporte(){
        return $this->belongsTo('App\Models\Deporte');
    }

    public function modalidad(){
        return $this->belongsTo('App\Models\Modalidad');
    }

    public function prt(){
        return $this->belongsTo('App\Models\PRT');
    }

    public function terapias(){
        return $this->hasMany('App\Models\Terapia');
    }
}
