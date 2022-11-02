<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = "municipio";
    protected $fillable = ['id','nombre','created_at','updated_at','id_departamento'];
}
