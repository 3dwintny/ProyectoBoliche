<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    protected $table ="login";
    protected $fillable = ['id','usuario_id','fecha_hora','tipo_accion','created_at','updated_at'];
    

}
