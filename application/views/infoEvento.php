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
				<form action="'.base_url().'lugarController/irLugar_nombre" method="post">
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
<div style="width:500px; padding:3px;">
	<div style="width:245px; float:left;">
		<form class="form-horizontal" method = "post" action="<?php echo base_url();?>eventosController/cargarmodificarEvento">
		<button type ="submit" id="singlebutton" name="evento" value =<?php echo '"'.$idEvento.'"' ?> class="botones" >ModificarEvento</button>

		</form>
	</div>
	
</div>
</center>
</body>
	