<?php
    class verProyectosModel extends CI_Model{

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }


    public function proyectosPersona($mail){
    	$qry="SELECT  proyecto_nombre as nombre from proyecto_participantes as participantes ,proyecto where participantes.proyecto_nombre = proyecto.nombre and login_mail=? order by fecha_creacion;";

    	$ans=$this->db-> query($qry,$mail);
    	
        return $ans;
    }

    public function eventosFuturos($proyecto,$mail){
    	$fechaA = date("Y");
		$fechaA.="-";
		$fechaA.= date("m");
		$fechaA.="-";
		$fechaA.=date("d");
    	$qry="SELECT *
			FROM evento
			WHERE idevento
			IN (
				SELECT evento_idevento AS idevento
				FROM evento_participantes AS eventoP, proyecto_participantes AS proyecto
				WHERE eventoP.login_mail = proyecto.login_mail
				AND eventoP.login_mail = ?
				AND proyecto_nombre = ?
			) 
			AND evento.fecha > now()
			;";
		$ans=$this->db->query($qry,array($mail,$proyecto));
		return $ans;
    }


    public function eventosAnteriores($mail,$proyecto){
    	$qry="SELECT *
			FROM evento
			WHERE idevento
			IN (
				SELECT evento_idevento AS idevento
				FROM evento_participantes AS eventoP, proyecto_participantes AS proyecto
				WHERE eventoP.login_mail = proyecto.login_mail
				AND eventoP.login_mail = ?
				AND proyecto_nombre = ?
			) 
			AND evento.fecha < now()
			;";
		$ans=$this->db->query($qry,array($mail,$proyecto));
		return $ans;
    }
    public function evento_participantes($mail,$idevento){
    	$qry="SELECT * from evento_participantes where login_mail=? and evento_idevento=?;";
    	$ans=$this-> db -> query($qry,array($mail,$idevento));
    	return $ans->row_array();
    }


    public function proyectoSegunEvento($idevento){
    	$qry="SELECT * From proyecto where nombre in (SELECT proyecto_nombre as nombre from evento where idevento=?); ";
    	$ans=$this->db ->query($qry,$idevento);
    	return $ans->row_array();

    }
}
?>



