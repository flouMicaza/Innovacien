<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LugarController extends CI_Controller {

	public function irLugar_Nombre(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$lugar_nombre = $_POST['lugar'];
		if($_POST['evento']=='si'){
			$data['idEvento']=$_POST['idEvento'];
		}

		$this-> load -> model('lugaresModel');
		$datos=$this-> lugaresModel ->verLugar($lugar_nombre);

		$data['nombreLugar']= $datos['nombre_lugar'];
		$data['nombre_encargado'] = $datos['nombre_encargado'];
		$data['telefono'] = $datos['telefono'];
		$data['mail_encargado'] = $datos['mail'];
		$data['direccion'] = $datos['direccion'];
		$data['link'] = $datos['link'];
		$data['evento']=$_POST['evento'];
		
		$this->load->view('infoLugar',$data);
	
	}

	public function verLugares(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$this->load->model('lugaresModel');
		$lugares=$this->lugaresModel->verLugares();
		$data['lugares']=$lugares;
		$this->load->view('inicioLugares',$data);

	}
}