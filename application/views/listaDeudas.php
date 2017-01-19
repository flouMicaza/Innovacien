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

    <legend>Lista deudas de <?php echo $deuda_total['nombre'].' '.$deuda_total['apellido']; ?></legend>

    <div class = "container" style="overflow-x:auto;">
	<h2>Deuda total es de $<?php echo $deuda_total['deuda_total'];?></h2>
	<P ALIGN=center>
	<table ALIGN = center class = "table table-hover">
	<tr>
		
		<th><FONT COLOR=#FFF8000>Fecha</FONT></th>
		<th><FONT COLOR=#FFF8000>Informacion</FONT></th>
		<th><FONT COLOR=#FFF8000>Monto</FONT></th>

		
		
	<tr>



<?php
	$i = 0;
	foreach ($lista -> result_array() as $row) {
		if ($row['monto']<0){
			$montoAux = $row['monto'] * -1;
			$monto = '- $'.$montoAux;
		}
		else{
			$monto = '  $'.$row['monto'];
		}
		echo '<tr>
				<td>'.$row['fecha'].'</td>
				<td>'.$row['comentarios'].'</td>
				<td>'.$monto.'</td>
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
