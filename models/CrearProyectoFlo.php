<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CrearProyectoFlo extends CI_Model
{
	
	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function verProyectos(){

		$qry = 'SELECT * FROM proyecto';

		$query = $this -> db -> query($qry);
		return $query;
	}

	public function verUnProyecto($nombre){
		$qry= 'SELECT * FROM proyecto where nombre=?;';
		$ans= $this->db->query($qry,$nombre);
		$resultado = $ans->row_array();
		return $resultado;
	}

	public function verEventos($nombre_p){
		$qry= 'SELECT * FROM evento where proyecto_nombre=?;';
		$ans= $this-> db -> query($qry,$nombre_p);
		return $ans;
	}

	public function verUnEvento($id){
		$qry= 'SELECT * FROM evento where idevento=?;';
		$ans= $this->db->query($qry,$id);
		$resultado = $ans->row_array();
		return $resultado;
	}

	
}
