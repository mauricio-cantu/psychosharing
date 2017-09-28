<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{

	protected $fillable = ['post_id', 'titulo', 'descricao', 'linha_terapeutica'];

	public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
