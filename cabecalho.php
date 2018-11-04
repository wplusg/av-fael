<?php include('logica_usuario.php');
if(usuarioLogado()) {
  $menu = getUsuarioLogado();
} else {
  $menu = "Login";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Avaliação Fael</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/reservas.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="margin-bottom: 4rem;">
  <a class="navbar-brand" href="index.php"><?=$menu;?></a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="consulta_sala.php">Salas</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="consulta_reservas.php">Reservas</a>
      </li>
    </ul>
  </div>
</nav>
	
<div class="container text-center">
  <div class="card bg-light" style="display: inline-block;">
    <div class="card-body" >