<?php include("db_connect.php");
include("cabecalho.php");
verificaUsuario();

$sala = array("desc_sala_reuniao" => "", "tamanho_sala_reuniao" => "", "localizacao" => "", "id_usuario_responsavel" => "");
?>
<h2 class="card-header">Cadastro Sala</h2>
<form action="adiciona_sala.php" method="post" class="form-padrao">
	<?php include('form_sala_base.php');?>
	<button class="btn-lg btn-primary form-group">Salvar Sala</button>
</form>
<?php include("rodape.php");?>
