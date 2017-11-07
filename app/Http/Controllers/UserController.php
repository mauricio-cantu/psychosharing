<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exercicio;
use App\Post;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function index(){
        $linha = Auth::user()->linha_teorica;
        $postsRelacionados = Post::whereLinhaTerapeutica($linha)->whereUserId('!=',Auth::user()->id)->take(6)->get();
        $ulimosPosts = Post::latest()->take(3)->get();
        return view('principal.home')->withPosts($postsRelacionados)
                                     ->withUltimos($ulimosPosts);
    }

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
            return redirect('home')->with('status', 'Perfil editado com sucesso!');
        }

    }

    public function updateProfilePicture(Request $request){

        if($request->hasFile('profile')){

            $user = Auth::user();

    		$profile = $request->file('profile');
    		$filename = str_random(6) . '-' . $user->id . '.' . $profile->getClientOriginalExtension();
            
            $img = Image::make($profile);
            $caminho = public_path('profile-pics').'/'.$filename;
            $img->save($caminho);

            $user->foto_perfil = $filename;
            $user->update();             

    		return redirect()->back()->with('status', 'Foto de perfil atualizada!');
        }
        
    }


}
