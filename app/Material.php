<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

	protected $table = "materiais";

    protected $fillable = ['post_id', 'descricao', 'link', 'anexo'];

    public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
