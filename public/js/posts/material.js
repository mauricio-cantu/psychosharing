$('#submit').click((event) => {
	// prevenir o comportamento padrão do clique de um botão "submit", que é atualizar a página
	event.preventDefault();
	submit();
});

// método para submeter o form de cadastro ou edição
submit = () => {
	
	let titulo = $('#titulo').val();
	let descricao = $('#descricao').val();
	let linha = $('#linha_terapeutica').val();
	let token = $('#token').val();
	let link = $('#link').val();
	let chips = $('#chips').material_chip('data');

	let url = $('#form').attr('action'); 
	
	$.ajax({
		type: 'post',
		url: url,
		data: new FormData($('#form')[0]),
		dataType:'json',		
		processData: false,
		contentType: false,
		success: (data) => {
			console.log(data.responseJSON);
			alertSuccess();			
		}
	}); 

}

// método para preencher os campos com informações do exercicio que está sendo editado
getDetails = (id) => {
	
	$.ajax({
		type: 'get',
		url: '/materials/ajax/'+id,
		dataType: 'json'
	}).done((data) => {		
		console.log(data);
		$('#chips').material_chip({data: data.keys});
		$('#titulo').val(data.post.titulo);
		$('#descricao').val(data.material.descricao);
		$('#link').val(data.material.link);
		$('#linha_terapeutica').val(data.post.linha_terapeutica);
		$('#linha_terapeutica').material_select();		
	}).fail((data) => {
		console.log(data);
	});
	
}