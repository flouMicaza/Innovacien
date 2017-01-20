<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        height:45px;
        border-radius: 5px;
        position: absolute;
        top: 50%;
    }
    -->
    </style>
	<?php
		$data['tipo'] = $tipo;
		$this->load->view('barra_superior',$data);
	?>
</head>

<body>
  <form class="form-horizontal" method = "post" action="<?php echo base_url();?>descargasController/descargar">
  <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Lista de cuentas: </label>
      <div class="col-md-4">
        <select id="selectbasic" name="tabla" class="form-control">
          <option value="todos">Todas las cuentas</option>      
          <option value="emprendedor">Emprendedores</option>
          <option value="monitor">Monitores</option>
          <option value="profesor">Profesores</option>
        </select>
      </div>
      </div>
      <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button type ="submit" id="singlebutton" name="singlebutton" class="botones" >Descargar</button>
      </div>
    </div>
</form>
</body>