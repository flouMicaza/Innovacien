<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DescargasController extends CI_Controller {

	public function descargar(){
		$tabla = $_POST['tabla'];


		if($tabla=="emprendedor"){
			$this->load->model('pruebaExport');
			$this->pruebaExport->exportarEmprendedor();	
		}

	
		else if($tabla=="profesor"){
			$this->load->model('pruebaExport');
			$this->pruebaExport->exportarProfesor();	
		}

		else if($tabla=="monitor"){
			$this->load->model('pruebaExport');
			$this->pruebaExport->exportarMonitor();	
		}

		else{
			$this->load->model('pruebaExport');
			$this->pruebaExport->exportarTodos();	
		}

	}

	public function descargarLista(){
		$idevento=$_GET['idevento'];

		$this->load->model('eventosModel');
		$datos=$this->eventosModel->infoEvento($idevento);

		$nombreEvento=$datos['nombre'];
		$this->load->model('pruebaExport');
		$this->pruebaExport->exportarListaAsistentes($idevento,$nombreEvento);
	}

	public function irDescargarAsistencia(){
		$data['tipo'] = $this -> session -> userdata('tipo');

		if($data['tipo']=='administrador'){
			$data['nombre_p']=$_GET['nombre_proyecto'];
			$this->load->view('descargarAsistentes',$data);
		}

		else{
			$this->load->view('infiltrado');
			return;
		}
	}

	public function descargarFechas(){
		$data['tipo'] = $this -> session -> userdata('tipo');

		if($data['tipo']=='administrador'){
			$fechaInicial=$_POST['fi'];
			$fechaTermino=$_POST['ft'];
			$nombre_proyecto=$_POST['nombre_proyecto'];
			$this->load->model('pruebaExport');
			$this->pruebaExport->exportarFechas($nombre_proyecto,$fechaInicial,$fechaTermino);
		}
	}
	public function listaFotosEvento(){
		$data['tipo'] = $this -> session -> userdata('tipo');

		if($data['tipo']=='administrador'){
			$data['nombre_proyecto']=$_GET['nombre_proyecto'];
			$this -> load -> model('pruebasExport');
			$data['qry'] = $this -> pruebasExport ->fotografiasPorProyecto($data['nombre_proyecto']);
			$this -> load -> view('listaFotos',$data);
		}

		else{
			$this->load->view('infiltrado');
			return;
		}
	}
}