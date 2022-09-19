<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forumDiscussion extends Model
{
    protected $table = 'mdl_forum_discussions';
    use HasFactory;

    public function category(){
        return $this->belongsTo('App\Models\forum', 'forum');
    }
}
