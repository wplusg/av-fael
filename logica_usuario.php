<?php
session_start();
function verificaUsuario() {
	if(!usuarioLogado()) {
		setMsg('alert-warning', 'Acesso negado...', 'Realize login para acessar');
		header("Location: index.php");
		die();
	}
}
function setMsg($alert, $header, $text) {
	$_SESSION['alert'] = array($alert, $header, $text);
}
function usuarioLogado() {
	if(isset($_SESSION['usuario_logado'])) {
		return true;
	} 
	return false;
}
function getUsuarioLogado() {
	return $_SESSION['usuario_logado'];
}
function getMatricula() {
	return $_SESSION['matricula'];
}
function getTipoUsuario() {
	return $_SESSION['tipo_usuario'];
}
function login($usuario, $tempo) {
	$_SESSION['usuario_logado'] = $usuario['nome'];
	$_SESSION['matricula'] = $usuario['matricula'];
	$_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
}
function logout() {
	session_destroy();
	session_start();
}
function verificaPermissao() {
	if(getTipoUsuario() != 'ADM') {
		setMsg('alert-danger', 'Permissão negada.', 'Você não tem acesso à esta funcionalidade.');
		return false;
	} 
	return true;
}
