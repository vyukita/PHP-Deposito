function registrarFarmacia() {
	var nome = document.getElementById("farmacia-nome").value;
	var endereco =  document.getElementById("farmacia-endereco").value;
	var estado =  document.getElementById("farmacia-estado").value;
	var cidade =  document.getElementById("farmacia-cidade").value;

	if(nome == '' || endereco == '' ||  estado == '' || cidade == "") {
		alert('Nenhum campo pode estar em branco.');

		return false;
	}

	nome = encodeURI(nome);
	endereco =  encodeURI(endereco);
	estado =  encodeURI(estado);
	cidade =  encodeURI(cidade);
	
	$.ajax({
		url: "ajax/farmacia.ajax.function.php",
		type: "POST",
		data: "registrar&nome="+nome+"&endereco="+endereco+"&estado="+estado+"&cidade="+cidade,
		success: function(data) {
			$("#ajax").html(data);
		},
		error: function(error) {
			console.log(error);
		}
	});

	return false;
}

function removerFarmacia(id) {
	
	id = encodeURI(id);
	
	$.ajax({
		url: "ajax/farmacia.ajax.function.php",
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

function pesquisarFarmacia() {
	
	var nome = document.getElementById("pesquisa-farmacia-nome").value;
	var estado =  document.getElementById("pesquisa-farmacia-estado").value;
	var cidade =  document.getElementById("pesquisa-farmacia-cidade").value;

	nome = encodeURI(nome);
	estado =  encodeURI(estado);
	cidade =  encodeURI(cidade);
	
	window.location = 'farmacias.php?nome='+nome+'&estado='+estado+'&cidade='+cidade;
}