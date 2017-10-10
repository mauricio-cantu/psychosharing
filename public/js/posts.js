// cadastrar exercício através de AJAX post
function cadastrarExercicio(){
	var titulo = $('#titulo').val();
	var descricao = $('#descricao').val();
	var linha = $('#linha_terapeutica').val();
	var token = $('#token').val();
	var chips = $('#chips').material_chip('data');
	
	$.ajax({
		type: 'post',
		url: '/exercicios/cadastrar',
		data: {
			titulo: titulo,
			descricao: descricao,
			linha_terapeutica: linha,
			palavras_chave: chips,
			_token: token
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

// cadastrar relato através de AJAX post

function cadastrarRelato(){
    var titulo = $('#titulo').val();
    var conteudo = $('#conteudo').val();
    var linha = $('#linha_terapeutica').val();
    var token = $('#token').val();   
	var chips = $('#chips').material_chip('data');
	
	$.ajax({
		type: 'post',
		url: '/relatos/cadastrar',
		data: {
			titulo: titulo,
			conteudo: conteudo,
			linha_terapeutica: linha,
			palavras_chave: chips,
            _token: token            
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


function showErrors(data){
    var errors = data.responseJSON;
    console.log(errors);

    $('#errors').empty()
    .fadeIn('slow')
    .append('Os campos abaixo devem ser preenchidos:<br>')
    .append('<ul>');
    $.each(errors, function(key, value){					
        $('#errors').append('<li>'+value+'</li>');
    });
    $('#errors').append('</ul>');
}

function alertSuccess(){
    swal("Publicação compartilhada!", {
        icon: "success",
        timer: 2500
    }).then(function(){
        location.href = '/home';
    });
}