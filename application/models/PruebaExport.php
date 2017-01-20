<?php
	class PruebaExport extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

    
    function exportarProfesor(){
        $this->load->dbutil(); 
        $this->load->helper('file'); 

        $this->load->helper('download');
        $delimiter = ","; 
        $newline = "\r\n";
        $filenameP = "profesores.csv";  
        $query = "SELECT mail,nombre,apellido,rut,fono,tipo FROM login where tipo = 'profesor';";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filenameP, $data);
    }


    function exportarEmprendedor(){
        $this->load->dbutil(); 
        $this->load->helper('file'); 

        $this->load->helper('download');
        $delimiter = ","; 
        $newline = "\r\n";
        $filenameE = "emprendedores.csv";  
        $query = "SELECT mail,nombre,apellido,rut,fono,tipo FROM login where tipo = 'emprendedor' ;";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filenameE, $data);
    }


    function exportarTodos(){
        $this->load->dbutil(); 
        $this->load->helper('file'); 

        $this->load->helper('download');
        $delimiter = ","; 
        $newline = "\r\n";
        $filenameE = "cuentas.csv";  
        $query = "SELECT mail,nombre,apellido,rut,tipo,fono FROM login;";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filenameE, $data);
    }

    
    function exportarMonitor(){
        $this->load->dbutil(); 
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ","; 
        $newline = "\r\n";
        $filenameM = "monitores.csv";  
        $query = "SELECT login.mail,login.nombre,login.apellido,login.fono,login.rut,login.tipo, datos_monitor.banco, datos_monitor.tipo_cuenta,datos_monitor.num_cuenta FROM login, datos_monitor WHERE login.tipo = 'monitor' AND login.mail = datos_monitor.mail";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filenameM, $data);
    }


    public function exportarListaAsistentes($idevento,$nombre){
        $this->load->dbutil(); 
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ","; 
        $newline = "\r\n";
        $filenameM = "asistentes".$nombre.".csv";  
        $query = "SELECT nombre_alumno FROM lista_alumnos";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filenameM, $data);
    }

    public function fotografiasPorProyecto($nombre_proyecto){
        $qry = "SELECT * FROM imagenes_evento WHERE evento_idevento IN
            (SELECT idevento FROM evento WHERE proyecto_nombre = ?)
            ORDER BY fecha_subida DESC;";
        return $this -> db -> query($qry,$nombre_proyecto);
    }

    public function exportarFechas($nombre_proyecto,$fechaI,$fechaF){

        $this->load->dbutil(); 
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ","; 
        $newline = "\r\n";
        $filenameM = "asistentes entre".$fechaI."y".$fechaF.".csv";  
        $query ="SELECT DISTINCT lista_alumnos.nombre_alumno AS 'nombre_alumno', evento.nombre AS 'evento', evento.idevento
            FROM lista_alumnos, evento
            WHERE lista_alumnos.evento_idevento=evento.idevento AND lista_alumnos.evento_idevento
            IN (

                SELECT idevento AS 'evento_idevento'
                FROM evento
                WHERE proyecto_nombre = ?
                AND DATE(fecha) BETWEEN ? AND ? or DATE(fecha)=? or DATE(fecha) = ?
                )
            GROUP BY nombre_alumno ORDER BY idevento" ;
        $result = $this->db->query($query,array($nombre_proyecto,$fechaI,$fechaF,$fechaI,$fechaF));
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filenameM, $data);
    }


}

?>

