<!DOCTYPE html>
<html>

<head>
	<?php
		$data['tipo'] = $tipo;
		$this->load->view('barra_superior',$data);
	?>
</head>

<body>
	<h3>Seguro que desea eliminar al usuario:  
	<strong><?php echo $mail_usr ?>
	</h3></strong>
	<br>
	<?php

  	
  	echo '
  		<div class="btn-group">
	  	<form name="form2" action='.base_url().'adminController/borrarUsuario2  method="post">
	  		 <input type="hidden" name="mail_usr" value="'.$mail_usr.'">
	    	<input type="submit" value="Borrar Usuario" class="boton">
	  	</form> 
	  	</div>';
  ?>
	


</body>