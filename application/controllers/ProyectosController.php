<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProyectosController extends CI_Controller {

	public function inicioProyecto(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$this-> load -> model('crearProyectoFlo');
		$datos=$this-> crearProyectoFlo ->verProyectos();
		$data['qry']=$datos;
		$this->load->view('inicioProyecto',$data);

	}

	public function irProyecto(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombreProyecto = $_POST['nombre'];
		$this-> load -> model('crearProyectoFlo');
		$datos=$this-> crearProyectoFlo ->verUnProyecto($nombreProyecto);

		$data['nombre_p']= $datos['nombre'];
		$data['fecha_creacion'] = $datos['fecha_creacion'];
		$data['creador'] = $datos['creador'];
		$data['tipo_p'] = $datos['tipo'];


		if ($data['tipo']=="monitor"){
			$proyecto=$_POST['nombre'];
			$this->load->model('verProyectosModel');
			$eventos=$this->verProyectosModel->eventosFuturos($proyecto,$data['mail']);
			$data['eventos']=$eventos;
		}
		$this->load->view('infoProyecto',$data);
	}

}

