<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte_Adoptado extends Model
{
    use HasFactory;
    protected $table = "deporte_adaptado";
    protected $fillable = ['id','nombre','created_at','updated_at'];

    public function atletas(){
        return $this->hasMany('App\Models\Atleta');
    }
}
