<?php include("reservaDB.php");
include("db_connect.php");
include("logica_usuario.php");
verificaUsuario();

$idReservaSala = $_POST["idReservaSala"];
$idStatusReserva = $_POST["idStatusReserva"];


if(verificaPermissao())	{
	atualizarStatusReserva($con, $idReservaSala, $idStatusReserva);
}
header("Location: consulta_reservas.php");
die();
?>