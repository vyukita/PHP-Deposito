<?
require_once 'classes/Sessao.class.php';
$sessao = new Sessao();

$sessao->verificar();

$farmacia_id = $_GET['id'];

require_once 'classes/Estoque.class.php';
$estoque = new Estoque();

$nome = "";
$categoria = "";
if(!empty($_GET['nome'])) $nome = $_GET['nome'];
if(!empty($_GET['categoria'])) $categoria = $_GET['categoria'];
$estoque_dados = $estoque->obter_dados($farmacia_id, $nome, $categoria);

$farmacia_dados = $estoque->obter_dados_farmacia($farmacia_id);

if(sizeof($farmacia_dados) == 0)
{
	header('Location: index.php');
}

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
						<a href="farmacias.php">Farmácias</a> &middot; <a href="sair.php">Sair</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3><?=$farmacia_dados[0]['nome'];?></h3>
					<?
					$soma_estoque = 0;
					for($i = 0; $i < sizeof($estoque_dados); $i++)
					{
						$soma_estoque += $estoque_dados[$i]['quantidade'] * $estoque_dados[$i]['valor']; 
					}
					?>
					<h4>Total de produtos: <?=sizeof($estoque_dados);?> &middot; Soma: R$ <?=number_format($soma_estoque, 2, ',', '.');?></h4>
					<h4></h4>
					<br/>
					<div class="form-inline">
						<input id="pesquisa-estoque-nome" type="text" class="form-control" placeholder="Nome" autofocus>
						<input id="pesquisa-estoque-categoria" type="text" class="form-control" placeholder="Categoria">
						<a id="pesquisa-estoque-pesquisar" href="#" onclick="return pesquisarEstoque(<?=$farmacia_id;?>);" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Pesquisar</a>
						<a id="pesquisa-estoque-limpar" href="estoque.php?id=<?=$farmacia_id;?>" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Limpar</a>
					</div>
					<br/>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Categoria</th>
									<th>Valor</th>
									<th>Quantidade</th>								
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input id="estoque-nome" type="text" class="form-control" placeholder="Nome"></td>
									<td><input id="estoque-categoria" type="text" class="form-control" placeholder="Categoria"></td>
									<td>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1">R$</span>
											<input id="estoque-valor" type="text" class="form-control" placeholder="Valor">
										</div>
									</td>
									<td><input id="estoque-quantidade" type="text" class="form-control" placeholder="Quantidade"></td>
									<td><a id="estoque-adicionar" href="#" onclick="return registrarEstoque(<?=$farmacia_id;?>);" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Adicionar</a></td>
								</tr>
								<?
									for($i = 0; $i < sizeof($estoque_dados); $i++)
									{
										?>
											<tr>
											<td><?=$estoque_dados[$i]['nome'];?></td>
											<td><?=$estoque_dados[$i]['categoria'];?></td>
											<td>
												<div class="input-group">
													<span class="input-group-addon" id="basic-addon1">R$</span>
													<input id="estoque-valor-<?=$estoque_dados[$i]['id'];?>" type="text" class="form-control" placeholder="Valor" value="<?=$estoque_dados[$i]['valor'];?>">
												</div>
											</td>
											<td><input id="estoque-quantidade-<?=$estoque_dados[$i]['id'];?>" type="text" class="form-control" placeholder="Quantidade" value="<?=$estoque_dados[$i]['quantidade'];?>"></td>
											<td><a id="estoque-salvar-<?=$estoque_dados[$i]['id'];?>" href="#" onclick="return salvarEstoque(<?=$estoque_dados[$i]['id'];?>);" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</a> <a id="estoque-remover-<?=$estoque_dados[$i]['id'];?>" href="#" onclick="return removerEstoque(<?=$estoque_dados[$i]['id'];?>);" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Remover</a></td>
											</tr>
										<?
									}
								?>
							</tbody>
						</table>
						<?
							if(sizeof($estoque_dados) == 0)
							{
								echo("<div class=\"text-center\"><br/><h2><span class=\"glyphicon glyphicon-remove\"></span></h2><h3>Nenhum produto no estoque.</h3></div><br/>");
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<script src="js/estoque.js"></script>
		<div id="ajax"></div>
	</body>
</html>
