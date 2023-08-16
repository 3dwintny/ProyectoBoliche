<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro_Horario extends Model
{
    use HasFactory;
    protected $table = "centro_horario";
    protected $fillable = [
    'id',
    'centro_id',
    'horario_id',
    ];

    public function obtener_alumnos_encargados($id)
    {
        return Centro_Horario::find($id);
    }

    public function centro(){
        return $this->hasMany('App\Models\Centro');
    }
    public function horario(){
        return $this->hasMany('App\Models\Horario');
    }
}
