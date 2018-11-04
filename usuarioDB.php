<?php 
function loadUsuarios($con) {
	$result = mysqli_query($con, "select id_usuario, nome from usuario");

	$usuarios = [];
	while($row = mysqli_fetch_array($result)) {
		array_push($usuarios, $row);
	}
	return $usuarios;
}
function getUsuarioLogin($con, $login, $senha) {
	$senhaMd5 = md5($senha);
	$result = mysqli_query($con, "select * from usuario where login = '{$login}' and senha = '{$senhaMd5}'");

	return mysqli_fetch_assoc($result);
}

?>