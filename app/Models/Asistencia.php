<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table = "asistencia";
<<<<<<< HEAD
    protected $fillable = ['id', 'fecha','created_at','updated_at'];
    public function atleta(){
        return $this->belongsTo('App\Models\Atleta');
    }
=======
    protected $fillable = ['id', 'fecha','atleta_id','estado','created_at','updated_at'];

    public function atleta(){
        return $this->belongsTo('App\Models\Atleta');
    }


>>>>>>> f8f2de15642dbf5c86f8dec9c68b3c12f5a4cf6c
}
