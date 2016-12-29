<?php
	class Ingreso extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

    function ingreso($mail,$pass){

		$sql = "SELECT * FROM login WHERE mail =? AND contraseña =?";
		$qry = $this->db->query($sql,array($mail,$pass));
		$resultado = $qry->row_array();

		if($resultado!=null){
			return $resultado;
        }
        else{
        	return null;
        }
    }


}

?>




