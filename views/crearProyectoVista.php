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
    
    <form class="form-horizontal" method = "post" action="<?php echo base_url();?>crearProyecto/crearProyecto">
    <fieldset>

    <!-- Form Name -->
    <legend>Crear Proyecto</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre Proyecto</label>  
      
      <div class="col-md-4">
      <input id="textinput" name="nombre_proyecto" type="text" placeholder="nombre del proyecto" class="form-control input-md" required="SI">
        
      </div>
    </div>

    
    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Tipo de Proyecto</label>
      <div class="col-md-4">
        <select id="selectbasic" name="tipo_proyecto" class="form-control">
          <option value="Clase Normal">Clase Normal</option>
          <option value="Clase Innovadora">Clase Innovadora</option>
          <option value="PID">PID</option>
          <option value="Evento Especial">Evento Especial</option>
        </select>
      </div>
    </div>


    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="singlebutton" class="botones" >Crear Proyecto</button>
      </div>
    </div>

</fieldset>
</form>
<script type="text/javascript" src="<?php echo base_url("js/jQuery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/bootstrap.js"); ?>"></script>
</body>