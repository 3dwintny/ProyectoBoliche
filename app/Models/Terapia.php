<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terapia extends Model
{
    use HasFactory;
    protected $table = "terapia";
    protected $fillable =['id','numero_terapia','fecha','hora_inicio','impresion_clinica',
    'analisis_semiologico','desarrollo','observaciones','tarea','conciencia_corporal','dominio_corporal',
    'dominio_respiracion','dialogo_interno','atencion','concentracion','motivacion','confianza',
    'activacion','relajacion','estres','ansiedad_cognitiva','ansiedad_fisica','miedo','frustracion',
    'psicologia_id','created_at','updated_at'];
}
