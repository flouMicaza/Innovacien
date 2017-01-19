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
		$data['rut'] = $this -> session -> userdata('rut');
		$data['fono'] = $this -> session -> userdata('fono');
		$this->load->view('miCuenta',$data);
	}
	public function crearUsuario(){

		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado',$data);
			return;
		}
		else{

			$mail = $_POST['mail'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$tipo = $_POST['tipo'];
			$contraseña = $_POST['contraseña'];
			$fono = $_POST['fono'];
			$rut=$_POST['rut'];


				 /*llama al modelo que va a crear usuario y devuelve el correo del mismo*/
			$this->load->model('usuario');
			$usuarioCreado = $this ->usuario-> ingresoPersona($mail,$nombre,$apellido,$tipo,$contraseña,$fono,$rut);

			if($tipo == 'monitor'){
				$this -> load -> model('monitor');
				$this -> monitor -> crearDatos($mail);
			}		



			$data['nombre_creado']  = $usuarioCreado['nombre'];
			$data['apellido_creado']  = $usuarioCreado['apellido'];
			$data['mail_creado']  = $usuarioCreado['mail'];
			$data['tipo_creado']  = $usuarioCreado['tipo'];
			$data['pass_creado']  = $usuarioCreado['contraseña'];
			$data['fono_creado']  = $usuarioCreado['fono'];
			$data['rut_creado']  = $usuarioCreado['rut'];
			$this->correoInicial($data);
		}
			
	}

	public function correoInicial($info){
		$mensaje="";
		$foto= '	<html>
				<head>
					<title>LogoInnovacien</title>
				</head>
				<body>
					<img src="'.base_url().'img/logo_sup.png" style="width:150px;height:44px;">
				</body>';

		

		$mensaje.= nl2br("Se ha creado una nueva cuenta Innovacien.\n") ;
		$mensaje.=nl2br("Tu contraseña es: ".$info['pass_creado'] ."\n") ;
		$mensaje.= nl2br("Ingresa ");
		

		$codigohtml = '
			<html>
				<head>
					<title>E-Mail HTML</title>
				</head>
				<body>
					<a href="http://ingreso.innovacien.org">aqui</a>
				</body>

			';
		$mensaje.=$codigohtml;
		$mensaje.=nl2br("\n\n");
		$mensaje.=$foto;
		$titulo = "Nueva cuenta Innovacien";
		//cabecera
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		//dirección del remitente 
		$headers .= "From: Ingreso - Innovacien < non-reply@innovacien.org >\r\n";
		//Enviamos el mensaje a tu_dirección_email 
		$bool = mail($info['mail_creado'],"Nueva Cuenta Innovacien",$mensaje,$headers);
			

		$this->load->view('usuarioCreado',$info);
		
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



		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado',$data);
			return;
		}
		else{
			$this->load->view('eventosAdmin',$data);
		}
	}


	
	public function irABuscar(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		
		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado',$data);
			return;
		}
		else{

			$this->load->model('autocompletado');
			$data['qry']=$this->autocompletado->buscador();
			
			
			$this->load->view('buscar',$data);
		}
	}

	public function irPerfil_Mail(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$mail_usuario = $_GET['mail'];

		$this -> load -> model('usuario');
		$datos = $this -> usuario -> sacarDatos($mail_usuario);
		if ($datos == null){
			$this -> load -> view('errorBusquedaUsuario',$data);
		}
		else{
			$data['nombre_usr'] = $datos['nombre'].' '.$datos['apellido'];
			$data['mail_usr'] = $mail_usuario;
			$data['rut_usr'] = $datos['rut'];
			$data['fono_usr'] = $datos['fono'];
			$data['tipo_usr'] = $datos['tipo'];
			if($datos['activo'] == 1){
				$data['activo_usr'] = 'Activo';
			}
			else{
				$data['activo_usr'] = 'Desactivado';
			}

			if($datos['tipo'] == 'monitor'){
				$this-> load->model('monitor');
				$monitor = $this->monitor->datosmonitor($mail_usuario);
				$data['banco_usr'] = $monitor['banco'];
				$data['cuenta_usr'] = $monitor['tipo_cuenta'];
				$data['numCuenta_usr'] = $monitor['num_cuenta'];
			}
			$this->load->view('cuentaUsuario',$data);


		}
		
	}
	
	public function irDescargas(){
		$data['tipo'] = $this -> session -> userdata('tipo');

		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado',$data);
			return;
		}
		else{

			$this-> load->view('descargas',$data);
		}
	}
	
	public function activarUsuario(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado',$data);
			return;
		}
		else{
			$mail_usuario = $_POST['mail_usr'];
			
			$this -> load -> model('bannUsuario');
			
			$this -> bannUsuario -> activar($mail_usuario);

			$this -> load -> model('usuario');
			$datos = $this -> usuario -> sacarDatos($mail_usuario);
			if ($datos == null){
				$this -> load -> view('errorBusquedaUsuario',$data);
			}
			else{
				$data['nombre_usr'] = $datos['nombre'].' '.$datos['apellido'];
				$data['mail_usr'] = $mail_usuario;
				$data['rut_usr'] = $datos['rut'];
				$data['fono_usr'] = $datos['fono'];
				$data['tipo_usr'] = $datos['tipo'];
				if($datos['activo'] == 1){
					$data['activo_usr'] = 'Activo';
				}
				else{
					$data['activo_usr'] = 'Desactivado';
				}

				if($datos['tipo'] == 'monitor'){
					$this-> load->model('monitor');
					$monitor = $this->monitor->datosmonitor($mail_usuario);
					$data['banco_usr'] = $monitor['banco'];
					$data['cuenta_usr'] = $monitor['tipo_cuenta'];
					$data['numCuenta_usr'] = $monitor['num_cuenta'];
				}
				$this->load->view('cuentaUsuario',$data);


			}
		}
	}
	
	public function desactivarUsuario(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado',$data);
			return;
		}

		$mail_usuario = $_POST['mail_usr'];
		
		$this -> load -> model('bannUsuario');
		
		$this -> bannUsuario -> desactivar($mail_usuario);

		$this -> load -> model('usuario');
		$datos = $this -> usuario -> sacarDatos($mail_usuario);
		if ($datos == null){
			$this -> load -> view('errorBusquedaUsuario',$data);
		}
		else{
			$data['nombre_usr'] = $datos['nombre'].' '.$datos['apellido'];
			$data['mail_usr'] = $mail_usuario;
			$data['rut_usr'] = $datos['rut'];
			$data['fono_usr'] = $datos['fono'];
			$data['tipo_usr'] = $datos['tipo'];
			if($datos['activo'] == 1){
				$data['activo_usr'] = 'Activo';
			}
			else{
				$data['activo_usr'] = 'Desactivado';
			}

			if($datos['tipo'] == 'monitor'){
				$this-> load->model('monitor');
				$monitor = $this->monitor->datosmonitor($mail_usuario);
				$data['banco_usr'] = $monitor['banco'];
				$data['cuenta_usr'] = $monitor['tipo_cuenta'];
				$data['numCuenta_usr'] = $monitor['num_cuenta'];
			}
			$this->load->view('cuentaUsuario',$data);


		}
		
	}
	
	public function listaUsuarios(){


		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado',$data);
			return;
		}
		else{
			$tipo = $_GET['tipo'];

			$this -> load -> model('listaUsuarios');
			if($tipo == 'todos'){
				$resultado = $this -> listaUsuarios -> todos();
			}
			else{
				$resultado = $this -> listaUsuarios -> porTipo($tipo);
			}
			$data['qry'] = $resultado;
			$this -> load -> view('listaUsuarios',$data);
		}
	}

	public function listaDeudas(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado',$data);
			return;
		}
		else{
			$this -> load -> model('eventosModel');
			$data['lista'] = $this -> eventosModel -> listaTotalDeudas();
			$this -> load -> view('listaTotalDeudas',$data);
		}

	}


}
