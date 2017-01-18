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
        width:50px;
        height:30px;
        border-radius: 5px;
       }

   .botones1{
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

<?php  
	if($respondido=="no"){
		echo '
			<div class = "container">
			<P ALIGN=center>

			 <form method="post" action="'.base_url().'eventosController/actualizarAsistencia">

				<FONT COLOR=#FFF8000 FACE="sans-serif">Asistió al evento?</FONT>
				<input type = "hidden" name="idevento" value ="'.$idevento.'" >
				<input type = "hidden" name="nombre" value = "'.$nombre.'">
				<input name="asistencia" type="radio" value="si"/>Sí

				<input name="asistencia" type="radio" value="no" />No
				<button type="submit" class="botones"> Ir</button>
			</form>

		</P>
		</div>';
	 }

	else{ ?>

		 <legend>Necesitamos tu opinión sobre el evento <?php echo  $nombre ; ?> </legend>
 	
 	<?php if($datosProyecto['tipo']=='PID'){
 		echo "PIDDDDD";

 	} 

 	elseif ($datosProyecto['tipo']=='Clase Normal') {
 		echo "clase normaal";
 	}
	
	elseif ($datosProyecto['tipo']=='Evento Especial') {
	 		echo "Evento especiaaal";
	 	} 	

	 else{
	 	echo  '

	 	<form method="post" action="'.base_url().'Eventos2Controller/guardarComentario">
	 		<div class="form-group">
	      		<label class="col-md-4 control-label" for="textinput">Deja un comentario sobre la clase:</label>      
	      		<div class="col-md-4">
	      			<textarea id="textinput" name="comentarioClase" type="text" placeholder="Comentario" class="form-control" maxlength="1000" rows = "4"></textarea>
	       
	      		</div>
    		</div>
    		<br>
    			<input type = "hidden" name="nombre_evento" value = "'.$nombre.'">
		   		<input type = "hidden" name="nombre_proyecto" value = "'.$datosProyecto['nombre'].'">
		   		<input type = "hidden" name="idEvento" value = "'.$idevento.'">
    		<button type="submit" class="botones1"> Siguiente</button>
    	</form>';
	 }


?>

	<?php } ?>

</body>