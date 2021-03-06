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
        font-size:13px;
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


	    <legend>Fotos de: <?php echo $nombre_evento?></legend>

	    <div class = "container" style="overflow-x:auto;">
	    *Seleccione un correo para ver información del usuario.
	    <br>
	    *Seleccione una foto para ver su tamaño completo.
	    <br>
		<P ALIGN=center>
		<table ALIGN = center class = "table table-hover">
		<tr>
			
			<th><FONT COLOR=#FFF8000>Foto</FONT></th>
			<th><FONT COLOR=#FFF8000>Fecha de creacion</FONT></th>
			<th><FONT COLOR=#FFF8000>Creador</FONT></th>
			<th colspan="2"><FONT COLOR=#FFF8000>Tamaño</FONT></th>	
		<tr>



	<?php
		if($qry != null){
		foreach ($qry -> result_array() as $row) {
				$ruta = base_url().$row['ubicacion'];
				$imagen = $_SERVER['DOCUMENT_ROOT'].$row['ubicacion'];
				$tamaño = filesize($imagen);
				$tamañoKB = round($tamaño /(1024),2);
			echo '<tr>
					
					<td>
					<form method="get" action="'.$ruta.'" target="_blank">
	              	<input name="boton1" type="image" src="'.$ruta.'" WIDTH = 50 HEIGHT = 50 target="_blank">
	   	          	</form>		
					</td>
					
					<td>'.$row['fecha_subida'].'</td>
					
					<td>
						<form action="'.base_url().'adminController/irPerfil_Mail" method="get">
	  					<button type="submit" name="mail" value="'.$row['mail_autor'].'" class="btn-link">'.$row['mail_autor'].'</button>
					</form>
					</td>';
					if($tipo == 'adiministrador' || $mail = $row['mail_autor']){
						echo '
							<td>
							'.$tamañoKB.' Kb
							</td>

							<td>
								<form action="'.base_url().'eventosController/borrarFoto" method="post">
								<input type = "hidden" name="ubicacion" value = "'.$row['ubicacion'].'">
								<input type = "hidden" name="nombre_evento" value = "'.$nombre_evento.'">
	    						<input type = "hidden" name="nombre_proyecto" value = "'.$nombre_proyecto.'">
	    						<input type = "hidden" name="idEvento" value = "'.$idEvento.'">
	  							<button type="submit" name="mail" value="'.$row['ubicacion'].'" class="btn-link">Borrar</button>
								</form>
							</td>';
							
					}
					else{
						echo '<td colspan="2">
							'.$tamañoKB.' Kb
							</td>';
					}

		}
	}	

	?>    
		</div>
		</table>
		</P>
		
	<br>
	<?php 
		if ($mensaje != null){
			echo '<h2> <FONT COLOR=#FFF8000>'.$mensaje.'</FONT><h2>';
		}
	?>

	</P>
	</div>


<?php 

	echo'
	<form class="form-horizontal" method = "post" action="'.base_url().'eventosController/subirFoto" enctype = "multipart/form-data">
	    <fieldset>

	    <!-- Form Name -->
	    <legend>Desea Subir alguna foto del evento?</legend>';



	echo'
	<form class="form-horizontal" method = "post" action="'.base_url().'eventosController/subirFoto" enctype = "multipart/form-data">
	    <fieldset>

	    <!-- Form Name -->
	    <legend>Subir Archivo</legend>';



echo 
    '<div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Seleccione una foto <FONT COLOR=#FFF8000>(Maximo 5 Mb)</FONT>: </label>      
      <div class="col-md-4">
      	<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
        <input name="imagen" type="file" class = "submit">
      </div>
    </div>

    <input type = "hidden" name="nombre_evento" value = "'.$nombre_evento.'">
    <input type = "hidden" name="nombre_proyecto" value = "'.$nombre_proyecto.'">
    <input type = "hidden" name="idEvento" value = "'.$idEvento.'">
    
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="singlebutton" class="botones1">Subir Archivo</button>
      </div>
    </div>

</fieldset>
</form>';
 

	

	echo ' 
		<form class="form-horizontal" method = "get" action="'.base_url().'eventosController/irInfoEvento" enctype = "multipart/form-data">

		<!-- Button -->
    	<div class="form-group">
      		<label class="col-md-4 control-label" for="singlebutton"></label>
      		<div class="col-md-4">
        		<button type ="submit" id="singlebutton" name="evento" value="'.$idEvento.'" class="botones">Volver al Evento</button>
      		</div>
   		</div>
   		</form>
	';




?>
 


<br>


</body>
