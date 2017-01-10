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
  .botones{
        font-size:15px;
        font-family:sans-serif;
        font-weight:bold;
        color:white;
        background:#FF8000;
        border:5px;
        width:200px;
        height:30px;
        border-radius: 5px;
       }
</style>
</head>

<body>

    <legend>Lista de eventos proyecto <? echo $nombre_p?></legend>
    <center>
        <form class="form-horizontal" method = "post" action="<?php echo base_url();?>eventosController/irCrearEvento">
		<button type ="submit" id="singlebutton" name="proyecto" value = <?php echo '"'.$nombre_p.'"' ?> class="botones" >Crear nuevo evento</button>

		</form>
	</center>
    <div class = "container" style="overflow-x:auto;">
    *Seleccione un evento para ver su información.
	<P ALIGN=center>
	<table ALIGN = center class = "table table-hover">
	<tr>
		
		<th><FONT COLOR=#FFF8000>Nombre </FONT></th>
		<th><FONT COLOR=#FFF8000>Fecha</FONT></th>
		<th><FONT COLOR=#FFF8000>Hora</FONT></th>
		<th><FONT COLOR=#FFF8000>Duración</FONT></th>
		<th><FONT COLOR=#FFF8000>Lugar</FONT></th>
		
	</tr>

<?php

	$i = 0;
	foreach ($qry -> result_array() as $row) {
		echo '<tr>
				<td>
				<form action="'.base_url().'eventosController/irInfoEvento" method="post">
  					<button type="submit" name="evento" value="'.$row['idevento'].'" class="btn-link">'.$row['nombre'].'</button>
				</form>
				</td>
				<td>'.$row['fecha'].'</td>
				<td>'.$row['hora'].'</td>
				<td>'.$row['duracion'].'</td>
				<td>'.$row['nombre_lugar'].'</td>
			  <tr>';	
	}	

?>    
	</div>
	</table>
	</P>
	
</br>
<br>

</body>
