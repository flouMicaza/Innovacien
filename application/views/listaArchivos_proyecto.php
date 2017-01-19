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

    <legend>Archivos de: <?php echo $nombre_proyecto?></legend>

    <div class = "container" style="overflow-x:auto;">
    *Seleccione un correo para ver información del usuario.
    <br>
    *Seleccione un archivo para ver su información.
    <br>
	<P ALIGN=center>
	<table ALIGN = center class = "table table-hover">
	<tr>
		
		<th><FONT COLOR=#FFF8000>Nombre Archivo</FONT></th>
		<th><FONT COLOR=#FFF8000>Fecha de creacion</FONT></th>
		<th><FONT COLOR=#FFF8000>Creador</FONT></th>
		<th><FONT COLOR=#FFF8000>Descargar</FONT></th>
	<?php
	if($tipo == 'administrador'){
		echo'
		<th><FONT COLOR=#FFF8000>Borrar</FONT></th>
		';
	}
	?>

	


	<tr>



<?php
	$i = 0;
	foreach ($qry -> result_array() as $row) {
			$spoiler = 'spoiler'.$i;
			$mostrar = 'mostrar'.$i;
			$tamaño = filesize($_SERVER['DOCUMENT_ROOT'].$row['ubicacion_archivo']);
			$tamañoKB = round($tamaño /(1024),2);
		echo '<tr>
				
				<td>
				<input type="button" id="'.$spoiler.'" value="'.$row['nombre_archivo'].'" class="btn-link"/>			
				</td>
				<td>'.$row['fecha_creacion'].'</td>
				<td>
					<form action="'.base_url().'adminController/irPerfil_Mail" method="get">
  					<button type="submit" name="mail" value="'.$row['creador'].'" class="btn-link">'.$row['creador'].'</button>
				</form>
				<td>
					<form action="'.base_url().'crearProyecto/descargar" method="post" target="_blank">
					<input type="hidden" name="nombre_archivo" value="'.$row['nombre_archivo'].'">
  					<button type="submit" name="link_archivo" value="'.$row['ubicacion_archivo'].'" class="btn-link" >Descargar</button>
				</form>
				</td>';
				if($tipo == 'administrador'){
					echo '
				<td>
					<form action="'.base_url().'crearProyecto/borrarArchivo" method="post" >
					<input type="hidden" name="nombre_proyecto" value="'.$nombre_proyecto.'">
					<input type="hidden" name="nombre_archivo" value="'.$row['nombre_archivo'].'">
  					<button type="submit" name="link_archivo" value="'.$row['ubicacion_archivo'].'" class="btn-link" >Borrar</button>
  					</form>
				</td>';
				}
				echo'
			</tr>
			<tr>
				<th>
				<div class="'.$mostrar.'" style="display: none;">
					<FONT COLOR=#FFF8000>Tamaño:</FONT> 
				</div>
				</th>
				<td>
					<div class="'.$mostrar.'" style="display: none;">
					'.$tamañoKB.' Kb
				</div>
				</td>
				<td colspan="4">
				<div class="'.$mostrar.'" style="display: none;">
					<STRONG><FONT COLOR=#FFF8000>Descripcion: </FONT></STRONG>'.$row['descripcion'].'
				</div>';

				echo " 
				<script>jQuery.noConflict();jQuery(document).ready(function(){jQuery('#".$spoiler."').click(function(){jQuery('.".$mostrar."').slideToggle("; echo '"slow");});});</script>
				';
				echo '
				</td>				
			</tr>';
				
		$i = $i+1;

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
	if($tipo == 'administrador'){
		echo'
<form class="form-horizontal" method = "post" action="'.base_url().'crearProyecto/subirArchivo" enctype = "multipart/form-data">
    <fieldset>

    <!-- Form Name -->
    <legend>Subir Archivo</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre del Archivo</label>      
      <div class="col-md-4">
      <input id="textinput" name="nombre_archivo" type="text" placeholder="nombre archivo" class="form-control input-md" required="">        
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Descripcion del archivo</label>      
      <div class="col-md-4">
      <textarea id="textinput" name="descripcion_archivo" type="text" placeholder="descripcion del archivo" class="form-control" maxlength="1000" rows = "4"></textarea>
       
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Seleccione Archivo <FONT COLOR=#FFF8000>(Maximo 5 Mb):</FONT></label>      
      <div class="col-md-4">
      	<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
        <input name="archivo" type="file" class = "submit">
      </div>
    </div>

    <input type = "hidden" name="nombre_proyecto" value = "'.$nombre_proyecto.'">
    
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="singlebutton" class="botones">Subir Archivo</button>
      </div>
    </div>

</fieldset>
</form>';
 


	}

?>
 


<br>


</body>
