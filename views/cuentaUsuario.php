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

    <legend>Informacion del usuario</legend>



	<div class = "container">
	<P ALIGN=center>
	<table ALIGN = center class = "table table-hover">
	<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Nombre y apellido  </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$nombre_usr ?></FONT>
		</td>
	</tr>
	<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Correo  </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$mail_usr ?></FONT>
		</td>		
	</tr>

	<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Rut </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$rut_usr ?></FONT>
		</td>		
	</tr>

		<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Telefono  </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$fono_usr ?></FONT>
		</td>		
	</tr>
	
	<?php 
		if($tipo_usr == 'monitor'){
			echo '
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
					 	Banco  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif">'.$banco_usr.'</FONT>
					</td>	
				</tr>
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
					 	Cuenta  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif">'.$cuenta_usr.'</FONT>				
					</td>				
				</tr>
				<tr>
					<td>
					<FONT COLOR=#424242 FACE="sans-serif">
					 	Numero de Cuenta  </FONT>
					</td>
					<td>
					<FONT COLOR=#FFF8000 FACE="sans-serif">'.$numCuenta_usr.'</FONT>				
					</td>				
				</tr>
			';
		}

	?>
	<tr>
		<td>
		<FONT COLOR=#424242 FACE="sans-serif">
			 Estado </FONT>
		</td>
		<td>
		<FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo '  '.$activo_usr ?></FONT>
		</td>		
	</tr>

</P>
</table>
</div>

	
</br>
<div align="center" >
  <?php
	
  	if($tipo_usr != 'administrador'){
		if($activo_usr == 'Activo'){
			$boton = 'Desactivar Usuario';
			echo '
				<div class="btn-group">
				<form name="form2" action='.base_url().'adminController/desactivarUsuario method="post">
					 <input type="hidden" name="mail_usr" value="'.$mail_usr.'">
					<input type="submit" value="'.$boton.'" class="boton">
				</form> 
				</div>';
		}
		else{
			$boton = 'Activar Usuario';
			echo '
				<div class="btn-group">
				<form name="form2" action='.base_url().'adminController/activarUsuario method="post">
					 <input type="hidden" name="mail_usr" value="'.$mail_usr.'">
					<input type="submit" value="'.$boton.'" class="boton">
				</form> 
				</div>';
		}

		
  }
  ?>
</div> 
<br>
</br>

</body>
	