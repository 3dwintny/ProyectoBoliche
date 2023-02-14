<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otro_Programa extends Model
{
    use HasFactory;
    protected $table = "otro_programa";
    protected $fillable =['id','nombre','created_at','updated_at'];

    public function obtenerOtroProgramaById($id){
        return Otro_Programa::find($id);
    }

    public function atletas(){
        return $this->hasMany('App\Models\Atleta');
    }
}