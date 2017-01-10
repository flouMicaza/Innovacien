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
	.botones{
        font-size:15px;
        font-family:sans-serif;
        font-weight:bold;
        color:white;
        background:#FF8000;
        border:5px;
        width:200px;
        height:30px;
        border-radius: 5px;
       }
	</style>
</head>

<body>

<?php
	if($qry == null){
		echo '<legend>No se encontraron lugares para agregar al proyecto: '.$nombreEvento.'</legend> ';
	}
	else{
		echo '
	

    <legend>Agregar lugar al evento: '.$nombreEvento.'</legend>

    <div class = "container" style="overflow-x:auto;">
	<P ALIGN=center>
		 <form method="get" action="eventosController/crearOficial">';

		 $i=0;
		 foreach ($qry->resul_array() as $row) {
		 	echo 

		 		'<input name="'.$row['nombre'].'" type="checkbox" />'.$row['nombre']
		'</form>



	</P>';
}
?>

 
</body>