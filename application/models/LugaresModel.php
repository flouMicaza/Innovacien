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




}