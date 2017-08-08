<?
require_once 'MySQL.class.php';

class Farmacia
{
    private $mysql;

    public function __construct()
    {
        $this->mysql = new MySQL();
    }

	public function inserir_farmacia($nome, $endereco, $estado, $cidade)
	{
		require_once 'Usuario.class.php';
		$usuario = new Usuario();

		$usuario_dados = $usuario->obter_dados($_SESSION['email'], $_SESSION['senha']);

		$usuario_id = $usuario_dados[0]['id'];
		
		$sql = "INSERT INTO farmasis.tb_farmacia VALUES (NULL, '".$usuario_id."', '".$nome."', '".$endereco."', '".$estado."', '".$cidade."');";

		return $this->mysql->exec_query($sql);
	}
	
	public function remover_farmacia($id)
	{
		$sql = "DELETE FROM farmasis.tb_estoque WHERE farmacia_id = '".$id."';";

		if($this->mysql->exec_query($sql))
		{
			$sql = "DELETE FROM farmasis.tb_farmacia WHERE id = '".$id."';";

			return $this->mysql->exec_query($sql);
		}
	}
	
	public function obter_dados($usuario_id, $nome, $estado, $cidade)
	{
		$sql = "SELECT * FROM farmasis.tb_farmacia WHERE usuario_id ='".$usuario_id."'";
		
		if(!empty($nome))
		{
			$sql.=" AND nome LIKE '%".$nome."%'";
		}
		if(!empty($estado))
		{
			$sql.=" AND estado LIKE '%".$estado."%'";
		}
		if(!empty($cidade))
		{
			$sql.=" AND cidade LIKE '%".$cidade."%'";
		}
		
		return $this->mysql->select_query($sql);
	}
}
?>
