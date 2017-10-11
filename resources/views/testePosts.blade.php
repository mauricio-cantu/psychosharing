@extends('principal.principal')


@section('conteudo')

<div class="container">
	<div class="chips chips-initial" id="tags">

	</div>
</div>

@stop

<script src="{{ asset('js/app.js') }}"></script>

<script>

$(function(){
	$.ajax({
		type: 'get',
		url: '/testeJson',
		dataType: 'json',
		success: function(data){
			console.log(data.keys);			
		}
	});
	var myData = [
        {
            "tag": "eqweqwew"
        },
        {
            "tag": "dasdas"
        }
	]
	console.log(myData);

		// $('#tags').material_chip({
		// 	data: myData
		// });
});

</script>

