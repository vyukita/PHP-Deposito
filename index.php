<?
require_once 'classes/Sessao.class.php';

$sessao = new Sessao();

$sessao->redirecionar();
?>

<!DOCTYPE html>

<html>
    <head>
		<? include 'includes/head.php';?>
    </head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2>Seu deposito</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h3>Entrar</h3>
					<div class="form-group">
						<div>E-mail</div>
						<input id="entrar-email" type="text" class="form-control" placeholder="Digite seu e-mail" autofocus>
					</div>
					<div class="form-group">
						<div>Senha</div>
						<input id="entrar-senha" type="password" class="form-control" placeholder="Digite sua senha">
					</div>
					<div class="form-group">
						<a id="entrar-continuar" href="#" onclick="return entrar();" class="btn btn-default"><span class="glyphicon glyphicon-log-in"></span> Entrar</a>
					</div>
				</div>
				<div class="col-md-6">
					<h3>Criar uma conta</h3>
					<div class="form-group">
						<div class="paragrafo-nome">Nome</div>
						<input id="registrar-nome"  type="text" class="form-control" placeholder="Digite seu nome">
					</div>
					<div class="form-group">
						<div class="paragrafo-nome">E-mail</div>
						<input id="registrar-email" type="text" class="form-control" placeholder="Digite seu e-mail">
					</div>
					<div class="form-group">
						<div class="paragrafo-nome">Senha</div>
						<input id="registrar-senha" type="password" class="form-control" placeholder="Digite sua senha">
					</div>
					<div class="form-group">
						<div class="paragrafo-nome">Confirmar senha</div>
						<input id="registrar-confirmar-senha" type="password" class="form-control" placeholder="Digite novamente sua senha">
					</div>
					<div class="form-group">
						<a id="registrar-continuar" href="#" onclick="return registrar();" class="btn btn-default"><span class="glyphicon glyphicon-log-in"></span> Criar uma conta</a>
					</div>
				</div>
			</div>
		</div>
		<script src="js/usuario.js"></script>
		<div id="ajax"></div>
	</body>
</html>
