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
</head>

<body>
    
    <form class="form-horizontal" method = "post" action="<?php echo base_url();?>adminController/crearUsuario">
    <fieldset>

    <!-- Form Name -->
    <legend>Crear Usuario</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre</label>  
      
      <div class="col-md-4">
      <input id="textinput" name="nombre" type="text" placeholder="David" class="form-control input-md" required="">
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Apellido</label>  
      <div class="col-md-4">
      <input id="textinput" name="apellido" type="text" placeholder="Leal" class="form-control input-md" required="">        
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Tipo de cuenta</label>
      <div class="col-md-4">
        <select id="selectbasic" name="tipo" class="form-control">
          <option value="administrador">Administrador</option>
          <option value="emprendedor">Emprendedor</option>
          <option value="monitor">Monitor</option>
          <option value="profesor">Profesor</option>
        </select>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="email">E-mail</label>  
      <div class="col-md-4">
      <input id="email" name="mail" type="text" placeholder="david.leal@innovacien.org" class="form-control input-md" required="">
        
      </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="passwordinput">Contraseña</label>
      <div class="col-md-4">
        <input id="passwordinput" name="contraseña" type="password" placeholder="Insertar contraseña" class="form-control input-md" required="">
        
      </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="passwordinput">Repetir contraseña </label>
      <div class="col-md-4">
        <input id="passwordinput" name="contraseña" type="password" placeholder="Repetir Contraseña" class="form-control input-md" required="">
        
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Crear Usuario</button>
      </div>
    </div>

</fieldset>
</form>
<script type="text/javascript" src="<?php echo base_url("js/jQuery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/bootstrap.js"); ?>"></script>
</body>