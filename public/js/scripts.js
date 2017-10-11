$(function(){

	$(".button-collapse").sideNav();
	
	$("#bt-menu").sideNav();

	$('.chips').material_chip();

	$('#sexo, #linha_terapeutica').material_select();

	$('.validate, .datepicker').focus(function(){
		$(this).removeClass('invalid');
		$(this).parent().find('span').hide();
	});

	$('#errors').hide();
	
	disableLink();
	
	disableAnexo();
	
	activateDatepicker();

	activateDropdowns();	

});

function logout(){
	swal("Realizar logout?",{
		icon: "info",
		buttons:{
			cancel: true,
			confirm: true
		},
		confirmButtonText: "Sim",
		cancelButtonText: "Cancelar",
	});
}

// exibir erros de preenchimento de dados
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

// dialog de publicação compartilhada
function alertSuccess(){
    swal("Publicação compartilhada!", {
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
		constrainWidth: true, // Does not change width of dropdown to that of the activator
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

// função para poder desabilitar o campo de anexo
function disableAnexo(){
	$('.anexo').prop('disabled', false);
	
	$('#noFile').click(function(){
		if($('.anexo').is(':disabled')){
			$('#link').val('');
			$('#link').removeClass('valid');
			$('.anexo').prop('disabled', false);
		}else{
			$('.anexo').prop('disabled', true);
		}
	});
}

// função para poder desabilitar o campo de link	
function disableLink(){
	$('#link').prop('disabled', false);
	
	$('#noLink').click(function(){

		if($('#link').is(':disabled')){
			$('#link').prop('disabled', false);
		}else{
			$('#link').val('');
			$('#link').removeClass('valid');
			$('#link').prop('disabled', true);
		}
	});
}