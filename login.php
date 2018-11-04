<?php include("db_connect.php");
include("usuarioDB.php");
include("logica_usuario.php");

$usuario = getUsuarioLogin($con, $_POST['login'], $_POST['senha']);

if($usuario == null) {
	setMsg('alert-danger', 'Acesso negado...', 'Usuário ou senha incorretos.');
	header("Location: index.php");
} else {
	login($usuario, 300);
	setMsg('alert-success', 'Login realizado!', 'Você está logado como ' . getUsuarioLogado());
	header("Location: index.php");
	die();
}