<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-theme.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.css" rel="stylesheet" media="screen">
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
}



    .google-maps {
        position: relative;
        padding-bottom: 75%; // This is the aspect ratio
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 75% !important;
        height: 75% !important;
    }
-->
</style>
</head>

<body>
    
    <form class="form-horizontal" method = "post" action="<?php echo base_url();?>lugarController/actualizarLugar">
    <fieldset>

    <!-- Form Name -->
    <legend>Cambiar Datos</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre Actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $nombreLugar ?></label></FONT>
      
      <div class="col-md-4">
      <input id="textinput" name="nombre" type="textinput" placeholder="nombre nuevo" class="form-control input-md" >
        
      </div>
    </div>

        <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre Encargado: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $nombre_encargado ?></label></FONT>
      
      <div class="col-md-4">
      <input id="textinput" name="nombre_encargado" type="textinput" placeholder="encargado nuevo" class="form-control input-md" >
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">telefono: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $telefono ?></label></FONT>
      
      <div class="col-md-4">
      <input id="textinput" name="telefono" type="textinput" placeholder="telefono" class="form-control input-md" >
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Mail encargado: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $mail_encargado ?></label></FONT>
      
      <div class="col-md-4">
      <input id="textinput" name="mail_encargado" type="textinput" placeholder="mail nuevo" class="form-control input-md" >
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Direccion Actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $direccion ?></label></FONT>
      
      <div class="col-md-4">
      <input id="textinput" name="direccion" type="textinput" placeholder="Direccion nueva" class="form-control input-md" >
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nuevo Link: </label>
      <div class="col-md-4">
      <input id="textinput" name="link" type="textinput" placeholder="link nuevo" class="form-control input-md" >
      
    </div>
    <br>
    <br>       
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="nombreOriginal" value= <?php echo '"'.$nombreLugar.'"'?> class="botones">Cambiar datos</button>
      </div>
    </div>



</fieldset>
</form>
<script type="text/javascript" src="<?php echo base_url("js/jQuery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/bootstrap.js"); ?>"></script>
</body>