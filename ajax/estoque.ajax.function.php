<?
require_once '../classes/Sessao.class.php';
$sessao = new Sessao();

require_once '../classes/Estoque.class.php';
$estoque = new Estoque();

if(isset($_POST['registrar']))
{
	$farmacia_id = $_POST['farmacia_id'];
	$nome = $_POST['nome'];
	$categoria = $_POST['categoria'];
	$valor = $_POST['valor'];
	$quantidade = $_POST['quantidade'];
			
	if(empty($nome || $categoria || $valor || $quantidade)){
		echo("<script>alert('Nenhum campo pode estar em branco.');</script>");
	}
	else
	{
		$estoque->inserir_estoque($farmacia_id, $nome, $categoria, $valor, $quantidade);
		echo("<script>location.reload();</script>");
	}
}
else if(isset($_POST['remover']))
{
	$id = $_POST['id'];
	
	if($estoque->remover_estoque($id))
	{
		echo("<script>location.reload();</script>");
	}
}
else if(isset($_POST['editar']))
{
	$id = $_POST['id'];
	$valor = $_POST['valor'];
	$quantidade = $_POST['quantidade'];
			
	if(empty($valor || $quantidade)){
		echo("<script>alert('Nenhum campo pode estar em branco.');</script>");
	}
	else
	{
		$estoque->editar_estoque($id, $valor, $quantidade);
		echo("<script>location.reload();</script>");
	}
}
?>
