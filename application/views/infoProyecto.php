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
<?php if($tipo=='administrador'){?>
    <legend>Informacion del proyecto "<?php echo $nombre_p?>"</legend>


	<div class = "container">
	*Para ver la información del creador, haga click sobre el mail.
	<P ALIGN=center>

		<table ALIGN = center class = "table table-hover">
		<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Nombre del Proyecto  </FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$nombre_p ?></FONT>
			</td>
		</tr>
		<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Fecha de creación  </FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$fecha_creacion?></FONT>
			</td>		
		</tr>

		
		<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Creador del proyecto</FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif">
			<?php echo '
				<form action="'.base_url().'adminController/irPerfil_Mail" method="get">
  					<button type="submit" name="mail" value="'.$creador.'" class="btn-link">'.$creador.'</button>
				</form>'
			 ?>

			</td>
			

		</tr>
		
			<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Tipo de proyecto  </FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$tipo_p ?></FONT>
			</td>		
		</tr>
		<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Lista de Archivos  </FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '
				<form action="'.base_url().'crearProyecto/listaArchivos" method="get">
  					<button type="submit" name="nombre_proyecto" value="'.$nombre_p.'" class="btn-link">Archivos</button>
				</form>'
			 ?>
</FONT>
			</td>		
		</tr>
	</P>
</table>
</div>
<center>
  <div class="btn-group">
  	<form class="form-horizontal" method = "get" action="<?php echo base_url();?>crearProyecto/listaParticipantes">
		<button type ="submit" id="singlebutton" name="nombre_proyecto" value =<?php echo '"'.$nombre_p.'"' ?> class="botones" >Ver Participantes</button>
	</form>
  </div>
  <br>
  <br>
  <div class="btn-group">
  	<form method = "get" action="<?php echo base_url();?>eventosController/irEventos">
		<button type ="submit" id="singlebutton" name="proyectoNombre" value=<?php echo '"'.$nombre_p. '"'?> class="botones" >Ver Eventos</button>
	</form>
  </div> 
</center>
<?php }

 elseif ($tipo=="monitor"){
 	echo '
 	  <legend>Informacion del proyecto "'.$nombre_p.'"</legend>


	<div class = "container">
	*Para ver la información del creador, haga click sobre el mail.
	<P ALIGN=center>

		<table ALIGN = center class = "table table-hover">
		<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Nombre del Proyecto  </FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"> "'.$nombre_p.'"</FONT>
			</td>
		</tr>
		<tr>
		<td>
			<FONT COLOR=#424242 FACE="sans-serif">Proximos eventos del proyecto : </FONT>
		</td>
		<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"> </FONT>
			</td>
		</tr>
		'
		;
			foreach ($eventos->result_array() as $row) {
				echo '
				<tr>
				<td>
					<FONT COLOR=#424242 FACE="sans-serif"></FONT>
				</td>
				<td>
					<form action="'.base_url().'eventosController/irInfoEvento" method="post">
					<input type = "hidden" name="nombre_proyecto" value = "'.$nombre_p.'">
  					<button type="submit" name="idevento" value="'.$row['idevento'].'" class="btn-link">'.$row['nombre'].'</button>
					</form>
				</td>
				</tr>
		</center>';

			}
		echo '<div style="width:245px; float:left;">
				<form class="form-horizontal" method = "post" action="'.base_url().'eventosController/eventosAnteriores">
				<button type ="submit" id="singlebutton" value="'.$nombre_p.'" class="botones" name="nombre_p" >Eventos Anteriores </button>
				</form>	
		</div>	
			';

		
} 
	elseif ($tipo=="profesor") {
	echo "profesorrrrr";
}


else{ echo "emprendedorrrrr";} ?>

</body>
