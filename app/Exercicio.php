<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{

    protected $fillable = ['post_id','descricao'];
    
    // isso garante que quando um exercicio for editado, o updated_at do Post "pai" seja atualizado
    protected $touches = ['post'];

	public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
