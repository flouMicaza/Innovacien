<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProyectosController extends CI_Controller {

	public function inicioProyecto(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		if($data['tipo']=='administrador'){

			$this-> load -> model('crearProyectoFlo');
			$datos=$this-> crearProyectoFlo ->verProyectos();
			$data['qry']=$datos;
			$this->load->view('inicioProyecto',$data);
		}

		else{
			$this->load->view('infiltrado');
			return;
		}

	}

	public function irProyecto(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		if($data['tipo']=='administrador'){
			$nombreProyecto = $_GET['nombre'];
			$this-> load -> model('crearProyectoFlo');
			$datos=$this-> crearProyectoFlo ->verUnProyecto($nombreProyecto);

			$data['nombre_p']= $datos['nombre'];
			$data['fecha_creacion'] = $datos['fecha_creacion'];
			$data['creador'] = $datos['creador'];
			$data['tipo_p'] = $datos['tipo'];


			if ($data['tipo']=="monitor"){
				$proyecto=$_GET['nombre'];
				$this->load->model('verProyectosModel');
				$eventos=$this->verProyectosModel->eventosFuturos($proyecto,$data['mail']);
				$data['eventos']=$eventos;
			}
			$this->load->view('infoProyecto',$data);
		}
		else{
			$this->load->view('infiltrado');
			return;
		}
	}

}

