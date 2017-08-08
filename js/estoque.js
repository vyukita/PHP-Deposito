function registrarEstoque(farmacia_id) {
	var nome = document.getElementById("estoque-nome").value;
	var categoria =  document.getElementById("estoque-categoria").value;
	var valor =  document.getElementById("estoque-valor").value;
	var quantidade =  document.getElementById("estoque-quantidade").value;

	if(nome == '' || categoria == '' ||  valor == '' || quantidade == "") {
		alert('Nenhum campo pode estar em branco.');

		return false;
	}
	
	farmacia_id = encodeURI(farmacia_id);
	nome = encodeURI(nome);
	categoria =  encodeURI(categoria);
	valor =  encodeURI(valor);
	quantidade =  encodeURI(quantidade);
	
	$.ajax({
		url: "ajax/estoque.ajax.function.php",
		type: "POST",
		data: "registrar&farmacia_id="+farmacia_id+"&nome="+nome+"&categoria="+categoria+"&valor="+valor+"&quantidade="+quantidade,
		success: function(data) {
			$("#ajax").html(data);
		},
		error: function(error) {
			console.log(error);
		}
	});

	return false;
}
function removerEstoque(id) {
	id = encodeURI(id);
	
	$.ajax({
		url: "ajax/estoque.ajax.function.php",
		type: "POST",
		data: "remover&id="+id,
		success: function(data) {
			$("#ajax").html(data);
		},
		error: function(error) {
			console.log(error);
		}
	});

	return false;
}

function salvarEstoque(id){
	var valor =  document.getElementById("estoque-valor-" + id).value;
	var quantidade =  document.getElementById("estoque-quantidade-" + id).value;
	
	if(valor == '' || quantidade == "") {
		alert('Nenhum campo pode estar em branco.');

		return false;
	}
	
	id = encodeURI(id);
	valor =  encodeURI(valor);
	quantidade =  encodeURI(quantidade);
	
	$.ajax({
		url: "ajax/estoque.ajax.function.php",
		type: "POST",
		data: "editar&id="+id+"&valor="+valor+"&quantidade="+quantidade,
		success: function(data) {
			$("#ajax").html(data);
		},
		error: function(error) {
			console.log(error);
		}
	});

	return false;
}

function pesquisarEstoque(id) {
	var nome = document.getElementById("pesquisa-estoque-nome").value;
	var categoria =  document.getElementById("pesquisa-estoque-categoria").value;
	
	nome = encodeURI(nome);
	categoria =  encodeURI(categoria);
	
	window.location = 'estoque.php?id='+id+'&nome='+nome+'&categoria='+categoria;
}