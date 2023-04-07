<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = "categoria";
    protected $fillable = ['id','tipo','rango_edades','created_at','updated_at','estado'];
    
    public function atletas(){
    return $this->hasMany('App\Models\Atleta');
    }

    public function obtenerCategoriaById($id){
        return Categoria::find($id);
    }
}
