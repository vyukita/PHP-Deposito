<?
require_once 'classes/Sessao.class.php';
$sessao = new Sessao();

$sessao->verificar();

require_once 'classes/Usuario.class.php';
$usuario = new Usuario();

$usuario_dados = $usuario->obter_dados($_SESSION['email'], $_SESSION['senha']);

$usuario_email = $usuario_dados[0]['email'];
$usuario_nome = $usuario_dados[0]['nome'];
$usuario_id = $usuario_dados[0]['id'];

require_once 'classes/Farmacia.class.php';
$farmacia = new Farmacia();

$nome = "";
$estado = "";
$cidade = "";
if(!empty($_GET['nome'])) $nome = $_GET['nome'];
if(!empty($_GET['estado'])) $estado = $_GET['estado'];
if(!empty($_GET['cidade'])) $cidade = $_GET['cidade'];
$farmacia_dados = $farmacia->obter_dados($usuario_id, $nome, $estado, $cidade);

?>
<!DOCTYPE html>
<html>
    <head>
		<? include 'includes/head.php'; ?>
    </head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2>Farmasis</h2>
					<div>
						<a href="farmacias.php">Farmácias</a> &middot; <a href="sair.php">Sair</a> &middot; <a href="configuracoes.php">Configurações</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>Olá, <?=$usuario_nome;?>!</h3>
					<h4><?=$usuario_email;?></h4>
					<br/>
					<div class="form-inline">
						<input id="pesquisa-farmacia-nome" type="text" class="form-control" placeholder="Nome" autofocus>
						<input id="pesquisa-farmacia-estado" type="text" class="form-control" placeholder="Estado">
						<input id="pesquisa-farmacia-cidade" type="text" class="form-control" placeholder="Cidade">
						<a id="pesquisa-farmacia-pesquisar" href="#" onclick="return pesquisarFarmacia();" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Pesquisar</a>
						<a id="pesquisa-farmacia-limpar" href="farmacias.php" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Limpar</a>
					</div>
					<br/>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Estado</th>
									<th>Cidade</th>
									<th>Endereço</th>

									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input id="farmacia-nome"  type="text" class="form-control" placeholder="Nome"></td>
									<td><input id="farmacia-endereco" type="text" class="form-control" placeholder="Estado"></td>
									<td><input id="farmacia-estado" type="text" class="form-control" placeholder="Cidade"></td>
									<td><input id="farmacia-cidade" type="text" class="form-control" placeholder="Endereço"></td>
									<td><a id="farmacia-adicionar" href="#" onclick="return registrarFarmacia();" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Adicionar</a></td>
								</tr>
								<?
									for($i = 0; $i < sizeof($farmacia_dados); $i++)
									{
										?>
											<tr>
											<td><?=$farmacia_dados[$i]['nome'];?></td>
											<td><?=$farmacia_dados[$i]['estado'];?></td>
											<td><?=$farmacia_dados[$i]['cidade'];?></td>
											<td><?=$farmacia_dados[$i]['endereco'];?></td>
											<td><a href="estoque.php?id=<?=$farmacia_dados[$i]['id'];?>" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Estoque</a> <a id="farmacia-remover-<?=$farmacia_dados[$i]['id'];?>" href="#" onclick="return removerFarmacia(<?=$farmacia_dados[$i]['id'];?>);" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Remover</a></td>
											</tr>
										<?
									}
								?>
							</tbody>
						</table>
						<?
							if(sizeof($farmacia_dados) == 0)
							{
								echo("<div class=\"text-center\"><br/><h2><span class=\"glyphicon glyphicon-remove\"></span></h2><h3>Nenhuma farmácia cadastrada.</h3></div><br/>");
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<script src="js/farmacia.js"></script>
		<div id="ajax"></div>
	</body>
</html>
