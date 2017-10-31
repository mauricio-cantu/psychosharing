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

		Route::put('editar/{id}', 'PostController@editarExercicio');	
		
		// método que é acessado via AJAX para recuperar as informações de um exericio
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

	Route::prefix('materiais')->group(function(){

		Route::get('cadastrar','PostController@cadastrarFormMaterial');

		Route::post('cadastrar','PostController@cadastrarMaterial');

	});
	
	Route::prefix('relatos')->group(function(){

		Route::get('cadastrar','PostController@cadastrarFormRelato');

		Route::post('cadastrar','PostController@cadastrarRelato');

	});

	Route::prefix('eventos')->group(function(){

		Route::get('cadastrar','PostController@cadastrarFormEvento');

		Route::post('cadastrar','PostController@cadastrarEvento');

	});

	Route::prefix('users')->group(function(){

		Route::get('edit-profile', 'UserController@editProfileForm');

		Route::post('edit-profile', 'UserController@editProfile');

	});

	Route::prefix('posts')->group(function(){

		Route::get('results','PostController@getResults');

	});

});



Route::get('jsonView', function(){
	return view('posts.exercicios.testeJson');
});