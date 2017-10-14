<div class="input-field">

	<input autofocus type="text" name="titulo" id="titulo" class="validate {{ $errors->has('titulo') ? 'invalid':'' }}" value="{{ old('titulo') ? old('titulo') : '' }}">
	<label for="titulo">Título</label>

	@if($errors->has('titulo'))
          <span class="red-text">
          	{{ $errors->first('titulo') }}
          </span>
          <br>
          <br>
	@endif

</div>