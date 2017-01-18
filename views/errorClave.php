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

    
    <form class="form-horizontal" method = "post" action="<?php echo base_url();?>genteController/cambiarClave">
    <fieldset>

    <!-- Form Name -->
    <legend>Error con la clave</legend>

    <!-- Text input-->
    <?php
    if ($error=="claveNueva") { ?>

      <div>
    <P ALIGN=center>
    <FONT SIZE=3 COLOR=#FF8000 >
       Contraseñas no coinciden </FONT>    
    </P>

  </div>


   <?php }
    elseif ($error=="claveAntigua") { ?>
        <div>
          <P ALIGN=center>
          <FONT SIZE=3 COLOR=#FF8000 >
            Contraseña no válida </FONT>    
          </P>

        </div>

    <?php } ?>

     


    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Contraseña Actual</label>  
      
      <div class="col-md-4">
      <input id="textinput" name="claveAntigua" type="password" placeholder="Clave Actual" class="form-control input-md" required="">
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nueva Contraseña</label>  
      <div class="col-md-4">
      <input id="textinput" name="nuevaContraseña" type="password" placeholder="Nueva Contraseña" class="form-control input-md" required="">        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="email">Repita Nueva Contraseña</label>  
      <div class="col-md-4">
      <input id="textinput" name="copiaNuevaContraseña" type="password" placeholder="Repita Contraseña" class="form-control input-md" required="">
        
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Cambiar Clave</button>
      </div>
    </div>

</fieldset>
</form>
<script type="text/javascript" src="<?php echo base_url("js/jQuery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/bootstrap.js"); ?>"></script>
</body>
