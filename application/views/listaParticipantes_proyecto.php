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
		echo '<legend>No existen participantes para el proyecto: '.$nombre_proyecto.'</legend> ';
	}
	else{
		echo '
	

    <legend>Lista de participantes del proyecto: '.$nombre_proyecto.'</legend>

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
		<th><FONT COLOR=#FFF8000>Borrar de lista</FONT></th>
		
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
				<form action="'.base_url().'crearProyecto/quitarParticipante" method="post">
				<input type="hidden" name="nombre_proyecto" value="'.$nombre_proyecto.'">
				<button type="submit" name="mail_participante" value="'.$row['mail'].'" class="btn-link">Borrar</button>	
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
<br>
<fieldset>
<legend>Agregar Participante</legend>
<form class="form-horizontal" method = "post" action="<?php echo base_url();?>crearProyecto/agregarParticipante">
<div class="form-group">
      <label class="col-md-4 control-label" for="autocomplete">Por correo</label>  
      <div class="col-md-4">
      <input id="autocomplete" name="mail_participante" type="text" placeholder="Correo" class="form-control input-md" required="ingrese un correo">        
      </div>
    </div>
 	<div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="nombre_proyecto" value = <?php echo '"'.$nombre_proyecto.'"'?> class="botones">Agregar</button>
      </div>
    </div>
</form>
<form class="form-horizontal" method = "post" action="<?php echo base_url();?>crearProyecto/vistaNoParticipantes">
	<div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Agregar por lista de usuarios</label>
      <div class="col-md-4">
        <select id="selectbasic" name="tipo_usr" class="form-control">
          <option value="todos">Todos los usuarios</option>
          <option value="administrador">Administradores</option>
          <option value="emprendedor">Emprendedores</option>
          <option value="monitor">Monitores</option>
          <option value="profesor">Profesores</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="nombre_proyecto" value = <?php echo '"'.$nombre_proyecto.'"'?> class="botones">Ver Lista</button>
      </div>
    </div>
 </form>
 
</fieldset>
</body>
