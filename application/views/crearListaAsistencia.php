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
        width:100px;
        height:30px;
        border-radius: 5px;
       }      

#inner {
    display: table;
    margin: 0 auto; 
} 
</style>
</head>

<body>
<p align="center">
<FONT COLOR=#ff8000 FACE="sans-serif" SIZE=5>
             Agregar un alumno </FONT>


<form class="form-horizontal" method = "post" action="<?php echo base_url();?>eventos2Controller/subirListaAsistencia">
<div class="form-group">
      <label class="col-md-4 control-label" for="autocomplete">Ingrese nombre y apellido</label>  
      <div class="col-md-4">
      <input  name="nombreAlumno" type="text" placeholder="Nombre Apellido" class="form-control input-md" required="ingrese un nombre">   
      <input type="hidden" name="idevento" value= <?php echo '"'.$idevento.'"'?> >     
      </div>
      <button type="submit" name="lugar" value="'.$lugar.'" class="botonesG">Ir</button>

</div>
</form>

<div id="inner">
    <form class="form-horizontal" method = "post" action="<?php echo base_url();?>eventos2Controller/mostrarListaAsistencia">
         <button type="submit" name="lugar" value="'.$lugar.'" class="botonesG">Terminar</button>
        <input type="hidden" name="idevento" value= <?php echo '"'.$idevento.'"'?> >    

    </form>
</div>
</p>
<br>

</body>