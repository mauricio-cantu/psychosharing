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
        // apenas cria um novo exercicio, sem persistir no banco
        // caso a validação não passe, um JSON é retornado com os erros
        $exercicio = new Exercicio($request->except('titulo', 'linha_terapeutica'));
        
        // caso a validação passe, o post é criado
        $post = Post::create([
                   'tipo'=>'exercicio',
                   'user_id'=>Auth::user()->id,
                   'titulo'=>$request->input('titulo'),
                   'linha_terapeutica'=>$request->input('linha_terapeutica')
                ]);
        
        // as chaves são associadas a este post
        $this->attachKeys($request, $post);
        
        // aqui sim é persistido o exercicio no banco
        // o 'exercicio()->save()' persiste o exercicio no banco já o relacionando com o novo post
        $post->exercicio()->save($exercicio);
            
        // JSON indicando sucesso é retornado
        return response()->json(['status'=>'created'], 200); 
    }

    public function editarExercicio(ExercicioRequest $request, $id)
    {  
        $post = Post::find($id);

        $post->update($request->only('titulo', 'linha_terapeutica'));

        $this->attachKeys($request, $post);

        $exercicio = $post->exercicio;
        
        $exercicio->update($request->except('titulo', 'linha_terapeutica'));
        
        return response()->json($exercicio);
    }

    public function cadastrarMaterial(MaterialRequest $request)
    {
        $material = new Material($request->except('titulo', 'linha_terapeutica'));
        
        $post = Post::create([
                    'tipo'=>'material',
                    'user_id'=>Auth::user()->id,
                    'titulo'=>$request->input('titulo'),
                    'linha_terapeutica'=>$request->input('linha_terapeutica')
                ]);

        $this->attachKeys($request, $post);

        $post->material()->save($material);

        return response()->json(['status'=>'created'], 200);
    }

    public function cadastrarRelato(RelatoRequest $request)
    {
        $relato = new Relato($request->except('titulo', 'linha_terapeutica'));

        $post = Post::create([
                        'tipo'=>'relato',
                        'user_id'=>Auth::user()->id,
                        'titulo'=>$request->input('titulo'),
                        'linha_terapeutica'=>$request->input('linha_terapeutica')
                    ]);

        $this->attachKeys($request, $post);

        $post->relato()->save($relato);

        return response()->json(['status'=>'created'], 200); 
    }

    public function editarRelato(RelatoRequest $request, $id)
    {  
        $post = Post::find($id);

        $post->update($request->only('titulo', 'linha_terapeutica'));

        $this->attachKeys($request, $post);

        $relato = $post->relato;
        
        $relato->update($request->except('titulo', 'linha_terapeutica'));
        
        return response()->json($relato);
    }

    public function cadastrarEvento(EventoRequest $request)
    {

        $dados1 = $request->except('data', 'titulo', 'linha_terapeutica');
        
        // formatar data para o padrão do mysql
        $dataFormatada = ['data'=>implode("-",array_reverse(explode("/",$request->input('data'))))];

        $dados = array_merge($dados1, $dataFormatada);

        $evento = new Evento($dados);
        
        $post = Post::create([
                    'tipo'=>'evento',
                    'user_id'=>Auth::user()->id,
                    'titulo'=>$request->input('titulo'),
                    'linha_terapeutica'=>$request->input('linha_terapeutica')
                ]);

        $this->attachKeys($request, $post);

        $post->evento()->save($evento);

        return response()->json(['status'=>'created'], 200);
    }

    public function editarEvento(EventoRequest $request, $id)
    {  
        $post = Post::find($id);

        $post->update($request->only('titulo', 'linha_terapeutica'));

        $this->attachKeys($request, $post);

        $evento = $post->evento;

        $dados1 = $request->except('data', 'titulo', 'linha_terapeutica');
        
        // formatar data para o padrão do mysql
        $dataFormatada = ['data'=>implode("-",array_reverse(explode("/",$request->input('data'))))];

        $dados = array_merge($dados1, $dataFormatada);
        
        $evento->update($dados);
        
        return response()->json($evento);
    }

    public function getResults(Request $request){
        $key = $request->get('key');
        $dbKey = PalavraChave::wherePalavraChave($key)->first();
        // caso a chave não seja encontrada, o usuaro é redirecionado pra paagina de erro 404 
        if(is_null($dbKey)){
            return view('errors.404');
        }
        
        // caso seja encontrada, é retornado todos os posts com essa palavra chave
        $posts = $dbKey->post()->get();

        // aqui é armazenado em variaveis o numero de cada tipo de post com essa palavra chave
        $numExercicios = $posts->where('tipo','exercicio')->count();
        $numEventos = $posts->where('tipo','evento')->count();
        $numRelatos = $posts->where('tipo','relato')->count();
        $numMateriais = $posts->where('tipo','material')->count();

        // essas variaveis são passadas a um array
        $counts = array(
            'exercicios'=>$numExercicios,
            'relatos'=>$numRelatos,
            'eventos'=>$numEventos,
            'materiais'=>$numMateriais
        );

        // view de resultado é retornada contendo os posts relacionados e a quantidade de cada tipo
        return view('posts.results')->withPosts($posts)->withCounts($counts);
    }

    public function cadastrarFormExercicio()
    {
        return view('posts.exercicios.formExercicio')->with('editar',false);
    }

    public function editarFormExercicio($id)
    {
        $post = Post::find($id);
        return view('posts.exercicios.formExercicio')->with('editar',true)->withPost($post);
    }

    public function cadastrarFormMaterial()
    {
        return view('posts.materiais.formMaterial')->withAcao('cadastrar')->with('editar',false);;
    }

    public function editarFormMaterial($id)
    {
        $post = Post::find($id);
        return view('posts.materiais.formMaterial')->with('editar',true)->withPost($post);
    }

    public function cadastrarFormRelato()
    {
        return view('posts.relatos.formRelato')->withAcao('cadastrar')->with('editar',false);;
    }

    public function editarFormRelato($id)
    {
        $post = Post::find($id);
        return view('posts.relatos.formRelato')->with('editar',true)->withPost($post);
    }

    public function cadastrarFormEvento()
    {
        return view('posts.eventos.formEvento')->withAcao('cadastrar')->with('editar',false);;
    }

    public function editarFormEvento($id)
    {
        $post = Post::find($id);
        return view('posts.eventos.formEvento')->with('editar',true)->withPost($post);
    }

    // post para atribuir palavras chaves ao post
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
            // então crio uma nova palavra chave com essa tag e adiciono seu id ao array $novas
            ($p = PalavraChave::create(['palavra_chave'=>$index['tag']]) AND $novas[] = $p['id'])
            // caso não for nulo é porque a tag já existe, então apenas adiciona o id da mesma no array $existentes
            : 
            $existentes[] = $key['id'];
        }

        // junto os dois arrays de IDs de palavras chaves
        $allKeys = array_merge($existentes, $novas);

        // associo as tags aos posts passando o array de IDs (novas + existentes)
        $post->chaves()->sync($allKeys);

    }

    // Posts associados à uma tag: App\PalavraChave::find(1)->post()->get()

}