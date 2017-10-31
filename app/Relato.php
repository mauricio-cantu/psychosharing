<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relato extends Model
{

    protected $fillable = ['post_id', 'conteudo'];
    
    protected $touches = ['post'];

	public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
