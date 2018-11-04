<?php include("cabecalho.php");
include("salaDB.php");
include("db_connect.php");
verificaUsuario();
?>
<table class="table table-light table-padrao">
	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Descrição</th>
			<th>Tamanho</th>
			<th>Localização</th>
			<th>Responsável</th>
			<th colspan="3">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$salas = consultarSalas($con);
		if(count($salas) <= 0) {
			?>
			<tr>
				<td colspan="8">
					Não existem salas à serem exibidas.
				</td>
			</tr >
			<?php
		}
		foreach($salas as $row) {
			?>
			<tr>
				<th><?=$row['id_sala_reuniao']?></td>
				<td><?=$row['desc_sala_reuniao']?></td>
				<td><?=$row['tamanho_sala_reuniao']?> m²</td>
				<td><?=$row['localizacao']?></td>
				<td><?=$row['nome']?></td>
				<td width="1">
					<form action="form_reserva_sala.php">
						<input type="hidden" name="id_sala_reuniao" value="<?=$row['id_sala_reuniao'];?>">
						<button style="width: 5rem" class="btn-sm btn-success btn-block">Reservar</button>
					</form>
				</td>
				<td width="1">
					<form action="form_editar_sala.php">
						<input type="hidden" name="id_sala_reuniao" value="<?=$row['id_sala_reuniao'];?>">
						<button style="width: 5rem" class="btn-sm btn-warning btn-block">Editar</button>
					</form>
				</td>
				<td width="1">
					<form action="remove_sala.php" method="post">
						<input type="hidden" name="id_sala_reuniao" value="<?=$row['id_sala_reuniao']?>">
						<button style="width: 5rem" class="btn-sm btn-danger btn-block">Remover</button>
					</form>
				</td>
			</tr>
			<?php
		}
		?>
		<tr>
			<td colspan="8">
				<form action="form_nova_sala.php">
					<button class="btn-sm btn-primary btn-block" >Nova Sala</button>
				</form>
			</td>
		</tr>
	</tbody>
</table>
<?php include("rodape.php");?>