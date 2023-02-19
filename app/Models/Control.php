<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;
    protected $table = 'control';
    protected $fillable = ['id','usuario_id','Descripcion','created_at','updated_at','tabla_accion_id'];

    public function usuario(){
        return $this->belongsTo('App\Models\User');
    }
}
