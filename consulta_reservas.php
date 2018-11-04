<?php include("cabecalho.php");
include("db_connect.php");
include("salaDB.php");
include("reservaDB.php");
verificaUsuario();

?>
<table class="table table-light table-padrao">
	<thead class="thead-light">
		<tr>
			<th>Matricula</th>
			<th>Usuário</th>
			<th>Sala</th>
			<th>Data</th>
			<th>Tempo reservado</th>
			<th>Situação</th>
			<th colspan="2">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$reservas = consultarReservas($con);
		if(count($reservas) <= 0) {
			?>
			<tr>
				<td colspan="8">
					Não existem reservas à serem exibidas.
				</td>
			</tr >
			<?php
		}
		foreach($reservas as $row) {
			$situacaoClass = $row['id_situacao_reserva'] == 1 ? 'text-primary' : ($row['id_situacao_reserva'] == 2 ? 'text-danger' : 'text-success');

			?>
			<tr>
				<th><?=$row['matricula']?></td>
				<td><?=$row['nome']?></td>
				<td><?=$row['desc_sala_reuniao']?></td>
				<td><?=$row['data_hora_inicio']?></td>
				<td><?=$row['tempo_reservado']?></td>
				<td class="<?=$situacaoClass;?>"><?=$row['desc_situacao_reserva']?></td>
				<td width="1">
					<form action="atualizar_reserva.php" method="post">
						<input type="hidden" name="idReservaSala" value="<?=$row['id_reserva_sala'];?>">
						<input type="hidden" name="idStatusReserva" value="3">
						<button style="width: 5rem" class="btn-sm btn-success btn-block">Aceitar</button>
					</form>
				</td>
				<td width="1">
					<form action="atualizar_reserva.php" method="post">
						<input type="hidden" name="idReservaSala" value="<?=$row['id_reserva_sala']?>">
						<input type="hidden" name="idStatusReserva" value="2">
						<button style="width: 5rem" class="btn-sm btn-danger btn-block">Recusar</button>
					</form>
				</td>
			</tr>
			<?php
		}
		?>
		<tr>
			<td colspan="8">
				<form action="form_reserva_sala.php">
					<button class="btn-sm btn-primary btn-block" >Nova reserva</button>
				</form>
			</td>
		</tr>
	</tbody>
</table>

<?php include("rodape.php");?>