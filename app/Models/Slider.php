<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = [
        'id',
        'heding',
        'description',
        'link',
        'link_name',
        'image',
        'status',
    ];
    public function obterenrSliders()
    {
        return Slider::all();
    }
    public function obtenerSliderporId($id)
    {
        return Slider::find($id);
    }

}
