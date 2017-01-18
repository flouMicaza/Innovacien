<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocompletado extends CI_Model
{
	
	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function buscador()
	{
		//usamos after para decir que empiece a buscar por
		//el principio de la cadena
		//ej SELECT mail from login 
		//WHERE mail LIKE '%$abuscar' limit 4


		$qry = 'SELECT * FROM login ;';

		$query = $this -> db -> query($qry);

		return $query;	
	}
	
}
/*
 * end application/models/autocompletado_model.php
 */