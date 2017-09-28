<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relato extends Model
{

	protected $fillable = ['post_id', 'titulo', 'conteudo', 'linha_terapeutica'];

	public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
