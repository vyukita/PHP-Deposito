<?
require_once '../classes/Sessao.class.php';
$sessao = new Sessao();

require_once '../classes/Farmacia.class.php';
$farmacia = new Farmacia();

if(isset($_POST['registrar']))
{
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
			
	if(empty($nome || $endereco || $estado || $cidade))
	{
		echo("<script>alert('Nenhum campo pode estar em branco.');</script>");
	}
	else
	{
		if($farmacia->inserir_farmacia($nome, $endereco, $estado, $cidade))
		{
			echo("<script>location.reload();</script>");
		}
	}
}
else if(isset($_POST['remover']))
{
	$id = $_POST['id'];
	
	if($farmacia->remover_farmacia($id))
	{
		echo("<script>location.reload();</script>");
	}
}
?>
