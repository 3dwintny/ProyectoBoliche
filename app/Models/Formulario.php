<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;
    protected $table = "formulario";
    protected $fillable = ['id','titulo_principal','subtitulo','año_logo','titulo_ficha','declaracion','created_at','updated_at'];
}
