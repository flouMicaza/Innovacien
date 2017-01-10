<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventosController extends CI_Controller {

	public function irEventos(){
		$data['nombre_p']=$_POST['proyectoNombre'];
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
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$idEvento = $_POST['evento'];
		$this-> load -> model('eventosModel');
		$datos=$this-> eventosModel ->infoEvento($idEvento);

		$data['idEvento']= $datos['idevento'];
		$data['nombre'] = $datos['nombre'];
		$data['fecha'] = $datos['fecha'];
		$data['hora'] = $datos['hora'];
		$data['duracion'] = $datos['duracion'];
		$data['lugar']=$datos['nombre_lugar'];

		$this->load->view('infoEvento',$data);

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

		$this->load->view('infoEvento',$data);

		
	}

	
}