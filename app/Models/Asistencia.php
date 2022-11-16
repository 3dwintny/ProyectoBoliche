<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table = "asistencia";
    protected $fillable = ['id', 'fecha','created_at','updated_at'];
    public function atleta(){
        return $this->belongsTo('App\Models\Atleta');
    }
}
