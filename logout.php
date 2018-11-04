<?php include('logica_usuario.php');
logout();
setMsg('alert-success', 'Logout realizado.', 'Você está deslogado.');
header("Location: index.php");
die();
?>