<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    protected $table ="login";
    protected $fillable = ['id','id_usuario','fecha_hora','tipo_accion','created_at','updated_at'];
}
