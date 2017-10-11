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
