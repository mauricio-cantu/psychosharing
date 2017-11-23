$(() => {
	
	$("#bt-menu").sideNav();

	$('.chips').material_chip();

	$('#sexo, #linha_terapeutica').material_select();

	// esconde a mensagem de erro e tira o vermelho dos campos que nao passaram pela validação
	$('.validate, .datepicker').focus(function(){
		$(this).removeClass('invalid');
		$(this).parent().find('span').hide();
	});

	activateDatepicker();

	activateDropdowns();	

});

// dialog de publicação compartilhada ou editada, depende do parâmetro que for passado ao chamar o método
function alertSuccess(){
    swal("Concluído!", {
        icon: "success",
        timer: 2500
    }).then(function(){
        location.href = '/home';
    });
}

function activateDropdowns(){
	$('.dropdown-button').dropdown({
		inDuration: 300,
		outDuration: 225,
		constrainWidth: 0, // Does not change width of dropdown to that of the activator
		hover: false, // Activate on hover
		gutter: 0, // Spacing from edge
		belowOrigin: true, // Displays   dropdown below the button
		alignment: 'left', // Displays dropdown with edge aligned to the left of button
		stopPropagation: false // Stops event propagation
	  }
	);
}

// função para ativar a modal de calendário do Materialize em português
function activateDatepicker(){
	$('.datepicker').pickadate({
        
        labelMonthNext: 'Proximo Mês',
        labelMonthPrev: 'Mês Anterior',
        
        labelMonthSelect: 'Selecionar Mês',
        labelYearSelect: 'Selecionar Ano',
        
        monthsFull: [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
        monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
        weekdaysFull: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado' ],
        weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb' ],
        
        weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
        
        today: 'Hoje',
        clear: 'Limpar',
        close: 'Fechar',
        closeOnSelect: false,
        format: 'dd/mm/yyyy'
	});
}
