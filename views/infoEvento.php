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

    <legend>Informacion del evento "<?php echo $nombre?>"</legend>

    <?php
    	if($tipo=="administrador"){?>
			<div class = "container">
			*Para ver la información del lugar, haga click sobre el lugar.
			<P ALIGN=center>

				<table ALIGN = center class = "table table-hover">
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
						 Id del evento  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$idEvento?></FONT>
					</td>
				</tr>
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
						 Nombre  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$nombre?></FONT>
					</td>
				</tr>
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
						 Fecha  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$fecha?></FONT>
					</td>
				</tr>
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
						 Hora  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$hora?></FONT>
					</td>
				</tr>
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
						 Duración  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$duracion?></FONT>
					</td>
				</tr>
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
						 Lugar  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif">
					<?php  echo '
						<form action="'.base_url().'lugarController/irLugar_nombre" method="get">
							<input type="hidden" name="idEvento" value="'.$idEvento.'" >
							<input type="hidden" name="evento" value="si">
		  					<button type="submit" name="lugar" value="'.$lugar.'" class="btn-link">'.$lugar.'</button>
						</form>'
					 ?>
					</td>
				</tr>
				
			</P>
		</table>
		</div>

		<center>
		<div class="btn-group">
   			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Opciones<span class="caret"></span>
    		</button>
   		 	<ul class="dropdown-menu">
      			<li>
      				<form class="form-horizontal" method = "post" action="<?php echo base_url();?>eventosController/cargarmodificarEvento">
      				<input type = "hidden" name="nombre_evento" value = "'.$nombre.'">
		   			
      				<button type ="submit" id="singlebutton" name="evento" value =<?php echo '"'.$idEvento.'"' ?> class="btn-link" >ModificarEvento</button>
					</form>      				
      			</li>
      			<li>
      				<form class="form-horizontal" method = "post" action="<?php echo base_url();?>eventosController/listaFotos">
						<?php echo '
					<input type = "hidden" name="nombre_evento" value = "'.$nombre.'">
		   			<input type = "hidden" name="nombre_proyecto" value = "'.$nombre_proyecto.'">'; ?>
					<button type ="submit" id="singlebutton" name="idEvento" value =<?php echo '"'.$idEvento.'"' ?> class="btn-link" >Fotografias </button>
				</form>	
      			</li>
      			<li>
      				<button id="spoiler" class ="btn-link">lista participantes </button>
      			</li>


	      		<li>
	      			<form class="form-horizontal" method = "post" action="<?php echo base_url();?>eventos2Controller/irSubirListaAsistencia">


	      			<button type ="submit" id="singlebutton" name="idEvento" value =<?php echo '"'.$idEvento.'"' ?> class="btn-link" >Subir Asistencia
	      			</button>
					</form>      				
	      		</li>
 
    		</ul>
  		</div>
  		</center>
  	</br>		
	</div>
<!-- L I S T A  D E  P A R T I C I P A N T E S !-->
	<div id ="mostrar" style ="display:none;">
	<legend>
	<form class="form-horizontal" method = "post" action="<?php echo base_url();?>participantesEventos/listaParticipantes">
    <button type ="submit" id="singlebutton" name="evento" value =<?php echo '"'.$idEvento.'"' ?> class="btn-link" >Lista de participantes</button>
		</form>

	</legend>
	<div class ="container">
	<P ALIGN=center>

	<table ALIGN = center class = "table table-hover">
	<tr>		
		<th><FONT COLOR=#FFF8000>Nombre</FONT></th>
		<th><FONT COLOR=#FFF8000>Correo</FONT></th>
		<th><FONT COLOR=#FFF8000>Pago</FONT></th>
		<th><FONT COLOR=#FFF8000>Borrar de lista</FONT></th>		
		<th><FONT COLOR=#FFF8000>Pasa Asistencia</FONT></th>		
	<tr>
	<?php
	$i=0;
	foreach( $participantes -> result_array() as $row){
		$spoiler = 'spoiler'.$i;
		$mostrar = 'mostrar'.$i;
	echo '<tr>
			<td>'.$row['nombre'].' '.$row['apellido'].'</td>
			<td>'.$row['mail'].'</td>
			<td>'.'$'.$row['pago'].'</td>
			<td>
			<form action="'.base_url().'participantesEventos/borrarParticipante1" method="post">
				<input type="hidden" name="idEvento" value="'.$idEvento.'" >
				<input type="hidden" name="mail" value="'.$row['mail'].'">		  	
		  		<button type="submit" name="borrar" value="borrar" class="btn-link">Borrar</button>
			</form>
			</td>
			<td>';

			if ($row['pasaAsistencia']==1) {
				echo '
				<input type="button" id="'.$spoiler.'" value="Pasa asistencia" class="btn-link"/>			
				';
			}
			else if ($row['pasaAsistencia']==null){
				echo '
				<input type="button" id="'.$spoiler.'" value="Pasa asistencia?" class="btn-link"/>			
				';
			}
			else{
				echo '
				<input type="button" id="'.$spoiler.'" value="No pasa Asistencia" class="btn-link"/>			
				';
			}
	echo '</td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>		

			<td>


			
			<div class="'.$mostrar.'" style="display: none;">
			<div class="btn-group">'			;
			if($row['pasaAsistencia']==1){
				echo ' 
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Pasa Asistencia<span class="caret"></span>
    			</button>';
    		}
    		elseif($row['pasaAsistencia']==null){
    			echo ' 
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
    			</button>';
    		}

    		else {
    				echo ' 
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">No pasa asistencia<span class="caret"></span>
    			</button>';
    		}

    		echo ' 
   		 	<ul class="dropdown-menu">
      			<li>
      				<form class="form-horizontal" method = "post" action="'.base_url().'eventos2Controller/cambiarPasaAsistencia">
      				<input type = "hidden" name="idevento" value = "'.$idEvento.'">
		   			
      				<button type ="submit" id="singlebutton" name="mail" value ="'.$row['login_mail'].'" class="btn-link" >Si pasa Asistencia</button>
					</form>      				
      			</li>
      			<li>
      				<form class="form-horizontal" method = "post" action="'.base_url().'eventos2Controller/cambiarNoPasaAsistencia">
      				<input type = "hidden" name="idevento" value = "'.$idEvento.'">
		   			
      				<button type ="submit" id="singlebutton" name="mail" value ="'.$row['login_mail'].'" class="btn-link" >No pasa asistencia </button>
					</form>      				
      			</li>
      		</ul>
      		</div>';

      		echo "

			<script>jQuery.noConflict();jQuery(document).ready(function(){jQuery('#".$spoiler."').click(function(){jQuery('.".$mostrar."').slideToggle("; echo '"slow");});});</script>
			';	
			echo '
			</div>
			</td>
		</tr>';
		$i=$i+1;
		
	}

	?>
	</div>
	</div>
	<script>
		jQuery.noConflict();jQuery(document).ready(function(){jQuery('#spoiler').click(function(){jQuery('#mostrar').slideToggle("slow");});});
	</script>
<!-- F I N  L I S T A  P A R T I C I P A N T E S !-->
	<? } ?>


</body>
	
	