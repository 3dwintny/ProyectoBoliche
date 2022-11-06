<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;
    protected $table = "centro";
protected $fillable =['id','nombre','direccion','fecha_registro','institucion','accesibilidad',
'implementacion','espacio_fisico','id_horario','id_departamento','created_at','updated_at'];

}
