<?php
	class ListaUsuarios extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

    function todos(){
        $qry = "SELECT * FROM login ORDER BY tipo, nombre, apellido;";
        $ans = $this -> db -> query($qry);
        return $ans;    
    }

    function porTipo($tipo){
        $qry = "SELECT * FROM login WHERE tipo = ? ORDER BY nombre, apellido;";
        $ans = $this -> db -> query($qry, $tipo);
        return $ans;
    }



}

?>




