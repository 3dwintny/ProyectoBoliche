<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;
    protected $table = 'control';
    protected $fillable = ['id','Usuario','Descripcion','Fecha','created_at','updated_at'];
}
