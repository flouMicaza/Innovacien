<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<?php
		$data['mensaje'] = null;
		$this->load->view('barra_superior',$data);
	?>

	<style type="text/css">
<!--
.botones {
      font-size:15px;
        font-family:sans-serif;
        font-weight:bold;
        color:white;
        background:#FF8000;
        border:5px;
        width:150px;
        height:30px;
        border-radius: 5px;
}
-->
</style>
</head>

<body>
	
<body>
	<div> 
		<P ALIGN=center>
		<FONT SIZE=5 COLOR=#424242 FACE="sans-serif">
		     Información de usuario creado</FONT>
		</P>
	</div>

	<div>
		<P ALIGN=center>
		<FONT SIZE=4 COLOR=#424242 FACE="sans-serif">
			 Nombre: </FONT>
		<FONT SIZE=4 COLOR=#FFF8000 FACE="sans-serif"><?php echo $nombre_creado ?></FONT>		
		</P>
	</div>
	<div>
		<P ALIGN=center>
		<FONT SIZE=4 COLOR=#424242 FACE="sans-serif">
			 Apellido: </FONT>
		<FONT SIZE=4 COLOR=#FFF8000 FACE="sans-serif"><?php echo $apellido_creado ?></FONT>		
		</P>
	</div>
	<div>
		<P ALIGN=center>
		<FONT SIZE=4 COLOR=#424242 FACE="sans-serif">
			 Tipo: </FONT>
		<FONT SIZE=4 COLOR=#FFF8000 FACE="sans-serif"><?php echo $tipo_creado ?></FONT>		
		</P>
	</div>
	<div>
		<P ALIGN=center>
		<FONT SIZE=4 COLOR=#424242 FACE="sans-serif">
			 Mail: </FONT>
		<FONT SIZE=4 COLOR=#FFF8000 FACE="sans-serif"><?php echo $mail_creado ?></FONT>		
		</P>
	</div>
	<div>
		<P ALIGN=center>
		<FONT SIZE=4 COLOR=#424242 FACE="sans-serif">
			 Contraseña: </FONT>
		<FONT SIZE=4 COLOR=#FFF8000 FACE="sans-serif"><?php echo $pass_creado ?></FONT>		
		</P>
	</div>

	<div>
		<P ALIGN=center>
		<FONT SIZE=4 COLOR=#424242 FACE="sans-serif">
			 Telefono: </FONT>
		<FONT SIZE=4 COLOR=#FFF8000 FACE="sans-serif"><?php echo $fono_creado ?></FONT>		
		</P>
	</div>

	<div>
		<P ALIGN=center>
		<FONT SIZE=4 COLOR=#424242 FACE="sans-serif">
			 Rut: </FONT>
		<FONT SIZE=4 COLOR=#FFF8000 FACE="sans-serif"><?php echo $rut_creado ?></FONT>		
		</P>
	</div>
	
	<div ALIGN = center>

		<form action="<?php echo base_url();?>adminController/irInicio">
		<button type ="submit" id="singlebutton" name="singlebutton" class="botones">Volver al inicio</button>
		</form>
	</div>

</body>
