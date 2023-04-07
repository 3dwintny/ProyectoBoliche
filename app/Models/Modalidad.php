<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;
    protected $table = "modalidad";
    protected $fillable = ['id','nombre','medio_comunicacion','created_at','updated_at','estado'];

    public function obtenerModalidadById($id) { 
        return Modalidad::find($id);
    }

}
