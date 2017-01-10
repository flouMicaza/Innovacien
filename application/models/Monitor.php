<?php
	class Monitor extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    function crearDatos($mail){
        $qry = "INSERT INTO datos_monitor (mail) VALUES(?);";
        $this -> db -> query($qry,$mail);
    }

    function datosMonitor($mail){
        $qry = "SELECT * FROM datos_monitor WHERE mail = ?;";
        $res = $this -> db -> query($qry, $mail);
        return $res -> row_array();
    }

    function actualizarTelefono($mail,$telefono){
        $qry = "UPDATE login SET fono = ? WHERE mail = ? ;";
        $this->db->query($qry,array($telefono,$mail));
    }

    function actualizarRut($mail,$rutN){
        $qry = "UPDATE login SET rut = ? WHERE mail = ? ;";
        $this->db->query($qry,array($rutN,$mail));
    }

    function actualizarBanco($mail, $banco){
        $qry = "UPDATE datos_monitor SET banco = ? WHERE mail =?;";
        $this -> db -> query($qry, array($banco, $mail));
    }
    function actualizarTipoCuenta($mail, $tipo_cuenta){
        $qry = "UPDATE datos_monitor SET tipo_cuenta = ? WHERE mail = ?;";
        $this -> db -> query($qry, array($tipo_cuenta,$mail));
    }
    function actualizarNumCuenta($mail,$num_cuenta){
        $qry = "UPDATE datos_monitor SET num_cuenta = ? WHERE mail = ? ;";
        $this -> db -> query($qry, array($num_cuenta,$mail));
    }
}

?>




