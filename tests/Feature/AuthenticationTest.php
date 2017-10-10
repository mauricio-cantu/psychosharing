<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AuthenticationTest extends TestCase
{
    public function testRedirect()
    {   
        // Testa o redirecionamento de um usuário não autenticado (um guest)
       
        // 1. Requisição GET para o root do projeto
        $responseGuest = $this->get('/');
       
        // 2. Espera a view 'welcome' como resposta
        $responseGuest->assertViewIs('principal.welcome');

        // Cria um usuário
        $user = $this->makeUser();

        // Testa o redirecionamento de um usuário autenticado
        
        // 1. Requisição GET para o root do projeto, agora com um usuário autenticado 
        $responseUser = $this->actingAs($user)->get('/');
        
        // 2. Espera a view 'home' como resposta
        $responseUser->assertViewIs('principal.home');
    }

    public function makeUser()
    {

        $opts = array('masculino','feminino');

        $data = [
            'password'=>bcrypt(str_random(20)),
            'remember_token'=>str_random(10),
            'crp'=>str_random(7),
            'sexo'=>$opts[rand(1,2)],
            'cidade'=>'Sapucaia do Sul',
            'linha_teorica'=>'Biologia Bioligitivo Biolimental'
        ];

        return factory(User::class)->create($data);

    }
}
