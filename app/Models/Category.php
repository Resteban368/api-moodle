<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'mdl_course_categories';
    public $timestamps = false;
    //relacion de uno a muchos
    public function cursos(){
        return $this->hasMany('App\Models\Cursos');
    }

    // use HasFactory;
}
