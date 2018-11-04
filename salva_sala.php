<?php include("salaDB.php");
include("db_connect.php");
include("logica_usuario.php");
verificaUsuario();

$idSala = $_POST["id_sala_reuniao"];
$descSala = $_POST["desc_sala"];
$tamanho = $_POST["tamanho"];
$idResponsavel = $_POST["id_responsavel"];
$localizacao = $_POST["localizacao"];


if(verificaPermissao()) {
	if(salvarSala($con, $idSala, $descSala, $tamanho, $idResponsavel, $localizacao)) {
		setMsg('alert-success', 'Sucesso!', 'As alterações foram salvas.');
	} else {
		setMsg('alert-danger', 'Oops...', 'As alterações não foram salvas.');
		header("Location: form_editar_sala.php");
		die();
	}
}
header("Location: consulta_sala.php");
die();
?>