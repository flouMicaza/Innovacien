<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos2Controller extends CI_Controller {

	public function guardarComentario(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');	
		$data['nombre'] = $this -> session ->userdata('nombre');
		$idEvento = $_POST['idEvento'];
		$comentario= $_POST['comentarioClase'];


		$this->load->model('seguridadModel');
		$ans=$this->seguridadModel->personaEnEvento($data['mail'],$idEvento);
		if($ans==null){
			$this->load->view('infiltrado',$data);
			return;
		}

		else{
			$this->load->model('eventosModel');
			$this->eventosModel->guardarComentario($data['mail'],$comentario,$idEvento);

			////////aqui el comentario esta listo.. ahora preparamos las fotos/////
			
			$nombre_proyecto = $_POST['nombre_proyecto'];
		
			$nombre_evento = $_POST['nombre_evento'];
			$data['nombre_proyecto'] =$nombre_proyecto;
			$data['idEvento'] = $idEvento;
			$data['nombre_evento'] = $nombre_evento;

			$this -> load -> model('eventosModel');
			$data['qry'] = $this -> eventosModel -> listaFotos($idEvento);
			$data['mensaje'] = null;
			$this -> load -> view('listaFotos_evento',$data);
		}
	}

	public function verAsistencia(){

		$data['tipo'] = $this -> session -> userdata('tipo');

		$this->load->view("terminoEvento",$data);
	}

	public function irSubirListaAsistencia(){
		$data['idevento']=$_GET['idEvento'];
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');

		$this->load->model('seguridadModel');
		$ans=$this->seguridadModel->personaEnEvento($data['mail'],$data['idevento']);
		if($ans!=null || $data['tipo']=='administrador'){

			$this->load->model('eventosModel');


			$listaAlumnos=$this->eventosModel->verAlumnos($data['idevento']);
			$data['listaAlumnos']=$listaAlumnos;

			$this->load->view('crearListaAsistencia',$data);
		}

		else{
			$this->load->view('infiltrado',$data);
			return;

			

		}

	}

	public function subirListaAsistencia(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');	
		$data['idevento']=$_POST['idevento'];
		$nombreAlumno=$_POST['nombreAlumno'];

		$this->load->model('seguridadModel');
		$ans=$this->seguridadModel->personaEnEvento($data['mail'],$data['idevento']);
		if($ans!=null || $data['tipo']=='administrador'){
			$this->load->model('eventosModel');
			$this->eventosModel->ponerAlumno($data['idevento'],$nombreAlumno);
			$listaAlumnos=$this->eventosModel->verAlumnos($data['idevento']);
			$data['listaAlumnos']=$listaAlumnos;

			$this->load->view('crearListaAsistencia',$data);
			
		}

		else{

			$this->load->view('infiltrado',$data);
			return;
		}

	}

	public function mostrarListaAsistencia(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');	
		$data['idevento']=$_GET['idevento'];

		$this->load->model('seguridadModel');
		$ans=$this->seguridadModel->personaEnEvento($data['mail'],$data['idevento']);
		if($ans!=null || $data['tipo']=='administrador'){
			$this->load->model('eventosModel');
			$listaALumnos=$this->eventosModel->verAlumnos($data['idevento']);
			$data['listaAlumnos']=$listaALumnos;

			$this->load->view('verListaAsistencia',$data);
		}

		else{
			$this->load->view('infiltrado',$data);
			return;
			
		}
	}

	public function borrarAsistente(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');	
		$data['idevento']=$_POST['idevento'];
		$data['nombreAsistente']=$_POST['nombreAsistente'];

		$this->load->model('seguridadModel');
		$ans=$this->seguridadModel->personaEnEvento($data['mail'],$data['idevento']);
		if($ans!=null || $data['tipo']=='administrador'){

			$this->load->model('eventosModel');
			$this->eventosModel->borrarAsistente($data['idevento'],$data['nombreAsistente']);
			$listaALumnos=$this->eventosModel->verAlumnos($data['idevento']);
			$data['listaAlumnos']=$listaALumnos;

			$this->load->view('crearListaAsistencia',$data);
	
		}

		else{
			$this->load->view('infiltrado',$data);
			return;
		}
	}

	public function cambiarPasaAsistencia(){
		$data['tipo'] = $this -> session -> userdata('tipo');


		$idEvento = $_POST['idevento'];
		$mail=$_POST['mail'];

		$this-> load -> model('eventosModel');		
		$this->eventosModel->cambiarPasaAsistencia($idEvento,$mail);


		$datos=$this-> eventosModel ->infoEvento($idEvento);
		$data['idEvento']= $datos['idevento'];
		$data['nombre'] = $datos['nombre'];
		$data['fecha'] = $datos['fecha'];
		$data['hora'] = $datos['hora'];
		$data['duracion'] = $datos['duracion'];
		$data['lugar']=$datos['nombre_lugar'];
		$data['nombre_proyecto'] =$datos['proyecto_nombre'];
		
		$data['participantes']=$this -> eventosModel->listaParticipantes2($idEvento);
		
		$this->load->view('infoEvento',$data);

	}

	public function cambiarNoPasaAsistencia(){
		$data['tipo'] = $this -> session -> userdata('tipo');


		$idEvento = $_POST['idevento'];
		$mail=$_POST['mail'];

		$this-> load -> model('eventosModel');		
		$this->eventosModel->cambiarNoPasaAsistencia($idEvento,$mail);


		$datos=$this-> eventosModel ->infoEvento($idEvento);
		$data['idEvento']= $datos['idevento'];
		$data['nombre'] = $datos['nombre'];
		$data['fecha'] = $datos['fecha'];
		$data['hora'] = $datos['hora'];
		$data['duracion'] = $datos['duracion'];
		$data['lugar']=$datos['nombre_lugar'];
		$data['nombre_proyecto'] =$datos['proyecto_nombre'];
		
		$data['participantes']=$this -> eventosModel->listaParticipantes2($idEvento);
		
		$this->load->view('infoEvento',$data);

	}

	public function descargarMaterial(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$data['mensaje'] = null;

		$idEvento=$_GET['idEvento'];

		$this->load->model('seguridadModel');
		$ans=$this->seguridadModel->personaEnEvento($data['mail'],$idEvento);
		if($ans!=null || $data['tipo']=='administrador'){
			
			$this->load->model('verProyectosModel');
			$infoProyecto=$this->verProyectosModel->proyectoSegunEvento($idEvento);
			$nombre_proyecto=$infoProyecto['nombre'];




			$data['nombre_proyecto'] = $nombre_proyecto;

			$this -> load -> model('crearProyectoModel');
			$data['qry'] = $this -> crearProyectoModel -> listaArchivos($nombre_proyecto);

			$this -> load -> view('listaArchivos_proyecto', $data);
		}

		else{
			$this->load->view('infiltrado',$data);
			return;

		}
	}

}
