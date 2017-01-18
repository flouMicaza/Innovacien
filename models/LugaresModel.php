<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LugaresModel extends CI_Model
{
	
	public function __construct()
	{
		
		parent::__construct();
		
	}
	public function verLugar($nombre){
		$qry= 'SELECT * FROM lugar where nombre_lugar=?;';
		$ans= $this-> db -> query($qry,$nombre);
		$ans=$ans->row_array();
		return $ans;
	}

	public function verLugares(){
		$qry='SELECT * FROM lugar;';
		$ans=$this->db->query($qry);
		return $ans;
	}

	public function crearLugar($nombreLugar,$nombre_encargado,$telefono,$mail_encargado,$direccion,$linkDireccion){

		$qry="INSERT INTO lugar (nombre_lugar,nombre_encargado,telefono,mail,direccion,link) VALUES (?,?,?,?,?,?);";
		$this-> db -> query($qry,array($nombreLugar,$nombre_encargado,$telefono,$mail_encargado,$direccion,$linkDireccion));
		$qry2="SELECT * FROM lugar where nombre_lugar=?";
		$ans=$this-> db -> query($qry2,$nombreLugar);
		$ans=$ans->row_array();
		return $ans;
	}

	public function actualizarNombreLugar($nombreLugar,$nombre){
		$qry = "UPDATE lugar SET nombre_lugar = ? WHERE nombre_lugar = ? ;";
        $this->db->query($qry,array($nombreLugar,$nombre));
	}

	public function actualizarNombre_Encargado($nombre_encargado,$nombre){
		$qry = "UPDATE lugar SET nombre_encargado = ? WHERE nombre_lugar = ? ;";
        $this->db->query($qry,array($nombre_encargado,$nombre));
	}


	public function actualizarTelefono($telefono,$nombre){
		$qry = "UPDATE lugar SET telefono= ? WHERE nombre_lugar = ? ;";
        $this->db->query($qry,array($telefono,$nombre));
	}


	public function actualizarMail($mail,$nombre){
		$qry = "UPDATE lugar SET mail = ? WHERE nombre_lugar = ? ;";
        $this->db->query($qry,array($mail,$nombre));
	}


	public function actualizarDireccion($direccion,$nombre){
		$qry = "UPDATE lugar SET direccion = ? WHERE nombre_lugar = ? ;";
        $this->db->query($qry,array($direccion,$nombre));
	}


	public function actualizarLink($link,$nombre){
		$qry = "UPDATE lugar SET link = ? WHERE nombre_lugar = ? ;";
        $this->db->query($qry,array($link,$nombre));
	}



}