<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    use HasFactory;
    protected $table = "deporte";
    protected $fillable = ['id','nombre','created_at','updated_at'];
}
