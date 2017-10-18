@extends('principal.principal')

@section('conteudo')

<div class="hoverable card">
    <div>
        <h3 class="center">Edite suas informações<a href="" title="Alterar foto de perfil" class="right"><i class="small material-icons">photo_camera</i></a></h3>
        
    </div>
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
        </div>

    </form>

</div>

@stop