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

<?php
	if($qry == null){
		echo '<legend>No se encontraron usuarios para agregar al proyecto: '.$nombre_proyecto.'</legend> ';
	}
	else{
		echo '
	

    <legend>Agregar participantes al proyecto: '.$nombre_proyecto.'</legend>

    <div class = "container" style="overflow-x:auto;">
    *Seleccione un correo para ver información del usuario.
	<P ALIGN=center>
	<table ALIGN = center class = "table table-hover">
	<tr>
		
		<th><FONT COLOR=#FFF8000>Nombre</FONT></th>
		<th><FONT COLOR=#FFF8000>Apellido</FONT></th>
		<th><FONT COLOR=#FFF8000>Tipo</FONT></th>
		<th><FONT COLOR=#FFF8000>Correo</FONT></th>
		<th><FONT COLOR=#FFF8000>Estado</FONT></th>
		<th><FONT COLOR=#FFF8000>Agregar a lista</FONT></th>
		
	<tr>';

	$i = 0;
	foreach ($qry -> result_array() as $row) {
		if ($row['activo'] == 1){
			$estado = 'Activo';
		}
		else{
			$estado = 'Desactivado';
		}

		echo '<tr>
				<td>'.$row['nombre'].'</td>
				<td>'.$row['apellido'].'</td>
				<td>'.$row['tipo'].'</td>
				<td>
				<form action="'.base_url().'adminController/irPerfil_Mail" method="get">
  					<button type="submit" name="mail" value="'.$row['mail'].'" class="btn-link">'.$row['mail'].'</button>
				</form>
				</td>
				<td>'.$estado.'</td>
				<td>
				<form action="'.base_url().'crearProyecto/agregarParticipante2" method="post">
				<input type="hidden" name="nombre_proyecto" value="'.$nombre_proyecto.'">
				<input type="hidden" name="tipo_usr" value="'.$tipo_usr.'">
				<button type="submit" name="mail_participante" value="'.$row['mail'].'" class="btn-link">Agregar</button>	
				</form>	
				</td>
			  </tr>';	
	}
	echo'	
    
	</div>
	</table>
	</P>';
}
?>

<form class="form-horizontal" method = "get" action="<?php echo base_url();?>crearProyecto/listaParticipantes">
 	<div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="nombre_proyecto" value = <?php echo '"'.$nombre_proyecto.'"'?> class="botones">Volver a Participantes</button>
      </div>
    </div>
</form>
</body>