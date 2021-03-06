@extends('principal.principal')

@section('conteudo')


    <div class="card hoverable" style="padding: 20px; padding-left: 30px;">
   
        <h3>Resetar senha</h3>

        @if (session('status'))
            
                Enviamos ao seu e-mail um link para a recuperação de senha.
            
        @endif

        <br>


      

        <form method="POST" action="{{ route('password.email') }}">

            <div class="row">  

                {{ csrf_field() }}

                <div class="input-field">

                    <input id="email" type="text" name="email" class="validate {{ $errors->has('email') ? 'invalid':'' }}" value="{{ old('email') ? old('email') : '' }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="red-text">
                        {{ $errors->first('email') }}
                        </span>
                        <br><br>
                    @endif

                    <label>E-mail</label>
                </div>
            </div>

            <div class="row center-align">
                <button type="submit" class="btn btn-primary">
                    Enviar link para alteração de senha
                </button>
            </div>
        </form>

        </div>
    </div>


@endsection
