<?php
function inserirSala($con, $desc_sala, $tamanho, $id_responsavel, $localizacao) {
	$desc_sala = mysqli_real_escape_string($con, $desc_sala);

	$query = "insert into sala_reuniao (desc_sala_reuniao, tamanho_sala_reuniao, id_usuario_responsavel, localizacao) values ('{$desc_sala}', {$tamanho}, {$id_responsavel}, '{$localizacao}')";
	return mysqli_query($con, $query);
}

function consultarSalas($con) {
	$query ="select id_sala_reuniao, desc_sala_reuniao, tamanho_sala_reuniao, localizacao, nome, matricula from sala_reuniao s inner join usuario u on u.id_usuario = s.id_usuario_responsavel order by id_sala_reuniao	";
	$result = mysqli_query($con, $query);

	$salas = [];
	while($row = mysqli_fetch_array($result)) {
		
		array_push($salas, $row);

	}
	return $salas;
}

function removerSala($con, $id_sala_reuniao) {
	$query = "delete from sala_reuniao where id_sala_reuniao = {$id_sala_reuniao}";
	return mysqli_query($con, $query);
}

function consultarSala($con, $id_sala_reuniao) {
	$query = "select * from sala_reuniao where id_sala_reuniao = {$id_sala_reuniao}";
	return mysqli_query($con, $query);
}

function salvarSala($con, $id_sala_reuniao, $desc_sala, $tamanho, $id_responsavel, $localizacao) {
	$desc_sala = mysqli_real_escape_string($con, $desc_sala);
	$query = "update sala_reuniao set desc_sala_reuniao = '{$desc_sala}', tamanho_sala_reuniao = {$tamanho}, id_usuario_responsavel = {$id_responsavel}, localizacao = '{$localizacao}' where id_sala_reuniao = {$id_sala_reuniao}";
	return mysqli_query($con, $query);
}

?>