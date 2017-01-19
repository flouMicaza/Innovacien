<!DOCTYPE html>

<html lang="es">

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

 

	

	<style type="text/css">
	<!--
	.botones {
	      font-size:15px;
	        font-family:sans-serif;
	        font-weight:bold;
	        color:black;
	        background:white;
	        border:5px;
	        width:150px;
	        height:30px;
	        border-radius: 5px;
	}
	-->

	.container {

		width:996px;

		margin:0px auto;

		font-size:1em;
		color:#fff;
			background:#ff8000;
			text-decoration:none;
			padding:10px 20px;
			font-size:13px;
			font-family: arial, serif;
			font-weight:bold;
			-webkit-border-radius:.5em;
			-moz-border-radius:.5em;
			-border-radius:.5em;

	}

	

	section {

		float: left;

		width: 70%;

	}


	nav {

		overflow: hidden;

	}

	nav ul {

		list-style-type:none;

		float:left;

		padding:0px;

	}

	nav ul li {

		float:left;

		padding:3px 10px;

		margin:2px;

		background:#ccccff;

		-moz-border-radius:5px;-webkit-border-radius:5px;-o-border-radius:5px;border-radius:5px;

	}

 

	/* para 980px o menos */

	@media screen and (max-width:980px) {

		.container {

			width:98%;


		}

		section {

			width:68%;

		}

	}

 

	/* para 700px o menos */

	@media screen and (max-width:700px) {

		nav, section {

			font-size:1.2em;

		}


		nav ul {

			float:none;

			clear:both;

		}

	}

 

	/* para 480px o menos */

	@media screen and (max-width:480px) {

	

		nav, section {

			font-size:1.5em;

		}

		section {

			width:94%;

		}

		nav ul {

			float:left;

			clear:none;

			width:50%;

		}

		nav ul li {

			float:none;

		}

	}

	</style>

 

</head>

 

<body>

 

<div class="container">

	<header>
	<img src="<?php echo base_url();?>img/logo_sup.png" WIDTH = 150 HEIGHT = 44 />
		<h1 align="center">Usted no está autorizado para acceder a este sitio. </h1>

	<header>
	<p align="center">
		Solicite a un administrador a autorización.
	</p>
	<center>
		
	 <form class="form-horizontal" method = "post" action="<?php echo base_url();?>welcome/iniciar">
	 <button type ="submit" id="singlebutton" name="singlebutton" class="botones" >Volver</button>

	 </form>
	 </center>


	
	
</div>

</body>

</html>
