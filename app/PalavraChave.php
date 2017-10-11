<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PalavraChave extends Model
{
    protected $table = 'palavras_chave';
    
    public $timestamps = false;

    public $fillable = ['palavra_chave'];

    public $hidden = ['pivot'];

    public function post()
    {
        return $this->belongsToMany(Post::class, 'chave_post');
    }
}
