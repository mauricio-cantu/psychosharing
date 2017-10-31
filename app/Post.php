<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['titulo', 'tipo', 'user_id', 'linha_terapeutica'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function exercicio()
    {
        return $this->hasOne(Exercicio::class);
    }

    public function relato()
    {
    	return $this->hasOne(Relato::class);
    }

    public function evento()
    {
    	return $this->hasOne(Evento::class);
    }

    public function material()
    {
    	return $this->hasOne(Material::class);
    }

    public function chaves()
    {
        return $this->belongsToMany(PalavraChave::class, 'chave_post');
    }

}
