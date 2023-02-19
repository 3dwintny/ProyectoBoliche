<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;
    protected $table = "formulario";
    protected $fillable = ['id','titulo_principal','subtitulo','titulo_ficha','declaracion','created_at','updated_at'];

    public function obtenerFormularioById($id){
        return Formulario::find($id);
    }
}
