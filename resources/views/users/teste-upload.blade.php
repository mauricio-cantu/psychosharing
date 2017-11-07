@extends('principal.principal')

@section('conteudo')

<form  enctype="multipart/form-data" action="update-picture" method="POST">
        <div class="file-field input-field col s6">
            <div class="btn indigo">
                <span>Escolher foto</span>
                <input type="file" name="profile">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
            <button class="btn waves-effect waves-light col s12 red" type="submit" name="action">Confirmar</button>
        </div>
    </form>

<img class="circle responsive-img" style="height: 300px; width: 300px;" src="{{ asset('/profile-pics/' . Auth::user()->foto_perfil) }}">

@stop