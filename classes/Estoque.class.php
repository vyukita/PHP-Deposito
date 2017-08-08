<?
require_once 'MySQL.class.php';

class Estoque
{
    private $mysql;

    public function __construct()
    {
        $this->mysql = new MySQL();
    }

	public function inserir_estoque($farmacia_id, $nome, $categoria, $valor, $quantidade)
	{
		$sql = "INSERT INTO farmasis.tb_estoque VALUES (NULL, '".$farmacia_id."', '".$nome."', '".$categoria."', '".$valor."', '".$quantidade."');";

		return $this->mysql->exec_query($sql);
	}
	
	public function remover_estoque($id)
	{
		$sql = "DELETE FROM farmasis.tb_estoque WHERE id ='".$id."';";

		return $this->mysql->exec_query($sql);
	}
	
	public function editar_estoque($id, $valor, $quantidade)
	{
		$sql = "UPDATE farmasis.tb_estoque SET valor = '".$valor."', quantidade = '".$quantidade."' WHERE id = '".$id."'; ";
		
		return $this->mysql->exec_query($sql);
	}
	
	public function obter_dados($farmacia_id, $nome, $categoria)
	{
		$sql = "SELECT * FROM farmasis.tb_estoque WHERE farmacia_id = '".$farmacia_id."'";
		
		if(!empty($nome))
		{
			$sql.=" AND nome LIKE '%".$nome."%'";
		}
		if(!empty($categoria))
		{
			$sql.=" AND categoria LIKE '%".$categoria."%'";
		}
		
		return $this->mysql->select_query($sql);
	}
	
	public function obter_dados_farmacia($farmacia_id)
	{
		$sql = "SELECT * FROM farmasis.tb_farmacia WHERE id ='".$farmacia_id."';";
		
		return $this->mysql->select_query($sql);
	}
}
?>
