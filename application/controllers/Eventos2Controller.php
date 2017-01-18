<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos2Controller extends CI_Controller {

	public function guardarComentario(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');	
		$data['nombre'] = $this -> session ->userdata('nombre');
		$idEvento = $_POST['idEvento'];
		$comentario= $_POST['comentarioClase'];

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

	public function verAsistencia(){
		/**if("puede editar asistenciaaaa"){
			$this->load->view('marcarAsistencia',$data);
		}
		else{**/
			$data['tipo'] = $this -> session -> userdata('tipo');

			$this->load->view("terminoEvento",$data);
		/**}**/
	}

	public function irSubirListaAsistencia(){
		$data['idevento']=$_POST['idEvento'];
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');	

		$this->load->view('crearListaAsistencia',$data);

	}



	public function subirListaAsistencia(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');	
		$data['idevento']=$_POST['idevento'];
		$nombreAlumno=$_POST['nombreAlumno'];
		$this->load->model('eventosModel');
		$this->eventosModel->ponerAlumno($data['idevento'],$nombreAlumno);

		$this->load->view('crearListaAsistencia',$data);


	}


	public function mostrarListaAsistencia(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['mail'] = $this -> session -> userdata('mail');	
		$data['idevento']=$_POST['idevento'];

		$this->load->model('eventosModel');
		$listaALumnos=$this->eventosModel->verAlumnos($data['idevento']);
		$data['listaAlumnos']=$listaALumnos;

		$this->load->view('verListaAsistencia',$data);
	}

	public function descargarMaterial(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$data['mensaje'] = null;

		$idEvento=$_POST['idEvento'];
		$this->load->model('verProyectosModel');
		$infoProyecto=$this->verProyectosModel->proyectoSegunEvento($idEvento);
		$nombre_proyecto=$infoProyecto['nombre'];




		$data['nombre_proyecto'] = $nombre_proyecto;

		$this -> load -> model('crearProyectoModel');
		$data['qry'] = $this -> crearProyectoModel -> listaArchivos($nombre_proyecto);

		$this -> load -> view('listaArchivos_proyecto', $data);
	}

}
