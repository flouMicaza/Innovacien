<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo base_url();?>css/barra_superior.css" rel="stylesheet">
    <?php
        $data['tipo'] = $tipo;
        $this->load->view('barra_superior',$data);
    ?>
    <style type="text/css">

    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;

    }

    th {
    background-color: #Ff8000;
    color: white;
    }

    td, th {
    border-bottom: 1px solid #ddd;
    text-align: center;
    padding: 10px;
    align: center;
    height: 50'px;              
}

    .botones {
        font-size:15px;
        font-family:sans-serif;
        font-weight:bold;
        color:white;
        background:white;
        border:5px;
        width:150px;
        height:50px;
        border-radius: 5px;
    }



</style>
</head>

<body>
    <center>
    <legend>Lista de alumnos</legend>
    <div class = "container"  style="overflow-x:auto;">
    <table >
    <tr align = "center">        
        <th align="center">Nombre y Apellido</th>     

    </tr>


<?php

    $i = 0;
    foreach ($listaAlumnos->result_array() as $row) {
        
        echo '<tr algin="center">
                <td align="center">'.$row['nombre_alumno'].'</td>               
              </tr>';  

    }   ?>
  
 
    </table>
    </div>
    </center>


   <div>
   <center>
    <form class="form-horizontal" method = "get" action="<?php echo base_url();?>descargasController/descargarLista">
    <input type="hidden" name="evento" value="<?php echo $idevento?>">
    <button type ="submit" id="singlebutton" >Descargar Lista</button>

    </form>
    </center>
    </div>


   <div>
   <center>
    <form class="form-horizontal" method = "get" action="<?php echo base_url();?>eventosController/irInfoEvento">
    <input type="hidden" name="evento" value="<?php echo $idevento?>">
    <button type ="submit" id="singlebutton" >Volver al evento</button>

    </form>
    </center>
    </div>



    
<br>

</body>
