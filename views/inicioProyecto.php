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

    <legend>Lista de proyectos</legend>
    <center>
    <form class="form-horizontal" method = "post" action="<?php echo base_url();?>crearProyecto/crearProyectoVista">
	<button type ="submit" id="singlebutton" name="singlebutton" class="botones" >Crear nuevo proyecto</button>

	</form>
	</center>

    <div class = "container" style="overflow-x:auto;">
    *Seleccione un proyecto para ver la información.
	<P ALIGN=center>
	<table ALIGN = center class = "table table-hover">
	<tr>
		
		<th><FONT COLOR=#FFF8000>Nombre</FONT></th>
		<th><FONT COLOR=#FFF8000>Fecha Creación</FONT></th>
		<th><FONT COLOR=#FFF8000>Creador</FONT></th>
		<th><FONT COLOR=#FFF8000>Tipo</FONT></th>
		
	<tr>



<?php

	$i = 0;
	foreach ($qry -> result_array() as $row) {

		echo '<tr>
				<td>
				<form action="'.base_url().'proyectosController/irProyecto" method="get">
  					<button type="submit" name="nombre" value="'.$row['nombre'].'" class="btn-link">'.$row['nombre'].'</button>
				</form>
				</td>
				<td>'.$row['fecha_creacion'].'</td>
				<td>'.$row['creador'].'</td>
				<td>'.$row['tipo'].'</td>

				
			  <tr>';	
	}	

?>    
	</div>
	</table>
	</P>
	
</br>
<br>
<center>
    <form class="form-horizontal" method = "get" action="<?php echo base_url();?>lugarController/verLugares">
	<button type ="submit" id="singlebutton" name="singlebutton" class="botones" >Ir a Lugares</button>

	</form>
	</center>

</body>
