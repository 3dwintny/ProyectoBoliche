<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel_cdag extends Model
{
    use HasFactory;
    protected $table = "nivel_cdag";
    protected $fillable = ['id','nombre','created_at','updated_at'];
    
    public function obtenerNivelCDAGById($id){
        return Nivel_cdag::find($id);
    }
}