<?php include("db_connect.php");
include("usuarioDB.php");
include("salaDB.php");
include("reservaDB.php");
include("cabecalho.php");
verificaUsuario();

$idSalaReuniao = isset($_GET['id_sala_reuniao']) ? $_GET['id_sala_reuniao'] : '';
$idUsuario = isset( $_GET['id_solicitante']) ?  $_GET['id_solicitante'] : '';

?>
<h2 class="card-header">Solicitação de reserva</h2>
<form action="adiciona_reserva.php" method="post" class="form-padrao">
	
	<div class="form-group">
		<label>Sala:</label>
		<select name="idSalaReuniao" class="form-control" required="true">
			<?php 
			foreach(consultarSalas($con) as $row) {
				?>
				<option value="<?=$row['id_sala_reuniao'];?>" <?=($idSalaReuniao == $row['id_sala_reuniao']) ? "selected" : "";?>><?=$row['desc_sala_reuniao']?></option>
				<?php
			}
			?>
		</select>
	</div>

	<div class="form-group">
		<label>Solicitante:</label>
		<select name="idUsuario" class="form-control">
			<?php 
			foreach(loadUsuarios($con) as $row) {
				?>
				<option value="<?=$row['id_usuario'];?>" <?=($idUsuario == $row['id_usuario']) ? "selected" : "";?>><?=$row['nome']?></option>
				<?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Data:</label>
		<input type="datetime-local" name="dataHoraInicio" class="form-control" required="true">
	</div>

	<div class="form-group">
		<label>Tempo Reservado:</label>
		<div class="input-group">
			<input type="number" min="10" step="1" name="tempoReservado" class="form-control" required="true">
			<div class="input-group-append">
			    <span class="input-group-text">min.</span>
			</div>
		</div>
	</div>		
	<button type="submit" class="btn-lg btn-primary form-group">Salvar Solicitação</button>
</form>
<?php include("rodape.php");?>