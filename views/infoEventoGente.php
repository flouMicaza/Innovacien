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
			<form action="'. base_url().'lugarController/irLugar_Nombre" method="get">
			<input type="hidden" name="evento" value="no" >
			<input type="hidden" name="nombreEvento" value="'.$nombre.'">
			<input type="hidden" name="idEvento" value="'.$idEvento.'">
  			<button type="submit" name="lugar" value="'.$lugar.'" class="btn-link">'.$lugar.'</button>
			</form>

			</td>
			</tr>

		<tr>
			<td>Pago</td>
			<td>'.$datos_evento['pago'].'</td>
		</tr>';

		$datetime1 = date_create('2009-10-13');
		$datetime2 = date_create('2009-10-13'); 
		//datetime2 - datetime1
		$interval = date_diff($datetime1, $datetime2);
		$intervalo = $interval->format('%R%a');

		if($intervalo < 3 && $intervalo > (-1)){
			
		if($datos_evento['asistencia'] == null){
			echo'
			<tr>
			<th>No ha confirmado sus asistencia</th>
			<td>
				<div class="btn-group">
				<button type ="button" class ="btn btn-default dropdown-toggle" data-toggle="dropdown">Selecione una opcion <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<form method ="post" action ='.base_url().'eventosController/actualizarFuturaAsistencia>
					<input type="hidden" name="nombreEvento" value="'.$nombre.'">
					<input type="hidden" name="idEvento" value="'.$idEvento.'">
					<li>
						<button type="submit" class="btn-link" name ="asistencia" value="si">Asistiré</button>	
					</li>
					<li>
						<button type="submit" class="btn-link" name ="asistencia" value="no">No Asistiré</button>
					</li>
				</ul>
				</form>
				</div>
			</td>
			<tr>';
		}
		if ($datos_evento['asistencia'] == 1){
			echo'
			<tr>
			<th>Si asistirá al evento</th>
			<td>
				<div class="btn-group">
				<button type ="button" class ="btn btn-default dropdown-toggle" data-toggle="dropdown">Cambiar mi asistencia<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<form method ="post" action ='.base_url().'eventosController/actualizarFuturaAsistencia>
					<input type="hidden" name="nombreEvento" value="'.$nombre.'">
					<input type="hidden" name="idEvento" value="'.$idEvento.'">
					<li>
						<button type="submit" class="btn-link" name ="asistencia" value="si">Asistiré</button>	
					</li>
					<li>
						<button type="submit" class="btn-link" name ="asistencia" value="no">No Asistiré</button>
					</li>
				</ul>
				</form>
				</div>
			</td>
			<tr>';
		}
		if ($datos_evento['asistencia'] == 0){
			echo'
			<tr>
			<th>No asistirá al evento</th>
			<td>
				<div class="btn-group">
				<button type ="button" class ="btn btn-default dropdown-toggle" data-toggle="dropdown">Cambiar mi asistencia<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<form method ="post" action ='.base_url().'eventosController/actualizarFuturaAsistencia>
					<input type="hidden" name="nombreEvento" value="'.$nombre.'">
					<input type="hidden" name="idEvento" value="'.$idEvento.'">
					<li>
						<button type="submit" class="btn-link" name ="asistencia" value="si">Asistiré</button>	
					</li>
					<li>
						<button type="submit" class="btn-link" name ="asistencia" value="no">No Asistiré</button>
					</li>
				</ul>
				</form>
				</div>
			</td>
			<tr>';
		}
		}
		echo '</table>
		</div>';

		
		echo'
		<legend>Opciones</legend>

		<div class="container" ALIGN="center">
		<div class="btn-group" ALIGN= "center">
			<button type ="button" class ="btn btn-default dropdown-toggle" data-toggle="dropdown">Seleccione una opcion<span class="caret"></span>
				</button>
			<ul class="dropdown-menu">

				<li>
				<form method="get" action="'.base_url().'eventos2Controller/descargarMaterial">
					<input type="hidden" name="nombreEvento" value="'.$nombre.'">
					<input type="hidden" name="idEvento" value="'.$idEvento.'">
					<button type="submit" class="btn-link">Material docente</button>
				</form>			
				</li>

				<li>
				<form method="post" action="'.base_url().'eventos2Controller/irSubirListaAsistencia">
					<input type="hidden" name="nombreEvento" value="'.$nombre.'">
					<input type="hidden" name="idEvento" value="'.$idEvento.'">
					<button type="submit" class="btn-link">Subir Asistencia </button>
				</form>			
				</li>';


				if($datos_evento['asistencia']==1){
				echo '
				<li>
				<form method="post" action="'.base_url().'eventos2Controller/irSubirListaAsistencia">
					<input type="hidden" name="nombreEvento" value="'.$nombre.'">
					<input type="hidden" name="idEvento" value="'.$idEvento.'">
					<button type="submit" class="btn-link">Pasar asistencia</button>
				</form>';

				}

			echo'</ul>
		</div>
		</div>';



?>


</table>
</div>



</body>
	