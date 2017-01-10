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

    <legend>Lista de lugares</legend>
    <center>
    <form class="form-horizontal" method = "post" action="<?php echo base_url();?>lugarController/irCrearLugar">
	<button type ="submit" id="singlebutton" name="singlebutton" class="botones" >Crear nuevo lugar</button>

	</form>
	</center>

    <div class = "container" style="overflow-x:auto;">
    *Seleccione un lugar para ver la información.
	<P ALIGN=center>
	<table ALIGN = center class = "table table-hover">
	<tr>
		
		<th><FONT COLOR=#FFF8000>Nombre</FONT></th>
		<th><FONT COLOR=#FFF8000>Encargado Creación</FONT></th>
		<th><FONT COLOR=#FFF8000>Direccion</FONT></th>
		
	<tr>



<?php


	foreach ($lugares -> result_array() as $row) {

		echo '<tr>
				<td>
				<form action="'.base_url().'lugarController/irLugar_Nombre" method="post">
					<input type="hidden" name="evento" value="no" >
  					<button type="submit" name="lugar" value="'.$row['nombre_lugar'].'" class="btn-link">'.$row['nombre_lugar'].'</button>
				</form>
				</td>
				<td>'.$row['nombre_encargado'].'</td>
				<td>'.$row['direccion'].'</td>


				
			  <tr>';	
	}	

?>    


	</div>
	</table>
	</P>
	
</br>

</body>
