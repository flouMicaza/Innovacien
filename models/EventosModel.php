<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventosModel extends CI_Model
{
	
	public function __construct()
	{
		
		parent::__construct();
		
	}

	public function crearEvento($nombreEvento,$fecha,$hora,$duracion,$proyecto,$lugar){

		$qry="INSERT INTO evento(nombre,fecha,hora,duracion,proyecto_nombre,nombre_lugar) VALUES (?,?,?,?,?,?);";
		$this -> db -> query($qry,array($nombreEvento,$fecha,$hora,$duracion,$proyecto,$lugar));
		$quer="SELECT * from evento where idevento= (SELECT max(idevento) from evento);";
		$ans=$this->db->query($quer);
		$resultado=$ans->row_array();
		return $resultado;

	}

	public function infoEvento($id){
		$qry="SELECT * from evento where idevento=?;";
		$ans = $this -> db ->query($qry,$id);
		$resultado=$ans->row_array();
		return $resultado;
	}

	public function actualizarNombre($idevento,$nombre){
		$qry = "UPDATE evento SET nombre = ? WHERE idevento = ? ;";
        $this->db->query($qry,array($nombre,$idevento));
	}

	public function actualizarFecha($idevento,$fecha){
		$qry = "UPDATE evento SET fecha = ? WHERE idevento = ? ;";
        $this->db->query($qry,array($fecha,$idevento));
	}


	public function actualizarHora($idevento,$hora){
		$qry = "UPDATE evento SET hora = ? WHERE idevento = ? ;";
        $this->db->query($qry,array($hora,$idevento));
	}


	public function actualizarDuracion($idevento,$duracion){
		$qry = "UPDATE evento SET duracion = ? WHERE idevento = ? ;";
        $this->db->query($qry,array($duracion,$idevento));
	}


	public function actualizarLugar($idevento,$lugar){
		$qry = "UPDATE evento SET nombre_lugar= ? WHERE idevento = ? ;";
        $this->db->query($qry,array($lugar,$idevento));
	}



	public function cambiarPasaAsistencia($idevento,$mail){
		$qry="UPDATE evento_participantes SET pasaAsistencia=1 where login_mail=? and evento_idevento=?;";
		$this->db->query($qry,array($mail,$idevento));

	}

	public function cambiarNoPasaAsistencia($idevento,$mail){
		$qry="UPDATE evento_participantes SET pasaAsistencia=0 where login_mail=? and evento_idevento=?;";
		$this->db->query($qry,array($mail,$idevento));

	}

	public function subirFoto($ubicacion, $idEvento, $autor){
		$fecha = date("Y");
        $fecha.='-'.date("m");
        $fecha.='-'.date("d");

        $qry = "INSERT INTO imagenes_evento VALUES(?,?,?,?);";
        $this -> db -> query($qry, array($ubicacion,$idEvento,$autor,$fecha));
	}

	public function listaFotos($idEvento){
		$qry = "SELECT * FROM imagenes_evento WHERE evento_idEvento = ? ORDER BY fecha_subida;";
		return $this -> db -> query($qry, $idEvento);
	}

	public function borrarFoto($ubicacion,$idEvento){
		$qry = "DELETE FROM imagenes_evento 
			WHERE evento_idEvento = ? AND ubicacion = ?;";
		$this -> db -> query ($qry, array($idEvento,$ubicacion));
	}

	public function listaParticipantes($idEvento){
		$qry = "SELECT * FROM evento_participantes WHERE evento_idEvento = ?;";
		return $this -> db -> query($qry, $idEvento);
	}



	public function agregarParticipante($idEvento, $mail, $pago){
		$qry = "INSERT INTO evento_participantes (login_mail,evento_idEvento,pago) VALUES (?,?,?);";
		$this -> db -> query($qry, array($mail,$idEvento,$pago));
	}

	public function listaParticipantes2($idEvento){
		$qry = "SELECT * FROM login, evento_participantes WHERE login.mail IN
		(SELECT login_mail AS mail FROM evento_participantes WHERE evento_idEvento = ?) AND login.mail = evento_participantes.login_mail AND evento_participantes.evento_idEvento = ?
			GROUP BY mail ORDER BY nombre;";
		return $this -> db -> query($qry, array($idEvento,$idEvento));
	}

	public function quitarParticipante($idEvento,$mail){
		$qry = "DELETE FROM evento_participantes WHERE evento_idEvento = ? AND login_mail = ?;";
		$this -> db -> query($qry, array($idEvento,$mail));
	}

	public function candidatosParticipantes($idEvento){
		$qry = "SELECT * FROM login WHERE mail IN (SELECT login_mail FROM proyecto_participantes where login_mail NOT IN (SELECT login_mail AS mail FROM evento_participantes WHERE evento_idevento = ?) AND proyecto_nombre = (SELECT proyecto_nombre FROM evento WHERE idevento = ?))
			ORDER BY tipo, nombre, apellido;";
					
		return $this -> db -> query ($qry, array($idEvento,$idEvento));
	}
	public function candidatosParticipantesTipo($idEvento,$tipo){
		$qry = "SELECT * FROM login WHERE mail IN (SELECT login_mail FROM proyecto_participantes where login_mail NOT IN (SELECT login_mail AS mail FROM evento_participantes WHERE evento_idevento = ?) AND proyecto_nombre = (SELECT proyecto_nombre FROM evento WHERE idevento = ?))
			AND tipo = ?
			ORDER BY tipo, nombre, apellido;";
			
		return $this -> db -> query ($qry, array($idEvento,$idEvento,$tipo));
	}

	public function candidatosParticipantes2($idEvento){
		$qry = "SELECT * FROM login WHERE 
			mail NOT IN
				(SELECT login_mail AS mail FROM evento_participantes WHERE evento_idevento = ?)
			ORDER BY tipo, nombre, apellido;";
		return $this -> db -> query($qry, $idEvento);
	}

	public function actualizarAsistencia($mail,$idevento,$asistencia){
		$qry="UPDATE evento_participantes SET asistencia = '1' WHERE evento_idevento = ? and login_mail=?;";

		$this -> db ->query($qry,array($idevento,$mail));
	}

	public function eventosFuturos($mail){
		$qry = "SELECT * FROM evento WHERE idevento IN
			(SELECT evento_idEvento AS idevento FROM evento_participantes
			WHERE login_mail = ?)
			AND fecha >= now()
			ORDER BY fecha;";
		return $this -> db ->query($qry, array($mail));
	}
	public function eventosPasados($mail){
		$qry = "SELECT * FROM evento WHERE idevento IN
			(SELECT evento_idEvento AS idevento FROM evento_participantes
			WHERE login_mail = ?)
			AND fecha < now()
			ORDER BY fecha;";
		return $this -> db ->query($qry, array($mail));
	}

	public function guardarComentario($mail,$comentario,$idevento){
		$qry="UPDATE evento_participantes SET comentarios = ? WHERE login_mail=? AND evento_idevento=?;";
		$this->db->query($qry,array($comentario,$mail,$idevento));
	}


	public function ponerAlumno($idevento,$nombreAlumno){
		$qry="INSERT INTO lista_alumnos (nombre_alumno,evento_idevento) VALUES (?,?);";
		$this->db->query($qry,array($nombreAlumno,$idevento));

	}

	public function borrarAsistente($idevento,$nombreAlumno){
		$qry="DELETE FROM lista_alumnos WHERE nombre_alumno=? and evento_idevento=?;";
		$this->db->query($qry,array($nombreAlumno,$idevento));


	}

	public function actualizarMonto($idEvento,$mail,$monto){
		$qry ="UPDATE evento_participantes SET pago = ?
			WHERE login_mail = ? AND evento_idevento = ?;";
		$this -> db -> query($qry, array($monto,$mail,$idEvento));
	}

	public function verAlumnos($idevento){
		$qry="SELECT nombre_alumno FROM lista_alumnos WHERE evento_idevento = ?;";
		$ans=$this-> db -> query($qry,$idevento);
		
		return $ans;
	}

	public function infoEventoParticipante($idEvento,$mail){
		$qry = "SELECT * FROM evento_participantes WHERE login_mail = ? AND evento_idevento = ?;";
		$ans = $this -> db -> query($qry,array($mail,$idEvento));
		return $ans->row_array();
	}
	public function confirmarAsistencia($idEvento,$mail_usr){
		$qry="UPDATE evento_participantes SET asistencia = 1 WHERE evento_idevento = ? and login_mail=?;";

		$this -> db ->query($qry,array($idEvento,$mail_usr));
	}

	public function negarAsistencia($idEvento,$mail_usr){
		$qry="UPDATE evento_participantes SET asistencia = 0 WHERE evento_idevento = ? and login_mail=?;";

		$this -> db ->query($qry,array($idEvento,$mail_usr));
	}
		

	public function ingresarPago($mail_monitor,$idEvento,$comentarios,$monto){
		$fecha = date("Y");
        $fecha.='-'.date("m");
        $fecha.='-'.date("d");

        $qry = "INSERT INTO pago(mail_monitor,idevento,comentarios,monto,fecha) VALUES (?,?,?,?,?)
        	on duplicate key update monto = ?;";

        $this -> db -> query($qry, array($mail_monitor,$idEvento,$comentarios,$monto,$fecha,$monto));
	}

	public function quitarPago($mail_monitor, $idEvento){
		$qry = "DELETE FROM pago WHERE idevento = ? AND mail_monitor = ?;";
		$this -> db -> query($qry, array($idEvento,$mail_monitor));
	}

	
}


