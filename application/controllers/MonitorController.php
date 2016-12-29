<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MonitorController extends CI_Controller {



	public function actualizarDatos(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$mail = $this -> session ->userdata('mail');

		$telefono = $_POST['telefono'];
		$banco = $_POST['banco'];
		$tipo_cuenta = $_POST['tipo_cuenta'];
		$num_cuenta = $_POST['num_cuenta'];

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

		
		$data['mail'] = $this -> session -> userdata('mail');
		$qry = $this -> monitor -> datosmonitor($data['mail']);
		$data['telefono'] = $qry['telefono'];
		$data['banco'] = $qry['banco'];
		$data['tipo_cuenta'] = $qry['tipo_cuenta'];
		$data['num_cuenta'] = $qry['num_cuenta'];
		$this->load->view('miCuenta',$data);

		}
	}

	public function cargarModificarDatos(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$mail = $this -> session ->userdata('mail');
		$this -> load -> model('monitor');
		$qry = $this -> monitor -> datosmonitor($data['mail']);
		$data['telefono'] = $qry['telefono'];
		$data['banco'] = $qry['banco'];
		$data['tipo_cuenta'] = $qry['tipo_cuenta'];
		$data['num_cuenta'] = $qry['num_cuenta'];

		$this -> load ->view('modificarMonitor',$data);


	}

}