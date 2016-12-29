<?php
	
class Usuario extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	function ingresoPersona($mail,$nombre,$apellido,$tipo,$contraseña){
		$qry = "INSERT INTO login VALUES (?,?,?,?,?);";
		$this-> db -> query($qry, array($mail,$nombre,$apellido,$tipo,$contraseña));
		$qry = "SELECT * FROM login WHERE mail = ? AND contraseña = ?";
		$ans = $this ->db->query($qry, array($mail,$contraseña));
		$resultado = $ans->row_array();
		return $resultado;
	}


	function cambiarClave($mail,$contraseña){
		$qry = "UPDATE login SET contraseña = ? WHERE mail=?;";
		$query1=  $this-> db -> query($qry, array($contraseña,$mail));
	}

	function sacarDatos($mail){
		$qry="SELECT * FROM login WHERE mail=?;";
		$query1= $this-> db -> query($qry,$mail);
		$resultado=$query1->row_array();
		return $resultado;
	}


}
