<div class="input-field">

	<label for="descricao">Descrição</label>
	<textarea name="descricao" id="descricao" class="materialize-textarea validate {{ $errors->has('descricao') ? 'invalid':'' }}" placeholder="Comente sobre este {{$type}}">{{ old('descricao') ? old('descricao') : '' }}</textarea>
	<span class="errors red-text">Favor preencher este campo</span>
</div>