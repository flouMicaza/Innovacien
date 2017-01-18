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
	<!--
	.botones {
	    font-size:15px;
        font-family:sans-serif;
        font-weight:bold;
        color:white;
        background:#FF8000;
        border:5px;
        width:150px;
        height:50px;
        border-radius: 5px;
	}
	-->
</style>
</head>

<body>
	
    <legend>Lista de futuros eventos</legend>

    <div class = "container" style="overflow-x:auto;">
    *Seleccione un evento para ver la información.
	<P ALIGN=center>
	<div style="width:245px; float:right;">
				<form class="form-horizontal" method = "post" action="<?php echo base_url();?>eventosController/eventosAnteriores">
				<button type ="submit" id="singlebutton" value="'.$nombre_p.'" class="botones" name="nombre_p" >Eventos Anteriores </button>
				</form>	
	</div>	
	<table ALIGN = center class = "table table-hover">
	<tr>		
		<th><FONT COLOR=#FFF8000>Nombre</FONT></th>		




<?php

	$i = 0;
	foreach ($eventos->result_array() as $row) {
		
		echo '<tr>
				<td>
				<form action="'.base_url().'eventosController/irInfoEvento" method="post">
  					<button type="submit" name="evento" value="'.$row['idevento'].'" class="btn-link">'.$row['nombre'].'</button>
				</form>


				</td>				
			  <tr>';	
	}	

?>    
	</div>
	</table>
	</P>
	


</body>
