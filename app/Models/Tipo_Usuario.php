<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Usuario extends Model
{
    use HasFactory;
    protected $table = 'tipo_usuario';
    protected $fillable = ['id','tipo','created_at','updated_at'];

    protected $hidden = [
        'id',
    ];
}
