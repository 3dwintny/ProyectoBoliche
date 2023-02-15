<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea_Desarrollo extends Model
{
    use HasFactory;
    protected $table = "linea_desarrollo";
    protected $fillable=['id','tipo','created_at','updated_at','estado'];

    public function  obtenerLineaDesarrolloById($id){
        return Linea_Desarrollo::find($id);
    }
}
