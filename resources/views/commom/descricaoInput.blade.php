<div class="input-field">

	<textarea name="descricao" id="descricao" class="materialize-textarea validate {{ $errors->has('descricao') ? 'invalid':'' }}" placeholder="Comente sobre este {{$type}}">{{ old('descricao') ? old('descricao') : '' }}</textarea>
	<label for="descricao">Descrição</label>

	@if ($errors->has('descricao'))
          <span class="red-text">
          	{{ $errors->first('descricao') }}
          </span>
          <br>
	@endif

</div>