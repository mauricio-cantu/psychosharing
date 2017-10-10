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
        
      $this->attachKeys($request, $post);

      $exercicio = new Exercicio($request->all());
         
      $post->exercicio()->save($exercicio);
        
      return response()->json(['status'=>'created'], 200); 
    }

    public function cadastrarMaterial(MaterialRequest $request)
    {
        
      $post = Post::create([
                    'tipo'=>'material',
                    'user_id'=>Auth::user()->id
                ]);

      $this->attachKeys($request, $post);

      $material = new Material($request->all());

      $post->material()->save($material);

      return response()->json(['status'=>'created'], 200);
    }

    public function cadastrarRelato(RelatoRequest $request)
    {

      $post = Post::create([
                    'tipo'=>'relato',
                    'user_id'=>Auth::user()->id
                ]);

      $this->attachKeys($request, $post);

      $relato = new Relato($request->all());

      $post->relato()->save($relato);

      return response()->json(['status'=>'created'], 200); 
    }

    public function cadastrarEvento(EventoRequest $request)
    {
      $post = Post::create([
                  'tipo'=>'evento',
                  'user_id'=>Auth::user()->id
              ]);

      $dados1 = $request->except('data');

      $dataFormatada = ['data'=>implode("-",array_reverse(explode("/",$request->input('data'))))];

      $dados = array_merge($dados1, $dataFormatada);

      $this->attachKeys($request, $post);

      $evento = new Evento($dados);

      $post->evento()->save($evento);

      return response()->json(['status'=>'created'], 200);
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

    /* função antiga
    public function attachKeys($request, $post)
    {
      // pega apenas o array de palavras chaves (isso retorna um array de arrays) 
      $arrayTags = $request->only('palavras_chave');
      // armazena na $tags o primeiro array (index 0)
      // a função array_values permite acessar os valores do array através da posição
      $tags = array_values($arrayTags)[0];

      
      // para cada valor do array de tags, pegamos o elemento 'tag',
      // que contem de fato a palavra chave
      foreach ($tags as $index) {
          $p = PalavraChave::create(['palavra_chave'=>$index['tag']]);
          // cada chave criada já é associada ao post
          $post->chaves()->attach($p['id']);
      }
    } */

    public function attachKeys($request, $post)
    {
        // pega apenas o array de palavras chaves (isso retorna um array de arrays) 
        $arrayTags = $request->only('palavras_chave');
        
        // armazena na $tags o primeiro array (index 0), que é o array de palavras chaves
        // a função array_values permite acessar os valores do array através da posição
        $tags = array_values($arrayTags)[0];

        // dois arrays para controlar quais tags ja existem e quais são novas
        $existentes = array();
        $novas = array();

        foreach ($tags as $index) {
            // busco por uma palavra chave que seja igual a tag do loop atual
            $key = PalavraChave::wherePalavraChave($index['tag'])->first();
            
            // se $key for nulo é porque a tag ainda não existe, 
            is_null($key) ? 
            // então crio uma nova palavra chave com essa tag e adiciono ao array $novas
            ($p = PalavraChave::create(['palavra_chave'=>$index['tag']]) AND $novas[] = $p['id']) : 
            // caso não for nulo é porque a tag já existe, então apenas adiciona o id da mesma no array $existentes
            $existentes[] = $key['id'];

            //   if (is_null($key)) {
            //       $p = PalavraChave::create(['palavra_chave'=>$index['tag']]);
            //       $novas[] = $p['id'];
            //   }else{
            //       $existentes[] = $key['id'];
            //   }
        }

        // junto os dois arrays de IDs de palavras chaves
        $allKeys = array_merge($existentes, $novas);

        // associo as tags aos posts passando o array de IDs (novas + existentes)
        $post->chaves()->attach($allKeys);

    }

    // Posts associados à uma tag: App\PalavraChave::find(1)->post()->get()

}