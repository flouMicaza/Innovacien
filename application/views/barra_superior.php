<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-theme.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="<?php echo base_url();?>css/barra_superior.css" rel="stylesheet">



  <meta charset="UTF-8">
  <title>Innovacien </title>



</head>


<body>
<!--<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">-->

</nav>
<nav class="navbar navbar-default" role="navigation">
     <div class="container-fluid">
<!--header section -->
          <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
              <form method="post" action="<?php echo base_url();?>welcome/iniciar">
              <input name="boton1" type="image" src="<?php echo base_url();?>img/logo_sup.png" WIDTH = 150 HEIGHT = 44>

              </form>             
          </div>
          <!-- menu section -->
          <?php
            if($tipo=="administrador"){ ?>
              <div class="collapse navbar-collapse navbar-ex1-collapse">
              
	 
        
              <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url(); ?>adminController/miCuenta ">Mi cuenta</a></li>
              <li><a href="<?php echo base_url();?>adminController/crearCuenta">Crear Cuenta</a></li>
              <li><a href="<?php echo base_url(); ?>proyectosController/inicioProyecto">Proyectos</a></li>

              <li><a href="<?php echo base_url(); ?>adminController/listaDeudas">Deudas y pagos</a></li>
              <li><a href="<?php echo base_url(); ?>adminController/irABuscar">Buscar</a></li>
              <li><a href="<?php echo base_url(); ?>adminController/irDescargas ">Descargas</a></li>
              <li><a href="<?php echo base_url(); ?>welcome/cerrarSesion">Cerrar Sesión</a></li>
              </ul> 
              </div>        
        
          <?php } ?>


          <?php
            if($tipo=="monitor" || $tipo=="profesor" || $tipo=="emprendedor"){ ?>
              <div class="collapse navbar-collapse navbar-ex1-collapse">   
        
              <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url(); ?>genteController/miCuenta ">Mi cuenta</a></li>
              <li><a href="<?php echo base_url(); ?>genteController/eventos">Eventos</a></li>
              <?php if($tipo =="monitor"){?>
              <li><a href="<?php echo base_url(); ?>genteController/MilistaDeudas">Pagos y Deudas</a></li>
              <?php }?>
              <li><a href="<?php echo base_url(); ?>welcome/cerrarSesion">Cerrar Sesión</a></li>
              </ul> 
              </div>        
        
          <?php } ?>




        
      </div>
</nav>
<script type="text/javascript" src="<?php echo base_url("js/jQuery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/bootstrap.js"); ?>"></script>
</body>
</html>
