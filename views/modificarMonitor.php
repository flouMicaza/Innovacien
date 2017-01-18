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
    
    <form class="form-horizontal" method = "post" action="<?php echo base_url();?>monitorController/actualizarDatos">
    <fieldset>

    <!-- Form Name -->
    <legend>Cambiar Datos</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Telefono Actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $telefono ?></label></FONT>
      
      <div class="col-md-4">
      <input id="textinput" name="telefono" type="textinput" placeholder="telefono nuevo" class="form-control input-md" >
        
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Rut Actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $rut ?></label></FONT>
      
      <div class="col-md-4">
      <input id="textinput" name="rut" type="textinput" placeholder="Rut nuevo" class="form-control input-md" >
        
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Banco actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $banco ?></label></FONT>
      <div class="col-md-4">
        <select id="selectbasic" name="banco" class="form-control">
          <option value="null">Seleccione un Banco</option>
          <option value="Banco Estado">Banco Estado</option>
          <option value="Banco de Chile">Banco de Chile</option>
          <option value="Banco Internacional">Banco internacional</option>
          <option value="Scotiabank-Desarrollo">Scotiabank-Desarrollo</option>
          <option value="Banco de Creditos e Inversiones">Banco de Creditos e Inversiones</option>
          <option value="Corp-Banca">Corp-Banca</option>
          <option value="Bice">Bice</option>
          <option value="HSBC Bank Chile">HSBC Bank Chile</option>
          <option value="Banco Santander">Banco Santander</option>
          <option value="Banco Itau">Banco Itau</option>
          <option value="The Bank Of Tokyo-Mitsubishi">The Bank Of Tokyo-Mitsubishi</option>
          <option value="Banco Security">Banco Security</option>
          <option value="Banco Falabella">Banco Falabella</option>
          <option value="Banco Ripley">Banco Ripley</option>
          <option value="Banco Consorcio">Banco Consorcio</option>
          <option value="Banco Paris">Banco Paris</option>
          <option value="Banco BBVA">Banco BBVA</option>
          <option value="Coopeuch">Coopeuch</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Tipo de cuenta actual: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $tipo_cuenta ?></label></FONT>
      <div class="col-md-4">
        <select id="selectbasic" name="tipo_cuenta" class="form-control">
          <option value="null">Seleccione tipo de cuenta</option>
          <option value="Cuenta Corriente">Cuenta Corriente</option>
          <option value="Cuenta Vista">Cuenta Vista</option>
          <option value="Cuenta de Ahorro">Cuenta de Ahorro</option>
          <option value="Chequera Electronica">Chequera Electronica (BancoEstado)</option>
          <option value="Cuenta Rut">Cuenta Rut (BancoEstad)</option>
          <option value="Cuenta de Gastos">Cuenta de Gatos (BancoEstado)</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="email">Numero de cuenta: <FONT COLOR=#FFF8000 FACE="sans-serif"><?php echo $num_cuenta ?></label> </FONT>
      <div class="col-md-4">
      <input id="textinput" name="num_cuenta" type="textinput" placeholder="numero de cuenta nuevo" class="form-control input-md" >        
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Cambiar mis datos</button>
      </div>
    </div>

</fieldset>
</form>
<script type="text/javascript" src="<?php echo base_url("js/jQuery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/bootstrap.js"); ?>"></script>
</body>