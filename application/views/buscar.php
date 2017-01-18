<!DOCTYPE html>
<html lang="es">
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <?php
    $data['tipo'] = $tipo;
    $this->load->view('barra_superior',$data);
  ?>  
</head>
<body>
 
<fieldset>
<legend>Busqueda de usuarios</legend>
<form class="form-horizontal" method = "post" action="<?php echo base_url();?>adminController/irPerfil_Mail">
<div class="form-group">
      <label class="col-md-4 control-label" for="autocomplete">Busqueda por correo</label>  
      <div class="col-md-4">
      <input id="autocomplete" name="mail" type="text" placeholder="Correo" class="form-control input-md" required="ingrese un correo">        
      </div>
</div>
 	<div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="singlebutton" class="botones" >Revisar Perfil</button>
      </div>
    </div>
</form>
</br>

<form class="form-horizontal" method = "post" action="<?php echo base_url();?>adminController/listaUsuarios">
	<div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Lista de usuarios</label>
      <div class="col-md-4">
        <select id="selectbasic" name="tipo" class="form-control">
          <option value="todos">Todos los Usuarios</option>        
          <option value="administrador">Administradores</option>
          <option value="emprendedor">Emprendedores</option>
          <option value="monitor">Monitores</option>
          <option value="profesor">Profesores</option>
        </select>
      </div>
      </div>
      <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="singlebutton" class="botones" >Ver lista</button>
      </div>
    </div>
</form>
</fieldset>



<script type="text/javascript" src="<?php echo base_url("js/jQuery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/bootstrap.js"); ?>"></script>
<?php 
	$result ='';
	foreach($qry -> result_array() as $row){
		$result.='"' .$row['mail'].'",';

	}
  $result.='" "';
  
	echo '
  <script>
$( "#autocomplete" ).autocomplete({
  source: [ '.$result.' ]
});
</script>';
?>
<script type="text/javascript" src="<?php echo base_url("js/jQuery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/bootstrap.js"); ?>"></script>
 
</body>
</html>