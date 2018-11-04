<?php include('usuarioDB.php');?>
<div class="form-group">
	<label>Descrição:</label>
	<input type="text" name="desc_sala" class="form-control" value="<?=$sala['desc_sala_reuniao'];?>" required="true">
</div>

<div class="form-group">
	<label>Tamanho:</label>
	<div class="input-group">
		<input type="number" name="tamanho" class="form-control" value="<?=$sala['tamanho_sala_reuniao'];?>" required="true">
		<div class="input-group-append">
		    <span class="input-group-text">m²</span>
		</div>
	</div>
</div>

<div class="form-group">
	<label>Localização:</label>
	<div class="input-group">
		<input type="text" name="localizacao" class="form-control" value="<?=$sala['localizacao'];?>">
	</div>
</div>

<div class="form-group">
	<label>Responsável:</label>
	<select name="id_responsavel" class="form-control" required="true">
		<?php 
		foreach(loadUsuarios($con) as $row) {
			?>
			<option value="<?=$row['id_usuario'];?>" <?=$sala['id_usuario_responsavel'] == $row['id_usuario'] ? "selected" : "";?> ><?=$row['nome']?></option>
			<?php
		}
		?>
	</select>
</div>