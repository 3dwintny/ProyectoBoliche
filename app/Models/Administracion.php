<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administracion extends Model
{
    use HasFactory;
    protected $table = 'administracion';
    protected $fillable = ['id', 'estado', 'created_at', 'updated_at','user_id'];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
