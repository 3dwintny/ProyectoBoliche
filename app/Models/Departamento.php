<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = "departamento";
    protected $fillable = ['id','nombre','created_at','updated_at'];
    public function municipios(){
            return $this->hasMany('App\Models\Municipio');
    }
    
}
