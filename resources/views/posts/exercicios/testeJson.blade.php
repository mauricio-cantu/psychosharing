@extends('principal.principal')

@section('conteudo')

<div class="container">

	<div class="chips chips-initial" id="chips"></div>
	<div id="teste">
	</div>

</div>

<script src="{{ asset('js/posts/exercicio.js') }}"></script>


<script type="text/javascript">

	$(function(){
		var data = getDetails(14);
		
	});	

</script>

@stop
