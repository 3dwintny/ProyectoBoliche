<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Contrato extends Model
{
    use HasFactory;
    protected $table = "tipo_contrato";
    protected $fillable =['id','descripcion','created_at','updated_at'];

    public function obtenerTipoContratoById($id){
        return Tipo_Contrato::find($id);
    }
}