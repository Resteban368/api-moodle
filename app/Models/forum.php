<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
    protected $table = 'mdl_forum';
    use HasFactory;

    public $timestamps = false;
    //relacion de uno a muchos
    public function forosDiscusiones(){
        return $this->hasMany('App\Models\forumDiscussion');
    }
}
