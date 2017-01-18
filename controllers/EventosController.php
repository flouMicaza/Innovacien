<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventosController extends CI_Controller {

	public function irEventos(){
		$data['nombre_p']=$_GET['proyectoNombre'];
		$nombrecito=$data['nombre_p'];
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$this-> load -> model('crearProyectoFlo');
		$datos=$this-> crearProyectoFlo ->verEventos($nombrecito);
		$data['qry']=$datos;
		$this->load->view('eventosProyecto',$data);
	}

	public function irInfoEvento(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$idEvento = $_GET['evento'];
		

		$this-> load -> model('eventosModel');
		$datos=$this-> eventosModel ->infoEvento($idEvento);

		$data['idEvento']= $datos['idevento'];
		$data['nombre'] = $datos['nombre'];
		$data['fecha'] = $datos['fecha'];
		$data['hora'] = $datos['hora'];
		$data['duracion'] = $datos['duracion'];
		$data['lugar']=$datos['nombre_lugar'];
		$data['nombre_proyecto'] =$datos['proyecto_nombre'];
		
		$data['participantes']=$this -> eventosModel->listaParticipantes2($idEvento);
		
		if($data['tipo']!='administrador'){
			$data['datos_evento'] = $this->eventosModel->infoEventoParticipante($idEvento,$data['mail']);
			
			$this->load->view('infoEventoGente',$data);
		}

		else{
			$this->load->view('infoEvento',$data);
		}
	}


	public function irCrearEvento(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['proyecto']=$_POST['proyecto'];
		
		$this->load->model('lugaresModel');
		$lugares=$this->lugaresModel->verLugares();
		/*lista nombres de lugares*/
		$data['lugares']=$lugares;


		$this->load->view('crearEvento',$data);
	}

	public function crearEvento(){
		$nombreEvento= $_POST['nombreEvento'];
		$nombreProyecto=$_POST['proyecto'];
		$fecha= $_POST['fecha'];
		$hora = $_POST['hora'];
		$duracion=$_POST['duracion'];
		$lugar=$_POST['lugar'];

		



		$data['mail'] = $this -> session -> userdata('mail');

		 /*llama al modelo que va a crear evento y devuelve el correo del mismo*/
		$this->load->model('eventosModel');
		

		/*creamos el evento*/
		$eventoCreado= $this ->eventosModel-> crearEvento($nombreEvento,$fecha,$hora,$duracion,$nombreProyecto,$lugar); 
		
		
		$data['nombreU'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
	;

		$data['idEvento']=$eventoCreado['idevento'];
		$data['nombre']=$eventoCreado['nombre'];

		$data['fecha'] = $eventoCreado['fecha'];
		$data['hora'] = $eventoCreado['hora'];
		$data['duracion'] = $eventoCreado['duracion'];
		$data['lugar']=$eventoCreado['nombre_lugar'];
		$data['nombre_proyecto']=$nombreProyecto;
		$dir = $_SERVER['DOCUMENT_ROOT'].'/proyectos/'.$nombreProyecto.'/eventos/'.$data['idEvento'];
		mkdir($dir,0777);
		$dir.='/fotos';
		mkdir($dir,0777);

		$this-> load -> view('infoEvento',$data);
		

	}

	public function cargarModificarEvento(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['idevento']=$_POST['evento'];
		$this->load->model('eventosModel');
		$datos=$this->eventosModel->infoEvento($data['idevento']);
		$this->load->model('lugaresModel');
		$lugares=$this->lugaresModel->verLugares();
		$data['nombre']=$datos['nombre'];

		$data['fecha'] = $datos['fecha'];
		$data['hora'] = $datos['hora'];
		$data['duracion'] = $datos['duracion'];
		$data['lugar']=$datos['nombre_lugar'];
		$data['nombre_proyecto']=$datos['proyecto_nombre'];


		/*lista nombres de lugares*/
		$data['lugares']=$lugares;


		$this->load->view('modificarEvento',$data);
	}

	public function actualizarEvento(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$nombre=$_POST['nombre'];
		$fecha=$_POST['fecha'];
		$hora=$_POST['hora'];
		$duracion=$_POST['duracion'];
		$lugar=$_POST['lugar'];
		$idEvento=$_POST['idEvento'];

		$this->load->model('eventosModel');
		if($nombre!=null){
			$this->eventosModel->actualizarNombre($idEvento,$nombre);
		}

		if($fecha!=null){
			$this->eventosModel->actualizarFecha($idEvento,$fecha);
		}
		
		if($hora!=null){
			$this->eventosModel->actualizarHora($idEvento,$hora);
		}
		if($duracion!=null){
			$this->eventosModel->actualizarDuracion($idEvento,$duracion);
		}
		if($lugar!=null){
			$this->eventosModel->actualizarLugar($idEvento,$lugar);
		}

		$datos=$this->eventosModel->infoEvento($idEvento);
		$data['idEvento']=$datos['idevento'];
		$data['nombre']=$datos['nombre'];
		$data['fecha'] = $datos['fecha'];
		$data['hora'] = $datos['hora'];
		$data['duracion'] = $datos['duracion'];
		$data['lugar']=$datos['nombre_lugar'];
		$data['nombre_proyecto']=$datos['proyecto_nombre'];
		$this->load->view('infoEvento',$data);

		
	}
	public function listaFotos(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$idEvento = $_POST['idEvento'];
		$nombre_evento = $_POST['nombre_evento'];
		$data['nombre_proyecto'] =$nombre_proyecto;
		$data['idEvento'] = $idEvento;
		$data['nombre_evento'] = $nombre_evento;

		$this -> load -> model('eventosModel');
		$data['qry'] = $this -> eventosModel -> listaFotos($idEvento);
		$data['mensaje'] = null;
		$this -> load -> view('listaFotos_evento',$data);

	}


	public function subirFoto(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$idEvento = $_POST['idEvento'];
		$nombre_evento = $_POST['nombre_evento'];
		$data['nombre_proyecto'] =$nombre_proyecto;
		$data['idEvento'] = $idEvento;
		$data['nombre_evento'] = $nombre_evento;

		$dir = '/proyectos/'.$nombre_proyecto.'/eventos/'.$idEvento.'/fotos/';
		$fichero = $_SERVER['DOCUMENT_ROOT'].$dir.basename($_FILES['imagen']['name']);

		if(move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero)){
			$this -> load -> model('eventosModel');
			$ubicacion = $dir.basename($_FILES['imagen']['name']);
			$this -> eventosModel -> subirFoto($ubicacion,$idEvento,$data['mail']);
			$data['qry'] = $this -> eventosModel -> listaFotos($idEvento);
			$data['mensaje'] = null;
			$this -> load -> view('listaFotos_evento',$data);
		}
		else{
			$this -> load -> model('eventosModel');
			$data['qry'] = $this -> eventosModel -> listaFotos($idEvento);
			$data['mensaje'] = "error al subir foto";
			$this -> load -> view('listaFotos_evento',$data);
		}

	}

	public function borrarFoto(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$idEvento = $_POST['idEvento'];
		$nombre_evento = $_POST['nombre_evento'];
		$data['nombre_proyecto'] =$nombre_proyecto;
		$data['idEvento'] = $idEvento;
		$data['nombre_evento'] = $nombre_evento;
		$ubicacion = $_POST['ubicacion'];
		$directorio =$_SERVER['DOCUMENT_ROOT'].$ubicacion;

		if(unlink($directorio)){
			$this -> load -> model('eventosModel');
			$this -> eventosModel -> borrarFoto($ubicacion,$idEvento);
			$data['qry'] = $this -> eventosModel -> listaFotos($idEvento);
			$data['mensaje'] = null;
			$this -> load -> view('listaFotos_evento',$data);
		}
		else{
			$this -> load -> model('eventosModel');
			$data['qry'] = $this -> eventosModel -> listaFotos($idEvento);
			$data['mensaje'] = "error al borrar foto";
			$this -> load -> view('listaFotos_evento',$data);

		}


	}

	public function eventosAnteriores(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');
		$data['nombre_p']=$_GET['nombre_p'];
		$this->load->model('eventosModel');
		$eventosAnteriores=$this->eventosModel->eventosPasados($data['mail']);
		$data['eventosAnteriores']=$eventosAnteriores;
		$this->load->view('eventosAnteriores',$data);
	}

	public function verEventoAnterior(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');
		$data['idevento']=$_GET['evento'];
		$data['nombre']=$_GET['nombre'];
		$data['respondido']='no'; //para saber si cargar la pagina de la asistencia o la pagina con la asistencia ya pasada.
		$this->load->view('infoEventoAnterior',$data);
	}

	public function actualizarAsistencia(){
		$asistencia=$_POST['asistencia'];

		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');
		$data['idevento']=$_POST['idevento'];
		$data['nombre']=$_POST['nombre'];
		if($asistencia=='si'){
			$this->load->model('eventosModel');
			$this->eventosModel->actualizarAsistencia($data['mail'],$data['idevento']);
			$data['respondido']='si';
			$this->load ->model('verProyectosModel');
			$datosProyecto=$this->verProyectosModel->proyectoSegunEvento($data['idevento'])	;
			$data['datosProyecto']=$datosProyecto;	
			$this->load->view('infoEventoAnterior',$data);
		}

		else{
			$this->load->view("Inicio",$data);
		}
	}




	public function actualizarFuturaAsistencia(){
		$asistencia=$_POST['asistencia'];
		$nombreEvento=$_POST['nombreEvento'];
		$idEvento=$_POST['idEvento'];

		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');
		$data['nombre']=$this -> session -> userdata('nombre');
		$this-> load -> model('eventosModel');
			$datos=$this-> eventosModel ->infoEvento($idEvento);

			$data['idEvento']= $datos['idevento'];
			$data['nombre'] = $datos['nombre'];
			$data['fecha'] = $datos['fecha'];
			$data['hora'] = $datos['hora'];
			$data['duracion'] = $datos['duracion'];
			$data['lugar']=$datos['nombre_lugar'];
			$data['nombre_proyecto'] =$datos['proyecto_nombre'];

		$datos_evento = $this->eventosModel->infoEventoParticipante($idEvento,$data['mail']);


		if($asistencia == 'si'){
			if($datos_evento['asistencia'] != 1){
			$this -> eventosModel -> confirmarAsistencia($idEvento,$data['mail']);
			$comentario = 'Pago de $'.$datos_evento['pago'].' por el evento '.$datos['nombre'].' id '.$datos['idevento'].' correspondiente al dia '.$data['fecha'];
			$this -> eventosModel -> ingresarPago($data['mail'],$idEvento,$comentario,$datos_evento['pago']);
			$datos_evento = $this->eventosModel->infoEventoParticipante($idEvento,$data['mail']);
			}
			
		}
		if ($asistencia == 'no'){
			if($datos_evento['asistencia'] != 0){
				$this -> eventosModel -> quitarPago($data['mail'],$idEvento);
			}
			$this -> eventosModel -> negarAsistencia($idEvento,$data['mail']);
			$datos_evento = $this->eventosModel->infoEventoParticipante($idEvento,$data['mail']);
		}
		
		
			/*/$mensaje= "La persona: ".$data['nombre'];
			$mensaje.=$asistencia." "."asistirá al evento ";
			$mensaje.=$nombre;
			$titulo = "Asistencia a evento";
			//cabecera
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			//dirección del remitente 
			$headers .= "From: Asistencia - Innovacien <";
			$headers.=$data['mail']." >\r\n";
			//Enviamos el mensaje a tu_dirección_email 
			$bool = mail("flo.mirandai@gmail.com","Asistencia Evento",$mensaje,$headers);/*/

			
			
			$data['datos_evento'] = $datos_evento;
			
			
		$this->load->view('infoEventoGente',$data);
	}
}