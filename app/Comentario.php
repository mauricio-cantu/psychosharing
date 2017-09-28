<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function post()
    {
    	$this->belongsTo(Post::class);
    }

    public function user()
    {
    	$this->belongsTo(User::class);
    }
}
