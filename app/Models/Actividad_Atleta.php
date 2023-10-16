<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad_Atleta extends Model
{
    use HasFactory;
    protected $table = 'actividad_atleta';
    protected $fillable =['id','estado','actividad_id','atleta_id','created_at','updated_at','evidencia'];

    public function atleta(){
        return $this->belongsTo('App\Models\Atleta');
    }

    public function actividad_entreno(){
        return $this->belongsTo('App\Models\Actividad_Entreno','actividad_id','id');
    }
}
