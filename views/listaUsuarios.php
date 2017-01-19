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

    <legend>Lista de usuarios</legend>

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
		
	<tr>



<?php
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
			  <tr>';	
	}	

?>    
	</div>
	</table>
	</P>
	
</br>
<br>

</body>
