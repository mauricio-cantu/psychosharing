<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'crp', 'cidade', 'linha_teorica', 'sexo'
    ];

    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
