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
  .boton{
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

    <legend>Informacion Personal</legend>


	<div class = "container">
	<P ALIGN=center>
	<table ALIGN = center class = "table table-hover">
	<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Nombre y apellido  </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$nombre ?></FONT>
		</td>
	</tr>
	<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Correo  </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$mail ?></FONT>
		</td>		
	</tr>

	<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Rut </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$rut ?></FONT>
		</td>		
	</tr>

		<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Telefono  </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$fono ?></FONT>
		</td>		
	</tr>
	
	<?php 
		if($tipo == 'monitor'){
			echo '
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
					 	Banco  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif">'.$banco.'</FONT>
					</td>	
				</tr>
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
					 	Cuenta  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif">'.$tipo_cuenta.'</FONT>				
					</td>				
				</tr>
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
					 	Numero de Cuenta  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif">'.$num_cuenta.'</FONT>				
					</td>				
				</tr>
			';
		}

	?>

</P>
</table>
</div>

	
</br>
<div align="center" >
  <div class="btn-group">
  <form name="form1" action="<?php echo base_url(); ?>GenteController/irCambiarClave " method="get">
  	<input type="hidden" value="<?php echo $mail; ?>" name="mail">
    <input type="submit" value="Cambiar contraseña" class="boton">
  </form>
  </div>
  <br>
  <br>
  <?php
  if($tipo == 'monitor'){
  	echo '
  		<div class="btn-group">
	  	<form name="form2" action='.base_url().'monitorController/cargarModificarDatos  method="get">
	  		<input type="hidden" value="'.$mail.'" name="mail">
	    	<input type="submit" value="Modificar Datos " class="boton">
	  	</form> 
	  	</div>';
  }
  ?>
</div> 

</body>
	