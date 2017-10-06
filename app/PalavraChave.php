<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PalavraChave extends Model
{
    protected $table = 'palavras_chave';
    
    public $timestamps = false;

    public $fillable = ['palavra_chave'];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
