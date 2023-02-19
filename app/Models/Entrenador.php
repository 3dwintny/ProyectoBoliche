<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;
    protected $table = "entrenador";
    protected $fillable= ['id','nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada','celular','telefono_casa','cui','pasaporte','genero','fecha_nacimiento','edad','años_experiencia','correo',
    'direccion','foto','estado_civil','nit','fecha_registro','escolaridad','nivel_cdag_id','nivel_fadn_id',
    'departamento_id','nacionalidad_id','deporte_id','tipo_contrato_id','created_at','updated_at','estado'];

    public function nivel_cdag(){
        return $this->belongsTo('App\Models\Nivel_cdag');
    }

    public function nivel_fadn(){
        return $this->belongsTo('App\Models\Nivel_fadn');
    }

    public function departamento(){
        return $this->belongsTo('App\Models\Departamento');
    }

    public function nacionalidad(){
        return $this->belongsTo('App\Models\Nacionalidad');
    }

    public function deporte(){
        return $this->belongsTo('App\Models\Deporte');
    }

    public function tipo_contrato(){
        return $this->belongsTo('App\Models\Tipo_Contrato');
    }
}
