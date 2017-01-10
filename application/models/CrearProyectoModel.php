<?php
    class crearProyectoModel extends CI_Model{

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

    function crearProyecto($nombre, $creador, $tipo){
        $fecha = date("Y");
        $fecha.='-'.date("m");
        $fecha.='-'.date("d");

        $qry = "INSERT INTO proyecto VALUES(?,?,?,?);";

        $ingreso = $this -> db -> query($qry,array($nombre,$fecha,$creador,$tipo));
    }

    function añadirParticipante($proyecto,$participante){
        $qry = "INSERT INTO proyecto_participantes VALUES (?,?);";

        $añadir = $this -> db -> query($qry, array($proyecto,$participante));
    }
    function quitarParticipante($proyecto,$participante){
        $qry = "DELETE FROM proyecto_participantes 
            WHERE proyecto_nombre = ? AND 
                login_mail = ?;";
        $quitar = $this -> db -> query($qry, array($proyecto,$participante));
    }

    function informacionProyecto($nombre){
        $qry = "SELECT * FROM proyecto WHERE nombre = ?;";

        $ans = $this -> db -> query($qry,$nombre);
        return $ans -> row_array();
    }

    function listaParticipantes($proyecto){
        $qry = "SELECT * FROM login,proyecto_participantes 
                WHERE login.mail = proyecto_participantes.login_mail
                AND proyecto_participantes.proyecto_nombre = ? ;";

        $ans = $this -> db -> query($qry,$proyecto);
        return $ans; 
    }

    function noParticipantes($proyecto){
        $qry = "SELECT * FROM  login
                WHERE mail NOT IN
                (SELECT login_mail FROM proyecto_participantes
                 WHERE proyecto_nombre = ?)
                 ORDER BY tipo, nombre, apellido;";
        return $this -> db -> query($qry, $proyecto);
    }

    function noParticipantes_tipo($proyecto, $tipo){
        $qry = "SELECT * FROM login 
                WHERE mail NOT IN
                (SELECT login_mail FROM proyecto_participantes
                 WHERE proyecto_nombre = ?)
                 AND tipo = ?
                 ORDER BY nombre, apellido;";
        return $this -> db -> query($qry, array($proyecto,$tipo));
    }

    function listaArchivos($proyecto){
        $qry = "SELECT * FROM archivos_proyecto 
                WHERE nombre_proyecto = ?;";
        return $this -> db -> query($qry,$proyecto);        
    }

    function subirArchivo($ubicacion, $nombre_proyecto, $nombre_archivo, $creador, $descripcion){
        $fecha = date("Y");
        $fecha.='-'.date("m");
        $fecha.='-'.date("d");

        $qry = "INSERT INTO archivos_proyecto VALUES(?,?,?,?,?,?);";
        $this -> db -> query($qry,array($ubicacion,$nombre_proyecto,$nombre_archivo,$fecha,$creador,$descripcion));
    }

    function borrarArchivo($ubicacion_archivo, $nombre_proyecto){
        $qry = "DELETE FROM archivos_proyecto 
            WHERE ubicacion_archivo = ?
            AND nombre_proyecto = ?;";
        $this -> db -> query($qry, array($ubicacion_archivo, $nombre_proyecto));
        
    }


}

?>




