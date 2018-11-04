<?php include("salaDB.php");
include("db_connect.php");
include("logica_usuario.php");
verificaUsuario();

$idSalaReuniao = $_POST["id_sala_reuniao"];

if(verificaPermissao()) {
	removerSala($con, $idSalaReuniao);
	setMsg('alert-success', 'Sucesso!', 'A sala foi removida com sucesso.');
} 
header("Location: consulta_sala.php");

die();
?>
