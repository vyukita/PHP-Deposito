<?
require_once '../classes/Sessao.class.php';
$sessao = new Sessao();

require_once '../classes/Usuario.class.php';
$usuario = new Usuario();

if(isset($_POST['registrar']))
{
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
	$confirmar_senha = md5($_POST['confirmar_senha']);
			
	if(sizeof($usuario->verificar_email($email)) == 0)
	{
		if($senha == $confirmar_senha)
		{
			if($usuario->inserir_usuario($nome, $email, $senha))
			{
				$sessao->criar($email, $senha);
			}
			else
			{
				echo("<script>alert('Verifique suas informações e tente novamente.');</script>");
			}
		}
		else
		{
			echo("<script>alert('As duas senhas não coincidem.');</script>");
		}
	}
	else
	{
		echo("<script>alert('E-mail já existente.');</script>");
	}
}
else if(isset($_POST['entrar']))
{
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	if(sizeof($usuario->verificar_email($email)) == 1)
	{
		if(sizeof($usuario->verificar_email_senha($email, $senha)) == 1)
		{
			$sessao->criar($email, $senha);
		}
		else
		{
			echo("<script>alert('Senha incorreta.');</script>");
		}
	}
	else
	{
		echo("<script>alert('E-mail não encontrado.');</script>");
	}
}
?>
