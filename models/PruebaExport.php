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
        $query = "SELECT * FROM login where tipo = 'profesor';";
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
        $query = "SELECT * FROM login where tipo = 'emprendedor' ;";
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
        $query = "SELECT * FROM login;";
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
        $query = "SELECT * FROM login, datos_monitor WHERE tipo = 'monitor' AND login.mail = datos_monitor.mail";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filenameM, $data);
    }


}

?>

