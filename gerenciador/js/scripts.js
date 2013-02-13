var base_url = "/cedir/gerenciador/index.php/";

$(document).ready(function () {

	$('#depto_status').click(function () {
		var sel = $('input[type="checkbox"]:checked').serializeArray();
		var array = new Array();
			
		$.each(sel, function (i, item) {
			array.push(item.value);
		});
		
		$.ajax({
			type: "POST",
			url: base_url + "departamentos/trocar_status/",
			data: { ids: array }
		}).done(function (data) {
			var msg  = "Status alterado com sucesso!";
		
			$("tbody").html(data);
			$(".breadcrumb").after(montarMensagem("alert-success", msg));
		});
	});
	
	$(document).on('click', 'a[id^="depto_item_status"]', function () {
		var deptoItemId = $(this).attr('href').replace('#', '');
		var deptoId = $('input[name="depto_id"]').get(0).value;
		
		$.get(base_url + "departamento_itens/trocar_status/" + deptoId + "/" + deptoItemId, function (data) {
			var msg  = "Status alterado com sucesso!";
			
			$("tbody").html(data);
			$(".breadcrumb").after(montarMensagem("alert-success", msg));
		});
	});
	
	$(document).on('click', 'a[id^="marca_status"]', function () {
		var marcaId = $(this).attr('href').replace('#', '');
		
		$.get(base_url + "marcas/trocar_status/" + marcaId, function (data) {
			var msg  = "Status alterado com sucesso!";
			
			$("tbody").html(data);
			$(".breadcrumb").after(montarMensagem("alert-success", msg));
		});
	});
	
	$('#removeDeptos').click(function () {
		if (confirm("Deseja remover o(s) item(s) selecionado(s)?")) {
			var sel = $('input[type="checkbox"]:checked').serializeArray();
			var array = new Array();
			
			$.each(sel, function (i, item) {
				array.push(item.value);
			});
			
			$.ajax({
				type: "POST",
				url: base_url + "departamentos/excluir",
				data: { ids: array }
			}).done(function (data) {
				var msg  = "Item(s) removido(s) com sucesso!";
				
				$("tbody").html(data);
				$(".breadcrumb").after(montarMensagem("alert-success", msg));
			});
		}
	});

	$('#removeDeptoItens').click(function () {
		if (confirm("Deseja remover o(s) item(s) selecionado(s)?")) {
			var deptoId = $('input[name="depto_id"]').get(0).value;
			var sel = $('input[type="checkbox"]:checked').serializeArray();
			var array = new Array();
			
			$.each(sel, function (i, item) {
				array.push(item.value);
			});
			
			$.ajax({
				type: "POST",
				url: base_url + "departamento_itens/excluir",
				data: { ids: array, depto_id: deptoId  }
			}).done(function (data) {
				var msg  = "Item(s) removido(s) com sucesso!";
				
				$("tbody").html(data);
				$(".breadcrumb").after(montarMensagem("alert-success", msg));
			});
		}
	});
	
	$('#removeMarcas').click(function () {
		if (confirm("Deseja remover o(s) item(s) selecionado(s)?")) {
			var sel = $('input[type="checkbox"]:checked').serializeArray();
			var array = new Array();
			
			$.each(sel, function (i, item) {
				array.push(item.value);
			});
			
			$.ajax({
				type: "POST",
				url: base_url + "marcas/excluir",
				data: { ids: array }
			}).done(function (data) {
				var msg  = "Item(s) removido(s) com sucesso!";
				
				$("tbody").html(data);
				$(".breadcrumb").after(montarMensagem("alert-success", msg));
			});
		}
	});
		
	$('#marcar').on('click', function () {
		$('tbody td:last-child').children().prop('checked', true);
	});
	
	$('#desmarcar').on('click', function () {
		$('tbody td:last-child').children().prop('checked', false);
	});
	
});


function montarMensagem(cssClass, mensagem) {
	$(".alert").remove();
	
	return "<div class='alert " + cssClass + " ?>'><button type='button' class='close' data-dismiss='alert'>&times;</button>" + mensagem + "</div>";
}
