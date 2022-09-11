<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'mdl_course';

    //relacion de uno a muchos inversa(muchos a uno)
    public function category(){
        return $this->belongsTo('App\Models\Category', 'category');
    }
    // use HasFactory;
}
