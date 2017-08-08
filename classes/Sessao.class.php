<?
session_start();
require_once 'Usuario.class.php';

class Sessao
{
    private $usuario;

    public function registrar_acesso()
    {
      if(isset($_SESSION['email']))
      {
        $email = $_SESSION['email'];
      }
      else
      {
        $email = null;
      }

      $ip = $_SERVER['REMOTE_ADDR'];
      $navegador = $_SERVER['HTTP_USER_AGENT'];
      $url = $_SERVER['REQUEST_URI'];

      $this->mysql = new MySQL();
      

      $sql = "INSERT INTO atmoo.registro VALUES (NULL, '".$email."', '".$ip."', '".$navegador."', '".$url."', NOW());";

      return $this->mysql->exec_query($sql);
    }

	public function criar($email, $senha)
	{
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;

		echo("<script>window.location = 'farmacias.php';</script>");
	}

	public function destruir()
	{
		session_destroy();

		header('Location: index.php');
	}

	public function verificar()
	{
      if(isset($_SESSION['email']) && isset($_SESSION['senha'])){

			     $email = $_SESSION['email'];
			     $senha = $_SESSION['senha'];

           $this->usuario = new Usuario();
           $verificar = $this->usuario->verificar_email_senha($email, $senha);
			if(sizeof($verificar) != 1){
				$this->destruir();
			}
        }
      else{
        $this->destruir();
		  }
	}

	public function redirecionar()
	{

        if(isset($_SESSION['email']) && isset($_SESSION['senha']))
        {
			       $email = $_SESSION['email'];
			       $senha = $_SESSION['senha'];

            header('Location: farmacias.php');
        }
        else
        {
            session_destroy();
        }
	}
}
?>
