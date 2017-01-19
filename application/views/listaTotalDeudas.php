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
    *Pulse un mail para obtener mas informacion 
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
				<td>'.$row['nombre'].' '.$row['apellido'].'</td>
				<td>'.$row['mail'].'</td>
				<td> $'.$row['deuda_total'].'</td>
				</tr>
			  ';	
	}	

?>    
	</div>
	</table>
	</P>
	
</br>
<br>

</body>
