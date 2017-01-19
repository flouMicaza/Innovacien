<?php
	class SeguridadModel extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

    public function personaEnEvento($mail,$idevento){
    	$qry="SELECT * FROM evento_participantes where login_mail=? AND evento_idevento=? ;";
    	$ans=$this->db->query($qry,array($mail,$idevento));
    	return $ans->row_array();
    }

    public function personaEnProyecto($mail,$nombreP){
    	$qry="SELECT * FROM proyecto_participantes WhERE proyecto_nombre=? AND login_mail=?;";
    	$ans=$this->db->query($qry,array($nombreP,$mail));
    	return $ans->row_array();
    }
}