<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MonitorController extends CI_Controller {



	public function actualizarDatos(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$mail = $this -> session ->userdata('mail');
		$mailEnviado=$_POST['mail'];

		if(strcmp($mail, $mailEnviado)!=0){
			$this->load->view('infiltrado');
			return;
		}
		else{

			$telefono = $_POST['telefono'];
			$banco = $_POST['banco'];
			$tipo_cuenta = $_POST['tipo_cuenta'];
			$num_cuenta = $_POST['num_cuenta'];
			$rutN= $_POST['rut'];

			$this->load->model('monitor');

			if($telefono != null){
				$this -> monitor -> actualizarTelefono($mail,$telefono);
			}
			if($banco != 'null'){
				$this -> monitor -> actualizarBanco($mail,$banco);
			}
			if($tipo_cuenta != 'null'){
				$this -> monitor -> actualizarTipoCuenta($mail,$tipo_cuenta);
			}
			if($num_cuenta != null){
				$this -> monitor -> actualizarNumCuenta($mail,$num_cuenta);
			}

			if($rutN != null){
				$this -> monitor->actualizarRut($mail,$rutN);
			}

			$this -> load -> model('ingreso');
			$query = $this -> ingreso -> datos($mail);
			$data['mail'] = $this -> session -> userdata('mail');
			$qry = $this -> monitor -> datosmonitor($data['mail']);
			$data['fono'] = $query['fono'];
			$data['rut'] = $query['rut'];
			$data['banco'] = $qry['banco'];
			$data['tipo_cuenta'] = $qry['tipo_cuenta'];
			$data['num_cuenta'] = $qry['num_cuenta'];
			$this->load->view('miCuenta',$data);

		}		
	}

	public function cargarModificarDatos(){

		$mailEnviado=$_GET['mail'];
		$mail = $this -> session ->userdata('mail');
		if(strcmp($mail, $mailEnviado)!=0){
			$this->load->view('infiltrado');
			return;
		}
		else{
			$data['nombre'] = $this -> session ->userdata('nombre');
			$data['tipo'] = $this -> session -> userdata('tipo');
			$data['log'] = $this -> session -> userdata('logueado');
			$data['mail'] = $this -> session -> userdata('mail');
			$data['telefono'] =$this -> session -> userdata('fono');
			$data['rut'] =$this -> session -> userdata('rut');

			$mail = $this -> session ->userdata('mail');
			$this -> load -> model('monitor');
			$qry = $this -> monitor -> datosmonitor($data['mail']);
			$data['banco'] = $qry['banco'];
			$data['tipo_cuenta'] = $qry['tipo_cuenta'];
			$data['num_cuenta'] = $qry['num_cuenta'];

			$this -> load ->view('modificarMonitor',$data);
		}

	}

}