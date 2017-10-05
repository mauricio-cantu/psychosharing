<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PalavraChave extends Model
{
    public $table = 'palavras_chave';

    public $fillable = ['palavra_chave'];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
