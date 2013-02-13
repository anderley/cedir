$(document).ready(function () {
	
	$('.conteudo-conta table td:last-child').css({
		'padding-top':'10px',
		'text-align':'right'
	});
	
	$('table.status td:last-child').css({
		'width':'40%'
	});
	
	$('.status td:first-child').css({
		'vertical-align':'middle'
	});
	
	$('table.produto td:nth-child(3)').css('cssText', 'text-align: center !important');
	
	$('.caracteristicas dl:nth-child(2n)').css({
		'background-color':'#f0f0f0'
	});
	
	$('.meu-carrinho table th:nth-child(1)').css({
		'width':'45%'
	});
	
	$('.meu-carrinho table tr:last-child td').css({
		'background-color':'#f8f8f8',
		'border-width':'1px 0',
		'color':'#f00000',
		'font-weight':'bold'
	});
	
	$('.meu-carrinho table td:nth-child(4)').css({
		'font-weight':'bold'
	});	
	
	$('.meu-carrinho table td:nth-child(5)').css({
		'color':'#f00000',
		'font-weight':'bold'
	});	
	
	$('#tabs a').click(function () {
		var numTab = $(this).attr('value');
		$('#tabs li').removeClass();
		$(this).parent().addClass('tab-ativa');
		$('div[id^=tab]').hide();
		$('#tab' + numTab).show();
	});
	
	$('.btn-ocultar').hide();
	
	$('.btn-detalhar').live('click', function () {
		$('.btn-ocultar').hide();
		$('.btn-detalhar').show();
		$('tr').removeClass('linha-ativa');
		$(this).hide();
		$(this).next().show();
		$('.detalhe').hide();
		$(this).parent().parent().addClass('linha-ativa');
		$(this).parent().parent().next('.detalhe').show();
	});
	
	$('.btn-ocultar').live('click', function () {
		$(this).hide();
		$(this).prev().show();
		$('.detalhe').hide();
		$('tr').removeClass('linha-ativa');
	});
	
	$('.meu-carrinho table td a').click(function () {
		$(this).parent().parent().remove();
		var linhas = $('.meu-carrinho table tr');
		
		if (linhas.length < 3) {
			window.location.href="meuCarrinho.html";
		}
		atualizaCarrinho();
	});
	
	$('.meu-carrinho table td input').focusout(function () {
		var patt = /\D/g;
		
		if ($(this).val() == "" 
				|| $(this).val() == "0"
				|| patt.test($(this).val())) {
			$(this).val(1);
		}
		atualizaCarrinho();
	});
	
});

function atualizaCarrinho() {
	var listaQtde = $('.meu-carrinho table tr td:nth-child(2)');
	var listaPrecoUnit = $('.meu-carrinho table tr td:nth-child(4)');
	var listaPrecoTotal = $('.meu-carrinho table tr td:nth-child(5)');
	var total = 0,
		valor = 0;
	
	
	for (var i=0; i < (listaQtde.size() - 1); i++) {
		valor = $(listaQtde[i]).children('input').val() * $(listaPrecoUnit[i]).text().replace(",", ".");
		$(listaPrecoTotal[i]).text(formatarMoeda(valor));
		total += valor;
	}
	$('.meu-carrinho table tr:last-child td:last-child').text("R$ " + formatarMoeda(total));
}

function formatarMoeda(valor) {
	var arrayValor = new Number(valor).toFixed(2).toString().split('.');
	var str = arrayValor[0];
	
	str=str.replace(/(\d{1})(\d{6})$/,"$1.$2");
	str=str.replace(/(\d{1})(\d{3})$/,"$1.$2");
	
	return (str + "," + ((arrayValor.length > 0) ? arrayValor[1] : "00"));
}
