<?php include("salaDB.php");
include("db_connect.php");
include("logica_usuario.php");
verificaUsuario();

$descSala = $_POST["desc_sala"];
$tamanho = $_POST["tamanho"];
$idResponsavel = $_POST["id_responsavel"];
$localizacao = $_POST["localizacao"];


if(verificaPermissao()) {
	if(inserirSala($con, $descSala, $tamanho, $idResponsavel, $localizacao)) {
		setMsg('alert-success', 'Sucesso!', 'A sala foi criada com sucesso.');
	} else {
		setMsg('alert-danger', 'Oops...', 'Ocorreu um erro durante a criação da sala.');
		header("Location: form_nova_sala.php");
		die();
	}
} 
header("Location: consulta_sala.php");
die();

?>
