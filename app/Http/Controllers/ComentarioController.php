<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function comentar(Request $request, $idPost){
        $post = Post::find($idPost);
        
        $comentario = $post->comentarios()->create([
            'conteudo' => $request->input('comentario'),
            'user_id' => Auth::user()->id
        ]);
        
        return redirect()->back();

    }
}
