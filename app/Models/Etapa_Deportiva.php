<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa_Deportiva extends Model
{
    use HasFactory;
    protected $table="etapa_deportiva";
protected $fillable = ['id','nombre','created_at','updated_at'];

}
