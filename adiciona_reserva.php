<?php include("reservaDB.php");
include("db_connect.php");
include("logica_usuario.php");
verificaUsuario();

$idSalaReuniao = $_POST["idSalaReuniao"];
$idUsuario = $_POST["idUsuario"];
$dataHoraInicio = $_POST["dataHoraInicio"];
$tempoReservado = $_POST["tempoReservado"];

if(adicionarReserva($con, $idSalaReuniao, $idUsuario, $dataHoraInicio, $tempoReservado)){
	setMsg('alert-success', 'Sucesso!', 'Sua solicitação foi salva e está como pendente.');
	header("Location: consulta_reservas.php");
} else {
	setMsg('alert-danger', 'Oops...', 'Já existe outra reserva nesta data.');
	header("Location: form_reserva_sala.php?id_sala_reuniao={$idSalaReuniao}&id_solicitante={$idUsuario}");
}
die();
?>