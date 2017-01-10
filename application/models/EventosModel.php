<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventosModel extends CI_Model
{
	
	public function __construct()
	{
		
		parent::__construct();
		
	}

	public function crearEvento($nombreEvento,$fecha,$hora,$duracion,$proyecto,$lugar){

		$qry="INSERT INTO evento(nombre,fecha,hora,duracion,proyecto_nombre,nombre_lugar) VALUES (?,?,?,?,?,?);";
		$this -> db -> query($qry,array($nombreEvento,$fecha,$hora,$duracion,$proyecto,$lugar));
		$quer="SELECT * from evento where idevento= (SELECT max(idevento) from evento);";
		$ans=$this->db->query($quer);
		$resultado=$ans->row_array();
		return $resultado;

	}

	public function infoEvento($id){
		$qry="SELECT * from evento where idevento=?;";
		$ans=$this->db->query($qry,$id);
		$resultado=$ans->row_array();
		return $resultado;
	}

	public function actualizarNombre($idevento,$nombre){
		$qry = "UPDATE evento SET nombre = ? WHERE idevento = ? ;";
        $this->db->query($qry,array($nombre,$idevento));
	}

	public function actualizarFecha($idevento,$fecha){
		$qry = "UPDATE evento SET fecha = ? WHERE idevento = ? ;";
        $this->db->query($qry,array($fecha,$idevento));
	}


	public function actualizarHora($idevento,$hora){
		$qry = "UPDATE evento SET hora = ? WHERE idevento = ? ;";
        $this->db->query($qry,array($hora,$idevento));
	}


	public function actualizarDuracion($idevento,$duracion){
		$qry = "UPDATE evento SET duracion = ? WHERE idevento = ? ;";
        $this->db->query($qry,array($duracion,$idevento));
	}


	public function actualizarLugar($idevento,$lugar){
		$qry = "UPDATE evento SET nombre_lugar= ? WHERE idevento = ? ;";
        $this->db->query($qry,array($lugar,$idevento));
	}

}


