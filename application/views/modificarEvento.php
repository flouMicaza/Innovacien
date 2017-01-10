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
-->
</style>
</head>

<body>
    
    <form class="form-horizontal" method = "post" action="<?php echo base_url();?>eventosController/actualizarEvento">
    <fieldset>

    <!-- Form Name -->
    <legend>Cambiar Datos</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nombre Actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $nombre ?></label></FONT>
      
      <div class="col-md-4">
      <input id="textinput" name="nombre" type="textinput" placeholder="telefono nuevo" class="form-control input-md" >
        
      </div>
    </div>

    <div class="form-group"> 
      <label class="col-md-4 control-label" for="textinput">Fecha Actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $fecha ?></label></FONT>
      <div class="col-md-4">
      <input id="textinput" name="fecha" type="date" class="form-control input-md" >        
      </div>
    </div>

    <div class="form-group"> 
      <label class="col-md-4 control-label" for="textinput">Hora Actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $hora ?></label></FONT>
       <div class="col-md-4">
      <input id="textinput" name="hora" type="time" class="form-control input-md" >        
      </div>
    </div>

    <div class="form-group"> 
      <label class="col-md-4 control-label" for="textinput">Duracion Actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $duracion ?></label></FONT>
      <div class="col-md-4">
      <input id="textinput" name="duracion" type="time" class="form-control input-md" >        
      </div>
    </div>


    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Lugar Actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $lugar ?></label></FONT>
      <div class="col-md-4">
      <select id="selectbasic" name="lugar" class="form-control">

        <?php 
            foreach ($lugares->result_array() as $row) {
                echo '  
              <option value="'.$row['nombre_lugar'].'">'.$row['nombre_lugar'].'</option>';
            }            
        ?>
          
        </select>
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="idEvento" value= <?php echo '"'.$idevento.'"'?> class="botones">Cambiar datos</button>
      </div>
    </div>

</fieldset>
</form>
<script type="text/javascript" src="<?php echo base_url("js/jQuery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/bootstrap.js"); ?>"></script>
</body>