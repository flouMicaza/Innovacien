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
	<div class ="container">

	<legend>Lista de participantes del evento</legend>

	<P ALIGN=center>

	<table ALIGN = center class = "table table-hover">
	<tr>		
		<th><FONT COLOR=#FFF8000>Nombre</FONT></th>
		<th><FONT COLOR=#FFF8000>Correo</FONT></th>
		<th><FONT COLOR=#FFF8000>Pago</FONT></th>
		<th><FONT COLOR=#FFF8000>Borrar</FONT></th>
		<th><FONT COLOR=#FFF8000>Editar Pago</FONT></th>			
	<tr>
	<?php
	$i = 0;
	foreach( $participantes -> result_array() as $row){
	echo '<tr>
			<td>'.$row['nombre'].' '.$row['apellido'].'</td>
			<td>'.$row['mail'].'</td>
			<td>'.'$'.$row['pago'].'</td>
			<td>
			<form action="'.base_url().'participantesEventos/borrarParticipante2" method="post">
				<input type="hidden" name="idEvento" value="'.$idEvento.'" >
				<input type="hidden" name="mail" value="'.$row['mail'].'">		  	
		  		<button type="submit" name="borrar" value="borrar" class="btn-link">Borrar</button>
			</form>
			</td>
				
			<td>
				<button id="spoiler'.$i.'" class ="btn-link">Editar</button>
			</td>
		  </tr>

		  <tr id = "mostrar'.$i.'" style ="display:none;">
		  		<form action ="'.base_url().'participantesEventos/actualizarMonto" method="post">
		  		<input type="hidden" name="idEvento" value="'.$idEvento.'" >
			<td></td>
			<th ALIGN = "right">Ingrese nuevo valor</th>
			<td>
				<input id="pago" name="pago" min="1000" type="number" placeholder="pago " class="form-control input-md" required="ingrese un pago">
			</td>
			<td>
				<button type ="submit" id="singlebutton" name="mail" value="'.$row['mail'].'" >Actualizar</button>
				</form>
			</td>
		  </tr>
		  <script>';
		  	echo"
			jQuery.noConflict();jQuery(document).ready(function(){jQuery('#spoiler".$i."').click(function(){jQuery('#mostrar".$i."').slideToggle(";echo '"slow");});});
		  </script>
		  
		  ';
	$i = $i+1;
	}
	?>
	</P>
	</div>
	</table>
	<br>
<fieldset>
<legend>Agregar Participante</legend>
<form class="form-horizontal" method = "post" action="<?php echo base_url();?>participantesEventos/agregarParticipante">
	<div class="form-group">
      <label class="col-md-4 control-label" for="autocomplete">Ingrese correo</label>  
      <div class="col-md-4">
      <input id="autocomplete" name="mail_participante" type="text" placeholder="Correo" class="form-control input-md" required="ingrese un correo">        
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="autocomplete">Ingrese el pago</label>  
      <div class="col-md-4">
      <input id="pago" name="pago" min="1000" type="number" placeholder="pago " class="form-control input-md" required="ingrese un pago">        
      </div>
    </div>
 	<div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="idEvento" value = <?php echo '"'.$idEvento.'"'?> class="botones">Agregar</button>
      </div>
    </div>
</form>
<form class="form-horizontal" method = "post" action="<?php echo base_url();?>participantesEventos/listaNoParticipantes">
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
        <button type ="submit" id="singlebutton" name="idEvento" value = <?php echo '"'.$idEvento.'"'?> class="botones">Ver Lista</button>
      </div>
    </div>
 </form>
 
</fieldset>
</body>