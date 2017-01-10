<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenteController extends CI_Controller {


	public function miCuenta(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');	
		$data['rut'] = $this -> session -> userdata('rut');
		$data['fono'] = $this -> session -> userdata('fono');

		if($data['tipo'] == 'monitor'){
			$this -> load -> model('monitor');
			$qry = $this -> monitor -> datosmonitor($data['mail']);
			$data['banco'] = $qry['banco'];
			$data['tipo_cuenta'] = $qry['tipo_cuenta'];
			$data['num_cuenta'] = $qry['num_cuenta'];
		}
		$this->load->view('miCuenta',$data);
	}

	public function evento(){
		$data['tipo'] = $this->session->userdata('tipo');
		$this->load->view('Eventos',$data);	
	}

	public function blog(){
		$this->load->view('Blog');
	}

	public function cerrarSesion(){
		$this->load->view('CerrarSesion');
	}

	public function irCambiarClave(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$this->load->view('cambioClave',$data);

	}

	public function cambiarClave(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$claveAntigua = $_POST['claveAntigua'];
		$claveNueva1 = $_POST['nuevaContraseña'];
		$claveNueva2 = $_POST['copiaNuevaContraseña'];

		$this->load->model('usuario');
		$datosUser=$this->usuario->sacarDatos($data['mail']);
		$claveAntiguaReal = $datosUser['contraseña'];

		if($claveNueva1!=$claveNueva2){
			$data['error']="claveNueva";
			$this->load->view('errorClave',$data);
		}

		elseif ($claveAntiguaReal==$claveAntigua){
			$this->usuario->cambiarClave($data['mail'],$claveNueva1);
			$this->load->view('Inicio',$data);
		}

		else{
			$data['error']="claveAntigua";
			$this->load->view('errorClave',$data);

		}
	}
}
?>