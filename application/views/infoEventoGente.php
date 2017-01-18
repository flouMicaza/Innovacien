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

  .botonesG{
        font-size:15px;
        font-family:sans-serif;
        font-weight:bold;
        color:white;
        background:#FF8000;
        border:5px;
        width:200px;
        height:50px;
        border-radius: 5px;
       }       
</style>
</head>

<body>

    <legend>Informacion del Evento</legend>

	<div class = "container">
	<P ALIGN=center>
	<table ALIGN = center class = "table table-hover">
	<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Nombre del Evento  </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $nombre; ?></FONT>
		</td>
	</tr>
	<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Fecha  </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $fecha ;?></FONT>
		</td>		
	</tr>

	<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Hora </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $hora; ?></FONT>
		</td>		
	</tr>

		<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Duración  </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $duracion; ?></FONT>
		</td>		
	</tr>
	
	<tr>
		<td>
			<FONT COLOR=#424242 FACE="sans-serif">
			 Lugar  </FONT>
		</td>
		<td>
		<?php 
		echo '
			<form action="'. base_url().'lugarController/irLugar_Nombre" method="post">
			<input type="hidden" name="evento" value="no" >
			<input type="hidden" name="nombreEvento" value="'.$nombre.'">
			<input type="hidden" name="idEvento" value="'.$idEvento.'">
  			<button type="submit" name="lugar" value="'.$lugar.'" class="btn-link">'.$lugar.'</button>
			</form>

			</td>
			</tr>';

		if(1){//trabajo de fechas
			
		if($datos_evento['asistencia'] == null){
			echo'
			<tr>
			<th>Confirme asistencia</th>
			<td>
				<button type ="button" class ="btn btn-default dropdown-toggle" data-toggle="dropdown">Selecione una opcion <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li>
						<form>
						</form>
					</li>
					<li>
					</li>
				</ul>
			</td>';
		}

		echo'</tr>';
		}

		/**boton aparece solo si tiene permitido agregar asistencia!*/
		
		echo '</table>';

		echo '
		<br>
		<br>
		<div ALIGN="center">
		<form method="post" action="'.base_url().'eventos2Controller/irSubirListaAsistencia">
		<input type="hidden" name="nombreEvento" value="'.$nombre.'">
		<input type="hidden" name="idEvento" value="'.$idEvento.'">
		<button type="submit" class="botonesG"> Subir lista de asistencia</button>
		</form>
		</div>
		<br>
		<div ALIGN="center">
		<form method="post" action="'.base_url().'eventos2Controller/descargarMaterial">
		<input type="hidden" name="nombreEvento" value="'.$nombre.'">
		<input type="hidden" name="idEvento" value="'.$idEvento.'">
		<button type="submit" class="botonesG"> Descargar material de la clase</button>
		</form>
		</div>
		</td>';

			




/**revisar estooooo y encontrar como mostrar una cosa si quedan menos de x dias para el evento*/
$datetime1 = date_create('2009-10-11');
$datetime2 = date_create('2009-10-13');
$interval = date_diff($datetime1, $datetime2);
echo $interval->format('%R%a días');
/*si quedan menos de dos dias para el evento*/
	echo '
			<div class = "container">
			<P ALIGN=center>

			 <form method="post" action="'.base_url().'eventosController/actualizarFuturaAsistencia">

				<FONT COLOR=#FFF8000 FACE="sans-serif">Asistirá al evento?</FONT>
				
				<input type = "hidden" name="nombre" value = "'.$nombre.'">
				<input name="asistencia" type="radio" value="si"/>Sí

				<input name="asistencia" type="radio" value="no" />No
					<input type="hidden" name="nombreEvento" value="'.$nombre.'">
			<input type="hidden" name="idEvento" value="'.$idEvento.'">
				<button type="submit" class="botones"> Ir</button>
			</form>

		</P>
		</div>';


?>


</table>
</div>



</body>
	