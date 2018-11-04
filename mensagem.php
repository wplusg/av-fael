<?php
if(isset($_SESSION['alert'])) {
	$msg = $_SESSION['alert'];
	unset($_SESSION['alert']);
?>
	<div  class="mensagem alert <?=$msg[0];?>">
		<h5 class="alert-heading"><?=$msg[1];?></h4>
		<small><?=$msg[2];?></small>
	</div>
<?php
}
?>