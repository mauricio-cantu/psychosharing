@extends('principal.principal')

@section('conteudo')

<div class="container">
  <div class="card hoverable" style="padding: 20px;">

    <h3 class="center-align" style="font-weight: 300;">Cadastro no sistema</h3>
    
    <hr>

    <form class="col s12" method="POST" action="{{ route('register') }}">

    {{ csrf_field() }}

    <div class="row">
      <div class="input-field col s6">

        <input id="nome" type="text" name="name" class="validate {{ $errors->has('name') ? 'invalid':'' }}" value="{{ old('name') ? old('name') : '' }}">

        @if ($errors->has('name'))
          <span class="red-text">
          {{ $errors->first('name') }}
          </span>
        @endif

        <label for="nome">Nome completo</label>

      </div>
      <div class="input-field col s6">

        <input id="crp" type="text" name="crp" class="validate {{ $errors->has('crp') ? 'invalid':'' }}" value="{{ old('crp') ? old('crp') : '' }}">

        @if ($errors->has('crp'))
          <span class="red-text">
          {{ $errors->first('crp') }}
          </span>
        @endif

        <label for="crp">CRP</label>
        
      </div>
    </div>


    <div class="row">
    <div class="input-field col s12">
    <input id="email" type="email" name="email" class="validate {{ $errors->has('email') ? 'invalid':'' }}" value="{{ old('email') ? old('email') : '' }}">
    @if ($errors->has('email'))
    <span class="red-text">
    {{ $errors->first('email') }}
    </span>
    @endif
    <label for="email">Email</label>
    </div>
    </div>

    <div class="row">
    <div class="input-field col s6">
    <input id="senha" type="password" name="password" class="{{ $errors->has('password') ? 'invalid':'' }}">
    @if ($errors->has('password'))
    <span class="red-text">
    {{ $errors->first('password') }}
    </span>
    @endif
    <label for="senha">Senha</label>
    </div>


    <div class="input-field col s6">
    <input id="senha" type="password" name="password_confirmation" class="{{ $errors->has('password') ? 'invalid':'' }}">
    @if ($errors->has('password'))
    <span class="red-text">
    {{ $errors->first('password') }}
    </span>
    @endif
    <label for="senha">Confirme sua senha</label>
    </div>
    </div>



    <div class="row">
    <div class="input-field col s6">
    <input id="cidade" type="text" name="cidade" class="validate {{ $errors->has('cidade') ? 'invalid':'' }}" value="{{ old('cidade') ? old('cidade') : '' }}">
    @if ($errors->has('cidade'))
    <span class="red-text">
    {{ $errors->first('cidade') }}
    </span>
    @endif
    <label for="cidade">Cidade</label>
    </div>

    <div class="input-field col s6">
    <input id="teoria" type="text" placeholder="Ex.: Terapia Cognitivo Comportamental" name="linha_teorica" class="validate {{ $errors->has('linha_teorica') ? 'invalid':'' }}" value="{{ old('linha_teorica') ? old('linha_teorica') : '' }}">
    @if ($errors->has('linha_teorica'))
    <span class="red-text">
    {{ $errors->first('linha_teorica') }}
    </span>
    @endif
    <label for="teoria">Qual linha terapêutica você aplica?</label>
    </div>
    </div>

    <div class="center-align">
    <button class="btn waves-effect waves-light" type="submit"><i class="material-icons left">send</i> Concluir</button>
    </div>
    </form>
  </div>
</div>
<br>

@endsection
