<div class="input-field">

	<label for="titulo">Título</label>
	<input autofocus type="text" name="titulo" id="titulo" class="validate {{ $errors->has('titulo') ? 'invalid':'' }}" value="{{ old('titulo') ? old('titulo') : '' }}">
	<span class="errors red-text">Favor preencher este campo</span>

</div>
