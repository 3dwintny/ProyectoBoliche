<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PRT extends Model
{
    use HasFactory;
    protected $table = "prt";
    protected $fillable = ['id','nombre','created_at','updated_at'];
}
