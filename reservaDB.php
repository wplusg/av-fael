<?php
function consultarReservas($con) {
	$query = "select u.matricula, u.nome, s.id_sala_reuniao, s.desc_sala_reuniao, r.id_reserva_sala, r.data_hora_inicio, sr.desc_situacao_reserva, sr.id_situacao_reserva, sec_to_time(r.tempo_reservado*60) as tempo_reservado from reserva_sala r join usuario u on u.id_usuario = r.id_usuario join sala_reuniao s on s.id_sala_reuniao = r.id_sala_reuniao join situacao_reserva sr on sr.id_situacao_reserva = r.id_situacao";
	$result = mysqli_query($con, $query);
	
	$reservas = [];
	while($row = mysqli_fetch_array($result)) {
		array_push($reservas, $row);
	}
	return $reservas;
}
function atualizarStatusReserva($con, $idReservaSala, $idStatusReserva) {
	$query = "update reserva_sala set id_situacao = {$idStatusReserva} where id_reserva_sala = {$idReservaSala}";
	return mysqli_query($con, $query);
}
function adicionarReserva($con, $idSalaReuniao, $idUsuario, $dataHoraInicio, $tempoReservado) {
	if(!verificaReservaMarcada($con, $idSalaReuniao, $dataHoraInicio, $tempoReservado)) {
		$query = "insert into reserva_sala (id_sala_reuniao, id_usuario, data_hora_inicio, tempo_reservado) values ({$idSalaReuniao}, {$idUsuario}, '{$dataHoraInicio}', {$tempoReservado})";
		return mysqli_query($con, $query);
	} else {
		return false;
	}
}
function verificaReservaMarcada($con, $idSalaReuniao, $dataHoraInicio, $tempoReservado) {
		
	$dataHoraFim = new DateTime($dataHoraInicio);
	$dataHoraFim->modify("+" . $tempoReservado . " minutes");

	$query = "select 1 from reserva_sala where id_sala_reuniao = {$idSalaReuniao} and ((data_hora_inicio between '{$dataHoraInicio}' and '{$dataHoraFim->format('Y-m-d H:i:s')}' or cast(data_hora_inicio + sec_to_time(tempo_reservado*60) as datetime) between '{$dataHoraInicio}' and '{$dataHoraFim->format('Y-m-d H:i:s')}'))";

	$result = mysqli_query($con, $query);

	return count(mysqli_fetch_array($result)) > 0;
}
?>