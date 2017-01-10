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
}