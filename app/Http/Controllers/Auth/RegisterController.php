<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'crp'=>'required|string|unique:users',
            'linha_teorica'=>'required|string',
            'cidade'=>'required|string',
            'sexo'=>'required'
        ], [
            'required' => 'O campo :attribute deve ser preenchido!',
            'password.confirmed' => 'As senhas não são iguais!',
            'password.min' => 'A senha deve possuir no mínimo 6 caracteres!',
            'email.unique'=>'E-mail já vinculado à outra conta!'
        ], [
            'name' => 'nome',
            'password' => 'senha',
            'linha_teorica'=>'linha terapêutica',
            'crp'=>'CRP'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cidade' => $data['cidade'],
            'linha_teorica' => $data['linha_teorica'],
            'crp' => $data['crp'],
            'sexo'=>$data['sexo']
        ]);
    }

}
