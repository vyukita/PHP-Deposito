<?
require_once 'MySQL.class.php';

class Usuario
{
    private $mysql;

    public function __construct()
    {
        $this->mysql = new MySQL();
    }

	public function inserir_usuario($nome, $email, $senha)
	{
		$sql = "INSERT INTO farmasis.tb_usuario VALUES (NULL, '".$email."', '".$senha."', '".$nome."');";

		return $this->mysql->exec_query($sql);
	}

	public function verificar_email($email)
	{
		$sql = "SELECT * FROM farmasis.tb_usuario WHERE email = '".$email."';";

		return $this->mysql->select_query($sql);
	}

	public function verificar_email_senha($email, $senha)
	{
		$sql = "SELECT * FROM farmasis.tb_usuario WHERE email = '".$email."' AND senha = '".$senha."';";

		return $this->mysql->select_query($sql);
	}
	
	public function obter_dados($email, $senha)
	{
		$sql = "SELECT * FROM farmasis.tb_usuario WHERE email = '".$email."' AND senha = '".$senha."';";
		
		return $this->mysql->select_query($sql);
	}
}
?>
