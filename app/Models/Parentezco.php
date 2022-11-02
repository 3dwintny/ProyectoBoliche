<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentezco extends Model
{
    use HasFactory;
    protected $table = "parentezco";
    protected $fillable = ['id','tipo','created_at','updated_at'];
}
