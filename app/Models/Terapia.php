<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terapia extends Model
{
    use HasFactory;
    protected $table = "terapia";
    protected $fillable =['id','numero_terapia','fecha','hora_inicio','impresion_clinica',
    'analisis_semiologico','desarrollo','observaciones','tarea','estado_tarea','conciencia_corporal','dominio_corporal',
    'dominio_respiracion','dialogo_interno','atencion','concentracion','motivacion','confianza',
    'activacion','relajacion','estres','ansiedad_cognitiva','ansiedad_fisica','miedo','frustracion',
    'atleta_id','psicologia_id','created_at','updated_at'];

    public function psicologia(){
        return $this->belongsTo('App\Models\Psicologia');
    }

    public function atleta(){
        return $this->belongsTo('App\Models\Atleta');
    }

    public function obtenerTerapiaById($id){
        return Terapia::find($id);
    }
}