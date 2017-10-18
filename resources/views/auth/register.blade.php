@extends('principal.principal')

@section('conteudo')


  <div class="card hoverable" id="register">

    <h4 class="center-align indigo-text">Você está a poucos passos de compartilhar seu conhecimento!</h4>
    <h6 class="center-align">Informe seus dados abaixo</h6>
    
    <br>

    <form class="col s12" method="POST" action="{{ route('register') }}">

    {{ csrf_field() }}

    <div class="row">
      <div class="input-field col l4 s12">

        <input id="nome" type="text" name="name" class="validate {{ $errors->has('name') ? 'invalid':'' }}" value="{{ old('name') ? old('name') : '' }}" autofocus="">

        @if ($errors->has('name'))
          <span class="red-text">
            {{ $errors->first('name') }}
          </span>
        @endif

        <label for="nome">Nome completo</label>

      </div>
      <div class="input-field col s6 l4">

        <input id="crp" type="text" name="crp" class="validate {{ $errors->has('crp') ? 'invalid':'' }}" value="{{ old('crp') ? old('crp') : '' }}">

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
    <input id="senha" type="password" name="password" class="validate {{ $errors->has('password') ? 'invalid':'' }}">
    @if ($errors->has('password'))
    <span class="red-text">
    {{ $errors->first('password') }}
    </span>
    @endif
    <label for="senha">Senha</label>
    </div>


    <div class="input-field col s6">
    <input id="senha" type="password" name="password_confirmation" class="validate {{ $errors->has('password') ? 'invalid':'' }}">
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
      <select id="linha_terapeutica" name="linha_terapeutica" required="">
          <option value="" disabled selected>Escolha</option>
          <option value="Terapia Cognitivo-Comportamental">Terapia Cognitivo-Comportamental</option>
          <option value="Psicanálise">Psicanálise</option>
          <option value="Análise junguiana">Análise junguiana</option>
          <option value="Beaviorismo">Beaviorismo</option>
          <option value="Humanismo">Humanismo</option>
          <option value="Psicoterapia Corporal">Psicoterapia Corporal</option>
          <option value="Transpessoal">Transpessoal</option>
          <option value="Mindfullness Psychology">Mindfullness Psychology</option>
      </select>
      <label>Linha terapêutica</label>
    </div>

    <div class="center-align">
    <button class="btn waves-effect waves-light" type="submit">Concluir</button>
    </div>
    </form>
  </div>

<br>


@endsection
