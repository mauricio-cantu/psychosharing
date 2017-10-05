<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercicio;
use App\Material;
use App\Evento;
use App\Relato;
use App\Post;
use App\PalavraChave;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExercicioRequest;
use App\Http\Requests\MaterialRequest;
use App\Http\Requests\RelatoRequest;
use App\Http\Requests\EventoRequest;

class PostController extends Controller
{
   	public function cadastrarExercicio(ExercicioRequest $request)
      {
        $post = Post::create([
                     'tipo'=>'exercicio',
                     'user_id'=>Auth::user()->id
                 ]);

        $exercicio = new Exercicio($request->all());
         
        if($exercicio){
            $post->exercicio()->save($exercicio);
            return response()->json(['status'=>'created'], 200);
        }else{
            return response()->json(['status'=>'failed']);
        }

         

         // return response()->json($request->input('palavras_chave'));
        //  return view('principal.home');

      }

      public function cadastrarMaterial(MaterialRequest $request)
      {
         
         $post = Post::create([
                     'tipo'=>'material',
                     'user_id'=>Auth::user()->id,
                     'palavras_chave'=>$request->input('palavras_chave')
                 ]);

         $material = new Material($request->except('palavras_chave'));

         $post->material()->save($material);

         return view('principal.home');

      }

      public function cadastrarRelato(RelatoRequest $request)
      {
         $post = Post::create([
                     'tipo'=>'relato',
                     'user_id'=>Auth::user()->id,
                     'palavras_chave'=>$request->input('palavras_chave')
                 ]);

         $relato = new Relato($request->except('palavras_chave'));

         $post->relato()->save($relato);

         return view('principal.home');  
      }

      public function cadastrarEvento(EventoRequest $request)
      {
         $post = Post::create([
                     'tipo'=>'evento',
                     'user_id'=>Auth::user()->id,
                     'palavras_chave'=>$request->input('palavras_chave')
                 ]);

         $dados1 = $request->except('data');

         $dataFormatada = ['data'=>implode("-",array_reverse(explode("/",$request->input('data'))))];

         $dados = array_merge($dados1, $dataFormatada);

         $evento = new Evento($dados);

         $post->evento()->save($evento);

         return view('principal.home');  
      }

      public function cadastrarFormExercicio()
      {
         return view('posts.exercicios.formExercicio')->withAcao('cadastrar');
      }

      public function cadastrarFormMaterial()
      {
         return view('posts.materiais.formMaterial')->withAcao('cadastrar');
      }

      public function cadastrarFormRelato()
      {
         return view('posts.relatos.formRelato')->withAcao('cadastrar');
      }

      public function cadastrarFormEvento()
      {
         return view('posts.eventos.formEvento')->withAcao('cadastrar');
      }

      public function teste()
      {
         $posts = Post::all();
         // // $m = $p->material->titulo;
         // // $ex = $p->exercicio->titulo;
         return response()->json($posts);
         //return view('testePosts')->withPosts($posts);

      }

      public function testeChaves()
      {

      }

}