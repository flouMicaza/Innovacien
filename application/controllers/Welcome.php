<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> helper('form');
		$this->load->helper('url');
	}

	public function index(){
		$this -> iniciar();
	}


	public function iniciar(){

		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['logueado'] = $this -> session -> userdata('logueado');
	

		if($this->session->userdata('logueado')){
			$this->load->view('Inicio',$data);
		}
		else{
			$this->load->view('IniciarSesion');
		}		
	}
	

	public function iniciarSesion(){
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];

		$this->load->model('ingreso');
		$resultado = $this->ingreso->ingreso($mail,$pass);

		if ($resultado == null){
			$this->load->view('errorSesion');
			return;
		}
	
		$data_usuario = array(
			'mail' => $resultado['mail'],
			'nombre' => $resultado['nombre']." ".$resultado['apellido'],
			'tipo' => $resultado['tipo'],
			'logueado' => TRUE
		);

			
			$this -> session ->set_userdata($data_usuario);
			
			$data['nombre'] = $this -> session ->userdata('nombre');
			$data['tipo'] = $this -> session -> userdata('tipo');
			$data['logueado'] = $this -> session -> userdata('logueado');
			$this ->load ->view('Inicio',$data);
		
	}

	public function cerrarSesion(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['logueado'] = $this -> session -> userdata('logueado');
	
		$usuario_data = array(
 			'logueado' => FALSE
		);

		$this->session->set_userdata($usuario_data);
		
		$this -> load -> view ('IniciarSesion',$data);
	}

	public function irRecuperarClave(){
		$this -> load -> view ('cambiarClave');
	}


	public function recuperarClave(){
		$correo=$_POST['mail'];
		$this->load->model('usuario');
		$datosUser=$this->usuario->sacarDatos($correo);
		$contraseña= $datosUser['contraseña'];
		$correoOficial=$datosUser['mail'];

		if ($datosUser==null) {
			echo "Ingrese un correo válido";
		}
		else{
			$mensaje= "Tu contraseña es: ".$contraseña;
			$titulo = "PRUEBA DE TITULO";
			//cabecera
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			//dirección del remitente 
			$headers .= "From: Ingreso - Innovacien < non-reply@innovacien.org >\r\n";
			//Enviamos el mensaje a tu_dirección_email 
			$bool = mail($correo,"recuperación de clave",$mensaje,$headers);
			

			$this -> load -> view ('IniciarSesion');
		}
	}
}
	
