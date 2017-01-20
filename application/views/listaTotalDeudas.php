<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="<?php echo base_url();?>css/barra_superior.css" rel="stylesheet">
	<?php
		$data['tipo'] = $tipo;
		$this->load->view('barra_superior',$data);
	?>
	<style type="text/css">
</style>
</head>

<body>

    <legend>Lista deudas</legend>

    <div class = "container" style="overflow-x:auto;">
    *Pulse un el nombre para obtener informacion del usuario
    <br> 
    *y el mail para obtener informacion de la deuda
	<P ALIGN=center>
	<table ALIGN = center class = "table table-hover">
	<tr>
		
		<th><FONT COLOR=#FFF8000>Nombre</FONT></th>
		<th><FONT COLOR=#FFF8000>Mail</FONT></th>
		<th><FONT COLOR=#FFF8000>Monto</FONT></th>
		<th><FONT COLOR=#FFF8000>Pagar</FONT></th>		
		
	<tr>



<?php
	$i = 0;
	foreach ($lista -> result_array() as $row) {
		
		echo '<tr>
				<td>
				<form action ="'.base_url().'adminController/irPerfil_mail" method = "GET" target ="_blank">
					<button type="submit" name ="mail" value ="'.$row['mail'].'" class ="btn-link">'.$row['nombre'].' '.$row['apellido'].'</button>
				</form>
				</td>
				<td>
				<form action ="'.base_url().'adminController/pagosPorUsuario" method ="GET" target ="_blank">
					<button type="submit" name = "mail_usr" value="'.$row['mail'].'" class="btn-link">'.$row['mail'].'</button>
				</form>
				</td>
				<td> $'.$row['deuda_total'].'</td>
				<td><button id="spoiler'.$i.'" class ="btn-link">Pagar</button>
				</td>
				</tr>
				
				<tr id ="mostrar'.$i.'" style ="display:none;">
				<th>Ingrese comentarios y Monto</th>

				<form action ="'.base_url().'adminController/realizarPago" method ="POST">
				<td>
					<textarea id="textinput" name="comentarios" type="text" placeholder="comentarios del pago" maxlength="1000" rows="2"></textarea>
				</td>

				<td>
					<input id="textinput" name ="monto" placeholder="monto" type="number">
				</td>

				<td>
					<input type="hidden" name ="mail_usr" value ="'.$row['mail'].'">
					<button type ="submit" class="btn-link">Confirmar Pago</button>
					</form>
				</td>
				
				</tr>				

				<script>';
		  		echo"
				jQuery.noConflict();jQuery(document).ready(function(){jQuery('#spoiler".$i."').click(function(){jQuery('#mostrar".$i."').slideToggle(";echo '"slow");});});
		 		 </script>
		  
		  	';
	$i = $i + 1;
	}	

?>    
	</div>
	</table>
	</P>
	
</br>
<br>

</body>
