<?php

// Redireciona o usuário convidado para a página de apresentação e o usuário autenticado para a página home   
Route::get('/', function () {
	return Auth::guest() ? view('principal.welcome') : view('principal.home');
});

// Rotas de autenticação (login, registro, ...)
Auth::routes();

// Rotas acessiveis apenas com autenticação através do middleware 'auth'
Route::middleware('auth')->group(function(){

	Route::get('home', function(){
		return view('principal.home');
	});

	// Rotas com o prefixo 'exercicios/'
	Route::prefix('exercicios')->group(function(){

		// (get) /exercicios/cadastrar : retorna o formulario de cadastro
		Route::get('cadastrar', 'PostController@cadastrarFormExercicio');

		// (post) /exercicios/cadastrar : cadastra a publicação no banco
		Route::post('cadastrar', 'PostController@cadastrarExercicio');

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

});

// Rotas de teste
Route::get('testePosts', 'PostController@teste');

Route::delete('users/{id}', function ($id) {
		
});


