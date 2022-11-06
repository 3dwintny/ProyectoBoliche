<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;
    protected $table = "entrenador";
    protected $fillable= ['id','nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada',
 'celular','telefono_casa','cui','pasaporte','genero','fecha_nacimiento','edad','años_experiencia','correo',
'direccion','foto','estado_civil','nit','fecha_registro','escolaridad','nivel_cdag_id','nivel_fadn_id',
'departamento_id','nacionalidad_id','deporte_id','tipo_contrato_id','created_at','updated_at'];
}
