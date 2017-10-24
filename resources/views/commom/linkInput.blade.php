<div class="input-field">

	<input type="text" name="link" id="link" class="validate {{ $errors->has('link') ? 'invalid':'' }}" value="{{ old('link') ? old('link') : '' }}">
	<label for="titulo">Link</label>

	@if ($errors->has('link'))
          <span class="red-text">
          	{{ $errors->first('link') }}
          </span>
          <br>
          <br>
	@endif

</div>
