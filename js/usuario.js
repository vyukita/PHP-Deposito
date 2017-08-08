function registrar() {
	var nome = document.getElementById("registrar-nome").value;
	var email =  document.getElementById("registrar-email").value;
	var senha =  document.getElementById("registrar-senha").value;
	var confirmarSenha =  document.getElementById("registrar-confirmar-senha").value;

	if(nome == '' || email == '' ||  senha == '' || confirmarSenha == "") {
		alert('Nenhum campo pode estar em branco.');

		return false;
	}
		
	if(senha != confirmarSenha) {
		alert('As duas senhas não coincidem.');

		return false;
	}

	nome = encodeURI(nome);
	email =  encodeURI(email);
	senha =  encodeURI(senha);
	confirmarSenha =  encodeURI(confirmarSenha);
	
	$.ajax({
		url: "ajax/usuario.ajax.function.php",
		type: "POST",
		data: "registrar&nome="+nome+"&email="+email+"&senha="+senha+"&confirmar_senha="+confirmarSenha,
		success: function(data) {
			$("#ajax").html(data);
		},
		error: function(error) {
			console.log(error);
		}
	});

	return false;
}

function entrar() {
	var email =  document.getElementById("entrar-email").value;
	var senha =  document.getElementById("entrar-senha").value;

	if(email == '' ||  senha == '') {
		alert('Nenhum campo pode estar em branco.');

		return false;
	}
		
	email =  encodeURI(email);
	senha =  encodeURI(senha);

	$.ajax({
		url: "ajax/usuario.ajax.function.php",
		type: "POST",
		data: "entrar&email="+email+"&senha="+senha,
		success: function(data) {
			$("#ajax").html(data);
		},
		error: function(error) {
			console.log(error);
		}
	});

	return false;
}