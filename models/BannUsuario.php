<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BannUsuario extends CI_Model
{
	
	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function activar($mail){

		$qry = 'UPDATE login SET activo = 1 WHERE mail = ? ;';

		$query = $this -> db -> query($qry,$mail);

	}
	public function desactivar($mail){
		$qry = 'UPDATE login SET activo = 0 WHERE mail = ? ;';

		$query = $this -> db -> query($qry,$mail);
	}

	
}
