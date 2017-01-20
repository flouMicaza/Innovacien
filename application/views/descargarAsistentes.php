<!DOCTYPE html>
<html>

<head>
	<?php
		$data['tipo'] = $tipo;
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
        position: absolute;
        top: 50%;
    }
    -->
    </style>
</head>

<body>
	<form class="form-horizontal" method = "post" action="<?php echo base_url();?>descargasController/descargarFechas">

		<fieldset>
			<legend>Fechas para ver asistencia</legend>
			*Ingrese las fechas en formato "aaaa-mm-dd" 
			<br>
			Fecha Inicial: <input type="text" name='fi'><br>
			Fecha de Término: <input type="text" name='ft'>
		</fieldset>

		<button type ="submit" id="singlebutton" name="nombre_proyecto" value =<?php echo '"'.$nombre_p.'"' ?> class="botones" >Descargar Lista</button>
	</form>


	


</body>
