<?
// Sessão
require_once 'classes/Sessao.class.php';
$objSessao = new Sessao();

$objSessao->registrar_acesso();

$objSessao->verificar();
?>
<!DOCTYPE html>
<html>
<head>
  <? include 'includes/head.php'; ?>
  <script src="js/configuracoes.js"></script>
</head>
<body>
  <div class="miolo-cinza">
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="panel panel-branco">
            <div class="panel-body">
              <div id="configuracoes"></div>
            </div>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
  <div id="ajax"></div>
</body>
</html>
