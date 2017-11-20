<?php

use App\Post;
use App\PalavraChave;

// Redireciona o usuário convidado para a página de apresentação e o usuário autenticado para a página home   
Route::get('/', function () {
	return Auth::guest() ? view('principal.welcome') : redirect()->action('UserController@index');
});

// Rotas de autenticação (login, registro, ...)
Auth::routes();

// Rotas acessiveis apenas com autenticação através do middleware 'auth'
Route::middleware('auth')->group(function(){

	Route::get('home', 'UserController@index');

	// Rotas com o prefixo 'exercicios/'
	Route::prefix('exercicios')->group(function(){

		// (get) /exercicios/cadastrar : retorna o formulario de cadastro
		Route::get('cadastrar', 'PostController@cadastrarFormExercicio');

		// (post) /exercicios/cadastrar : cadastra a publicação no banco
		Route::post('cadastrar', 'PostController@cadastrarExercicio');

		Route::get('editar/{id}', 'PostController@editarFormExercicio');

		Route::post('editar/{id}', 'PostController@editarExercicio');	

		Route::get('{id}', 'PostController@detalhesExercicio');
		
		// método que é acessado via AJAX para exibir as informações de um post que está sendo editado
		Route::get('ajax/{id}', function($id){
			$post = Post::find($id);
			$exercicio = $post->exercicio()->first();
			$keys = $post->chaves()->select('palavra_chave as tag')->get();
			return response()->json(array(
				'post'=>$post,
				'exercicio'=>$exercicio,
				'keys'=>$keys
			));	
		});

	});

	Route::prefix('materials')->group(function(){

		Route::get('cadastrar','PostController@cadastrarFormMaterial');

		Route::post('cadastrar','PostController@cadastrarMaterial');

		Route::get('editar/{id}', 'PostController@editarFormMaterial');
		
		Route::post('editar/{id}', 'PostController@editarMaterial');
		
		Route::get('{id}', 'PostController@detalhesMaterial');

		Route::get('{id}/download', function($id){
			$material = Post::find($id)->material;
			return response()->download(public_path('/storage/downloads/'.$material->anexo));	
		});
	
		Route::get('ajax/{id}', function($id){
			$post = Post::find($id);
			$material = $post->material;
			$keys = $post->chaves()->select('palavra_chave as tag')->get();
			return response()->json(array(
				'post'=>$post,
				'material'=>$material,
				'keys'=>$keys
			));	
		});
	});
	
	Route::prefix('relatos')->group(function(){

		Route::get('cadastrar','PostController@cadastrarFormRelato');

		Route::post('cadastrar','PostController@cadastrarRelato');

		Route::get('editar/{id}', 'PostController@editarFormRelato');
		
		Route::post('editar/{id}', 'PostController@editarRelato');	

		Route::get('{id}', 'PostController@detalhesRelato');
	
		Route::get('ajax/{id}', function($id){
			$post = Post::find($id);
			$relato = $post->relato()->first();
			$keys = $post->chaves()->select('palavra_chave as tag')->get();
			return response()->json(array(
				'post'=>$post,
				'relato'=>$relato,
				'keys'=>$keys
			));	
		});

	});

	Route::prefix('eventos')->group(function(){

		Route::get('cadastrar','PostController@cadastrarFormEvento');

		Route::post('cadastrar','PostController@cadastrarEvento');

		Route::get('editar/{id}', 'PostController@editarFormEvento');
		
		Route::post('editar/{id}', 'PostController@editarEvento');	

		Route::get('{id}', 'PostController@detalhesEvento');
	
		Route::get('ajax/{id}', function($id){
			$post = Post::find($id);
			$evento = $post->evento()->first();
			$keys = $post->chaves()->select('palavra_chave as tag')->get();
			return response()->json(array(
				'post'=>$post,
				'evento'=>$evento,
				'keys'=>$keys
			));	
		});

	});

	Route::prefix('users')->group(function(){
		// retorna form para edição
		Route::get('edit-profile', 'UserController@editProfileForm');

		// envia dados para editar o usuario
		Route::post('edit-profile', 'UserController@editProfile');

		// editar foto de perfil
		Route::post('update-picture', 'UserController@updateProfilePicture');
		
		Route::get('{id}', 'UserController@showProfile');

	});

	Route::prefix('posts')->group(function(){

		Route::get('results','PostController@getResults');

	});

	Route::prefix('comentarios')->group(function(){

		Route::post('cadastrar/{idPost}', 'ComentarioController@comentar');

	});

});