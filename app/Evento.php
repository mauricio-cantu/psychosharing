<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['post_id', 'descricao', 'local', 'data', 'link'];
    
    protected $touches = ['post'];

	public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
