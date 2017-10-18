@extends('principal.principal')
@section('conteudo')


	<div class="card hoverable" id="login">
		<h4 class="center-align" style="font-weight: 300">Login</h4> 
		
		<br>		

		<form class="col s12" method="POST" action="{{ route('login') }}">

			{{ csrf_field() }}

			<div class="input-field">
				
				<input type="email" name="email" id="email" autofocus="" class="validate {{ $errors->has('email') ? 'invalid':'' }}" value="{{ old('email') ? old('email') : '' }}">
				@if ($errors->has('email'))
		            <span class="red-text">
		                {{ $errors->first('email') }}
		            </span>
	        	@endif
				<label for="email">E-mail</label>
			</div>

			<div class="input-field">
				
				<input type="password" name="password" id="password" class="validate {{ $errors->has('password') ? 'invalid':'' }}" value="{{ old('password') ? old('password') : '' }}">
				@if ($errors->has('password'))
		            <span class="red-text">
		                {{ $errors->first('password') }}
		            </span>

	        	@endif
				<label for="password">Senha</label>
			</div>
			
			<br>

			<div class="left-align">
				<button class="btn waves-effect" type="submit" name="logar">entrar</button>
				<a class="right" href="{{ route('password.request') }}">Esqueceu sua senha?</a>
			</div>


		</form>
	</div>



@endsection
