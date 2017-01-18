<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<head>

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

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-theme.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.css" rel="stylesheet" media="screen">
  <?php
    $data['tipo'] = $tipo;
    $this->load->view('barra_superior',$data);
  ?>  
</head>

<body>
    
    <form class="form-horizontal" method = "post" action="<?php echo base_url();?>lugarController/crearLugar">
    <fieldset>

    <!-- Form Name -->
    <legend>Crear Lugar </legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre Lugar </label>*
      
      <div class="col-md-4">
      <input id="textinput" name="nombreLugar" type="text" placeholder="Oficina Innovacien" class="form-control input-md" required="">
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Encargado</label>*
      <div class="col-md-4">
      <input id="textinput" name="encargado" type="text" class="form-control input-md" placeholder="David Leal" required="">        
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Telefono  </label>*
      <div class="col-md-4">
      <input id="textinput" name="telefono" type="textinput" class="form-control input-md" placeholder="23456788" required="">        
      </div>
    </div>

    
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Mail Encargado </label>*
      
      <div class="col-md-4">
      <input id="textinput" name="mailEncargado" type="text" placeholder="encargado@gmail.com" class="form-control input-md" required="">
        
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Direccion </label>*
      
      <div class="col-md-4">
      <input id="textinput" name="direccion" type="text" placeholder="Hernán Cortés 2501, Ñuñoa, Región Metropolitana, Chile" class="form-control input-md" required="">
        
      </div>
    </div>


    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Link de la dirección </label>
      
      <div class="col-md-4">
      <input id="textinput" name="linkDireccion" type="text" class="form-control input-md">
        
      </div>
    </div>

   
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="proyecto"  class="botones">Crear</button>
      </div>
    </div>

</fieldset>
</form>
<script type="text/javascript" src="<?php echo base_url("js/jQuery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/bootstrap.js"); ?>"></script>
</body>