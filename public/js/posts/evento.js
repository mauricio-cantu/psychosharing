// cadastrar evento através de AJAX post

function cadastrarEvento(){
    var titulo = $('#titulo').val();
    var local = $('#local').val();
    var data = $('#data').val();
	var descricao = $('#descricao').val();
    var token = $('#token').val();
    var link = $('#link').val();
	var chips = $('#chips').material_chip('data');
	
	$.ajax({
		type: 'post',
		url: '/eventos/cadastrar',
		data: {
			titulo: titulo,
			descricao: descricao,
			data: data,
			palavras_chave: chips,
            _token: token,
            local: local,
            link: link
		},
		dataType: 'json',
		success: function(data){
			console.log(data);
			alertSuccess();			
		},
		error: function(data){
			showErrors(data);			
		}
	});

}