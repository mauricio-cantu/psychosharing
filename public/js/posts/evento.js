$('#submit').click((event) => {
	// prevenir o comportamento padrão do clique de um botão "submit", que é atualizar a página
	event.preventDefault();
	submit();
});

// método para submeter o form de cadastro ou edição
submit = () => {
	
	var titulo = $('#titulo').val();
    var local = $('#local').val();
    var data = $('#data').val();
	var descricao = $('#descricao').val();
	var token = $('#token').val();
	var linha = $('#linha_terapeutica').val();
    var link = $('#link').val();
	var chips = $('#chips').material_chip('data');

	var url = $('#form').attr('action'); 
	
	$.ajax({
		type: 'post',
		url: url,
		data: {
			titulo: titulo,
			local: local,
			data: data,
			descricao: descricao,
			linha_terapeutica: linha,
			link: link,
			palavras_chave: chips,
			_token: token
		},
		dataType: 'json',
		success: (data) => {
			console.log(data.responseJSON);
			alertSuccess();			
		},
		error: (data) => {
			let erros = data.responseJSON;	

			console.log(erros);
			
			if(erros.titulo){
				$('#titulo').toggleClass('invalid', true);
				$('#titulo').next().toggle(true);
			}

			if(erros.descricao){
				$('#descricao').toggleClass('invalid', true);
				$('#descricao').next().toggle(true);
			}

			if(erros.local){
				$('#local').toggleClass('invalid', true);
				$('#local').next().toggle(true);
			}

			if(erros.data){
				$('#data').toggleClass('invalid', true);
				$('#data').next().toggle(true);
			}

			if(erros.link){
				$('#link').toggleClass('invalid', true);
				$('#link').next().toggle(true);
			}

		}
	}); 

}

// método para preencher os campos com informações do exercicio que está sendo editado
getDetails = (id) => {
	
	$.ajax({
		type: 'get',
		url: '/eventos/ajax/'+id,
		dataType: 'json'
	}).done((data) => {		
		console.log(data);
		$('#chips').material_chip({data: data.keys});
		$('#titulo').val(data.post.titulo);
		$('#local').val(data.evento.local);
		$('#data').val(data.evento.data);
		$('#link').val(data.evento.link);
		$('#descricao').val(data.evento.descricao);
		$('#linha_terapeutica').val(data.post.linha_terapeutica);
		$('#linha_terapeutica').material_select();		
	}).fail((data) => {
		console.log(data);
	});
	
}