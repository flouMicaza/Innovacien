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

    <legend>Informacion del lugar"<?php echo $nombreLugar?>"</legend>


	<div class = "container">
	<P ALIGN=center>

		<table ALIGN = center class = "table table-hover">
		<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Nombre   </FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$nombreLugar?></FONT>
			</td>
		</tr>
		<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Nombre Encargado </FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$nombre_encargado?></FONT>
			</td>
		</tr>
		<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Telefono  </FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$telefono?></FONT>
			</td>
		</tr>
		<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Mail Encargado  </FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$mail_encargado?></FONT>
			</td>
		</tr>
		<tr>
			<td>
			<FONT COLOR=#424242 FACE="sans-serif">
				 Dirección </FONT>
			</td>
			<td>
			<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$direccion?></FONT>
			</td>
		</tr>
		
	</P>
</table>
</div>

<?php if($evento=='si'){
echo $idEvento ?>
	<center>
	<div style="width:500px; padding:3px;">
		<div style="width:245px; float:left;">
			<form class="form-horizontal" method = "post" action="<?php echo base_url();?>eventosController/irInfoEvento">
				<input type="hidden" name="idEvento" value=<?php echo '"'.$idEvento.'"' ?>>
				<button type ="submit" id="singlebutton" name="evento" value =<?php echo '"'.$idEvento.'"' ?> class="botones" >Volver al evento</button>

			</form>
		</div>
<?php } ?>
</div>
</center>


<center>
<iframe src="https://www.google.es/maps/place/Sim%C3%B3n+Bol%C3%ADvar,+Regi%C3%B3n+Metropolitana,+Chile/@-33.4474559,-70.5766403,17z/data=!3m1!4b1!4m5!3m4!1s0x9662cfb2d2d782d7:0xb867ad187039e3b0!8m2!3d-33.4474559!4d-70.5744516" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

</center>
</body>
