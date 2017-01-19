<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LugarController extends CI_Controller {

	public function irLugar_Nombre(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$lugar_nombre = $_GET['lugar'];
		if($_GET['evento']=='si'){
			$data['idEvento']=$_GET['idEvento'];
		}

		$this-> load -> model('lugaresModel');
		$datos=$this-> lugaresModel ->verLugar($lugar_nombre);

		$data['nombreLugar']= $datos['nombre_lugar'];
		$data['nombre_encargado'] = $datos['nombre_encargado'];
		$data['telefono'] = $datos['telefono'];
		$data['mail_encargado'] = $datos['mail'];
		$data['direccion'] = $datos['direccion'];
		$data['link'] = $datos['link'];
		$data['evento']=$_GET['evento'];
		$data['cuenta']=count($datos);
		$this->load->view('infoLugar',$data);
	
	}

	public function verLugares(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		$this->load->model('lugaresModel');
		$lugares=$this->lugaresModel->verLugares();
		$data['lugares']=$lugares;
		$this->load->view('inicioLugares',$data);

	}

	public function irCrearLugar(){
		$data['tipo'] = $this -> session -> userdata('tipo');
		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado');
			return;
		}
		else{
			$this->load->view('crearLugar',$data);
		}
	}

	public function crearLugar(){
		$data['tipo'] = $this -> session -> userdata('tipo');

		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado');
			return;
		}
		else{

			$nombreLugar=$_POST['nombreLugar'];
			$nombre_encargado=$_POST['encargado'];
			$telefono=$_POST['telefono'];
			$mail_encargado=$_POST['mailEncargado'];
			$direccion=$_POST['direccion'];
			if ($_POST['linkDireccion'] !=null) {
				$linkDireccion=$_POST['linkDireccion'];
			}
			else{ $linkDireccion='NoHay'; }

			$this-> load -> model('lugaresModel');
			$lugarCreado=$this->lugaresModel->crearLugar($nombreLugar,$nombre_encargado,$telefono,$mail_encargado,$direccion,$linkDireccion);

			$data['nombreLugar']=$lugarCreado['nombre_lugar'];
			$data['nombre_encargado']=$lugarCreado['nombre_encargado'];
			$data['telefono']=$lugarCreado['telefono'];
			$data['mail_encargado']=$lugarCreado['mail'];
			$data['direccion']=$lugarCreado['direccion'];
			$data['link']=$lugarCreado['link'];
			$data['evento']='no';
			$this->load->view('infoLugar',$data);

		}
	}

	public function cargarModificarLugar(){
		$data['tipo']=$this -> session -> userdata('tipo');

		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado');
			return;
		}
		else{
			$lugar=$_POST['lugar'];

			$this->load->model('lugaresModel');
			$datos=$this->lugaresModel->verLugar($lugar);

			$data['nombreLugar']=$datos['nombre_lugar'];
			$data['nombre_encargado']=$datos['nombre_encargado'];
			$data['telefono']=$datos['telefono'];
			$data['mail_encargado']=$datos['mail'];
			$data['direccion']=$datos['direccion'];
			$data['link']=$datos['link'];
			$data['evento']='no';

			$this->load ->view('modificarLugar',$data);
		}
	}

	public function actualizarLugar(){
		$data['tipo'] = $this -> session -> userdata('tipo');

		if($data['tipo']!='administrador'){
			$this->load->view('infiltrado');
			return;
		}
		else{
			$nombreOriginal=$_POST['nombreOriginal'];
			$nombreLugar=$_POST['nombre'];
			$nombre_encargado=$_POST['nombre_encargado'];
			$telefono=$_POST['telefono'];
			$mail_encargado=$_POST['mail_encargado'];
			$direccion=$_POST['direccion'];
			if ($_POST['link'] !=null) {
				$linkDireccion=$_POST['link'];
			}
			else{ $linkDireccion=null; }

			$this->load->model('lugaresModel');
			
			if($nombre_encargado!=null){
				$this->lugaresModel->actualizarNombre_Encargado($nombre_encargado,$nombreOriginal);
			}

			if($telefono!=null){
				$this->lugaresModel->actualizarTelefono($telefono,$nombreOriginal);
			}

			if($mail_encargado!=null){
				$this->lugaresModel->actualizarMail($mail_encargado,$nombreOriginal);
			}

			if($direccion!=null){
				$this->lugaresModel->actualizarDireccion($direccion,$nombreOriginal);
			}

			if($linkDireccion!=null){
				$this->lugaresModel->actualizarLink($linkDireccion,$nombreOriginal);
			}

			if($nombreLugar!=null){
				$this->lugaresModel->actualizarNombreLugar($nombreLugar,$nombreOriginal);

				$datos=$this-> lugaresModel ->verLugar($nombreLugar);
			}

			else{ 
			$datos=$this-> lugaresModel ->verLugar($nombreOriginal);}



			$data['nombreLugar']= $datos['nombre_lugar'];
			$data['nombre_encargado'] = $datos['nombre_encargado'];
			$data['telefono'] = $datos['telefono'];
			$data['mail_encargado'] = $datos['mail'];
			$data['direccion'] = $datos['direccion'];
			$data['link'] = $datos['link'];
			$data['evento']='no';


			$this->load->view('infoLugar',$data);
		}
	}
}