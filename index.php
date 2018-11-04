<?php include("cabecalho.php");
?>
<div class="form-padrao">
<?php
if(!usuarioLogado()) {
	?>
	<h2 class="card-header">Login</h2>
	<form action="login.php" method="post">
		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="login" class="form-control" required="true">
		</div>
		
		<div class="form-group">
			<label>Senha:</label>
			<div class="input-group">
				<input type="password" name="senha" class="form-control" required="true">
			</div>
		</div>
		<button type="submit" class="btn-lg btn-primary btn-block form-group">Enviar</button>
	</form>
	<?php
} else {
	?>
	<h2 class="card-header">Bem vindo!</h2>
	<table class="table" style="margin-bottom: 8rem">
		<thead>
			<tr>
				<th>Matricula</th>
				<th>Nome</th>
				<th>Tipo</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?=getMatricula();?></td>
				<td><?=getUsuarioLogado();?></td>
				<td><?=getTipoUsuario();?></td>
			</tr>
		</tbody>
	<table>
	<form action="logout.php">
		<button class="btn-lg btn-danger btn-block form-group">Logout</button>
	</form>
	<?php 
}
?>
</div>
<?php
include("rodape.php");?>