<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function editProfileForm(){
        $user = Auth::user();
        return view('users.editProfile')->withUser($user);
    }

    public function editProfile(Request $request){
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',            
            'crp'=>'required|string',  
            'linha_terapeutica'=>'required|string',
            'cidade'=>'required|string',
            'sexo'=>'required'
        ], [
            'required' => 'O campo :attribute deve ser preenchido!'
        ], [
            'name' => 'nome',
            'linha_terapeutica'=>'linha terapêutica',
            'crp'=>'CRP'
        ]);

        if($validator->fails()){
            return redirect('users/edit-profile')->withErrors($validator)->withInput();
        }else{
            $user->update($request->all());
            return redirect('home');
        }

    }


}