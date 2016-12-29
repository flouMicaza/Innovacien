<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {


	public function crearCuenta(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$this->load->view('crearCuenta',$data);
	}

	public function miCuenta(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$this->load->view('miCuenta',$data);
	}
	public function crearUsuario(){
		$mail = $_POST['mail'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$tipo = $_POST['tipo'];
		$contraseña = $_POST['contraseña'];

		 /*llama al modelo que va a crear usuario y devuelve el correo del mismo*/
		$this->load->model('usuario');
		$usuarioCreado = $this ->usuario-> ingresoPersona($mail,$nombre,$apellido,$tipo,$contraseña);

		if($tipo == 'monitor'){
			$this -> load -> model('monitor');
			$this -> monitor -> crearDatos($mail);
		}		


		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$data['nombre_creado']  = $usuarioCreado['nombre'];
		$data['apellido_creado']  = $usuarioCreado['apellido'];
		$data['mail_creado']  = $usuarioCreado['mail'];
		$data['tipo_creado']  = $usuarioCreado['tipo'];
		$data['pass_creado']  = $usuarioCreado['contraseña'];
		$this->load->view('usuarioCreado',$data);
	}

	public function irInicio(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$this->load->view('Inicio',$data);
	}

	public function irEventoAdmin(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$this->load->view('eventosAdmin',$data);
	}

	public function irBlogAdmin(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$this->load->view('blogAdmin',$data);

	}


}