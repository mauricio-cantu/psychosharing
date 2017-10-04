$(function(){

	$(".button-collapse").sideNav();
	
	$("#bt-menu").sideNav();

	$('.chips').material_chip();

	$('#sexo, #linha_terapeutica').material_select();

	$('.validate, .datepicker').focus(function(){
		$(this).removeClass('invalid');
		$(this).parent().find('span').hide();
	});

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

});