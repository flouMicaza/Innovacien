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
		<th><FONT COLOR=#FFF8000>Agregar al evento</FONT></th>		
	<tr>
	<?php
	$i=0;
	foreach( $participantes -> result_array() as $row){
	echo '<tr>
			<td>'.$row['nombre'].' '.$row['apellido'].'</td>
			<td>'.$row['mail'].'</td>
			<td>
			<button id="spoiler'.$i.'" class ="btn-link">Agregar Participante</button>
			</td>
		  </tr>';?>

		  <?php
		  echo '
		  <tr id ="mostrar'.$i.'" style="display:none;">
		  	
		  	<form action ="'.base_url().'participantesEventos/agregarParticipanteLista" method ="post">
		  	<input type="hidden" name="idEvento" value="'.$idEvento.'" >
		  	<input type="hidden" name="tipo_usr" value="'.$tipo_usr.'" >
		  	<th>
		  	Ingrese el pago 
		  	</th>
		  	<td>
		  	<input id="pago" name="pago" min="1000" type="number" placeholder="pago " class="form-control input-md" required="ingrese un pago">  
		  	</td>
		  	<td><button type ="submit" id="singlebutton" name="mail" value="'.$row['mail'].'" >Agregar</button>
		  	</td>
		  	</form>
		  	
		  </tr>
		  <script>';
		  	echo"
			jQuery.noConflict();jQuery(document).ready(function(){jQuery('#spoiler".$i."').click(function(){jQuery('#mostrar".$i."').slideToggle(";echo '"slow");});});
		  </script>
		  
		  ';
		  $i=$i+1;
	}
	?>
	</P>
	</div>
	</table>
	<script>
		jQuery.noConflict();jQuery(document).ready(function(){jQuery('#spoiler').click(function(){jQuery('#mostrar').slideToggle("slow");});});
	</script>

	<form class="form-horizontal" method = "post" action="<?php echo base_url();?>participantesEventos/listaParticipantes">
 	<div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
      	<input type="hidden" name="evento" value=<?php echo'"'.$idEvento.'"'; ?> >
        <button type ="submit" id="singlebutton" class="botones">Volver a Participantes</button>
      </div>
    </div>
</form>
	
	
</body>