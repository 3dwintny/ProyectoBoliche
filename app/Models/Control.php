<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;
    protected $table = 'control';
    protected $fillable = ['id','usario_id','Descripcion','Fecha','created_at','updated_at','tabla_accion_id'];
}
