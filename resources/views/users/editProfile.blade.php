@extends('principal.principal')

@section('conteudo')

@if(session('status'))
    <br>
    <div class="success z-depth-4">
        <i class="fa fa-check"></i> {{ session('status') }}
    </div>
    <br>
    <br>
@endif

<div class="hoverable card">
    <div>
        <h3 class="center" style="display: inline;">Edite suas informações</h3>
        <a href="#modal" title="Alterar foto de perfil" class="right modal-trigger">
            @if(Auth::user()->foto_perfil)
                <img class="circle responsive-img" style="height: 100px; width: 100px;" src="{{ asset('/profile-pics/' . Auth::user()->foto_perfil) }}">
            @else
                <i class="medium material-icons">account_circle</i>
            @endif
        </a>
        
    </div>
    <br>
    <br>
    <br>
    <form action="/users/edit-profile" method="POST">

        {{ csrf_field() }}

        <div class="row">
            <div class="input-field col s12 l4">

                <input id="nome" type="text" name="name" class="validate {{ $errors->has('name') ? 'invalid':'' }}" value="{{ old('name') ? old('name') : $user->name }}" autofocus="">

                @if ($errors->has('name'))
                <span class="red-text">
                    {{ $errors->first('name') }}
                </span>
                @endif

                <label for="nome">Nome completo</label>

            </div>

            <div class="input-field col s6 l4">

                <input id="crp" type="text" name="crp" class="validate {{ $errors->has('crp') ? 'invalid':'' }}" value="{{ old('crp') ? old('crp') : $user->crp }}">

                @if ($errors->has('crp'))
                <span class="red-text">
                    {{ $errors->first('crp') }}
                </span>
                @endif

                <label for="crp">CRP</label>
            
            </div>

            <div class="input-field col s6 l4">
                <select id="sexo" name="sexo" required="">
                    <option value="" disabled selected>Escolha</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Outros">Outros</option>
                </select>
                <label>Sexo</label>
            </div>

        </div>

        <div class="row">
            <div class="input-field col s6">
                <input id="cidade" type="text" name="cidade" class="validate {{ $errors->has('cidade') ? 'invalid':'' }}" value="{{ old('cidade') ? old('cidade') : $user->cidade }}">
                @if ($errors->has('cidade'))
                <span class="red-text">
                    {{ $errors->first('cidade') }}
                </span>
                @endif
                <label for="cidade">Cidade</label>
            </div>

            <div class="input-field col s6">
                <select id="linha_terapeutica" name="linha_terapeutica" required="">
                    <option value="" disabled selected>Escolha</option>
                    <option value="Terapia Cognitivo-Comportamental">Terapia Cognitivo-Comportamental</option>
                    <option value="Psicanálise">Psicanálise</option>
                </select>
                <label>Linha terapêutica</label>
            </div>

            <div class="center-align">
                <button class="btn waves-effect waves-light" type="submit">Concluir</button>
            </div>
        </div>

    </form>

</div>

<div id="modal" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Alterar foto de perfil</h4>
      <form enctype="multipart/form-data" action="update-picture" method="POST">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="file-field input-field">
      		<button class="btn btn-small">foto de perfil</button>
        		
        	<input type="file" name="profile">
      		
      		<div class="file-path-wrapper">
        		<input class="file-path validate" type="text">
      		</div>
   	    </div>
        
        
      
      
        </div>
        <div class="modal-footer">
            <button class="btn indigo white-text modal-action modal-close" type="submit">atualizar</button>
        </div>
    </form>
  </div>



<script>

    $(function(){
        $('#linha_terapeutica').val('{{$user->linha_teorica}}');
        $('#sexo').val('{{$user->sexo}}');
        $('#linha_terapeutica').material_select();
        $('#sexo').material_select();
        $('.modal').modal();
    });
    
</script>

@stop