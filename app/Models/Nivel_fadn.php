<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel_fadn extends Model
{
    use HasFactory;
    protected $table="nivel_fadn";
    protected $fillable = ['id','tipo','created_at','updated_at'];
}
