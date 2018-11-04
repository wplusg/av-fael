<?php include("salaDB.php");
include("db_connect.php");
include("cabecalho.php");
verificaUsuario();

$idSala = $_GET['id_sala_reuniao'];

$sala = mysqli_fetch_assoc(consultarSala($con, $idSala));
?>
<h2 class="card-header">Editar Sala</h2>
<form action="salva_sala.php" method="post" class="form-padrao">
	<input type="hidden" name="id_sala_reuniao" value="<?=$idSala;?>">
	<?php include('form_sala_base.php');?>
	<button type="submit" class="btn-lg btn-primary btn-block form-group">Salvar alterações</button>
</form>

<?php include("rodape.php");?>
