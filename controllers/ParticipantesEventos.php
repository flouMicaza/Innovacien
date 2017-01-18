<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParticipantesEventos extends CI_Controller {

	public function borrarParticipante1(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$this-> load -> model('eventosModel');
		
		$idEvento = $_POST['idEvento'];
		$mail = $_POST['mail'];

		$this -> eventosModel -> quitarParticipante($idEvento,$mail);
		
		$datos=$this-> eventosModel ->infoEvento($idEvento);

		$data['idEvento']= $datos['idevento'];
		$data['nombre'] = $datos['nombre'];
		$data['fecha'] = $datos['fecha'];
		$data['hora'] = $datos['hora'];
		$data['duracion'] = $datos['duracion'];
		$data['lugar']=$datos['nombre_lugar'];
		$data['nombre_proyecto'] =$datos['proyecto_nombre'];
		
		$data['participantes']=$this -> eventosModel->listaParticipantes2($idEvento);
		if($data['tipo']!='administrador'){
			$this->load ->model('verProyectosModel');
			$datosProyecto=$this->verProyectosModel->proyectoSegunEvento($data['idEvento'])	;
			$data['datosProyecto']=$datosProyecto;	
			$this->load->view('infoEventoGente',$data);
		}

		else{
			$this->load->view('infoEvento',$data);
		}

	}
	public function borrarParticipante2(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$this-> load -> model('eventosModel');
		
		$idEvento = $_POST['idEvento'];
		$mail = $_POST['mail'];

		$this -> eventosModel -> quitarParticipante($idEvento,$mail);
		$data['idEvento'] = $idEvento;

		$data['participantes']=$this -> eventosModel->listaParticipantes2($idEvento);
		$this -> load -> view('listaParticipantes_Evento',$data);

	}
	
	public function listaParticipantes(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$idEvento = $_POST['evento'];
		$data['idEvento'] = $idEvento;

		$this-> load -> model('eventosModel');

		$data['participantes']=$this -> eventosModel->listaParticipantes2($idEvento);
		$this -> load -> view('listaParticipantes_Evento',$data);
	}
	public function agregarParticipante(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$idEvento = $_POST['idEvento'];
		$data['idEvento'] = $idEvento;
		$mail = $_POST['mail_participante'];
		$pago = $_POST['pago'];

		$this-> load -> model('eventosModel');
		$this -> eventosModel -> agregarParticipante($idEvento,$mail,$pago);
		

		$data['participantes']=$this -> eventosModel->listaParticipantes2($idEvento);
		$this -> load -> view('listaParticipantes_Evento',$data);
	}
	public function agregarParticipanteLista(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$idEvento = $_POST['idEvento'];
		$data['idEvento'] = $idEvento;
		$mail = $_POST['mail'];
		$pago = $_POST['pago'];
		$data['tipo_usr'] = $_POST['tipo_usr'];

		$this-> load -> model('eventosModel');
		$this -> eventosModel -> agregarParticipante($idEvento,$mail,$pago);

		$tipo = $_POST['tipo_usr'];
		if($tipo == 'todos'){
			$data['participantes']=$this -> eventosModel->candidatosParticipantes($idEvento);
		}
		else{
			$data['participantes'] = $this -> eventosModel->candidatosParticipantesTipo($idEvento,$tipo);
		}
		
		$this -> load -> view('listaNoParticipantes_evento',$data);	


	}

	public function listaNoParticipantes(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$idEvento = $_POST['idEvento'];
		$data['idEvento'] = $idEvento;
		$data['mensaje'] = 'proyecto';
		$tipo = $_POST['tipo_usr'];
		$data['tipo_usr'] = $tipo;


		$this-> load -> model('eventosModel');

		if($tipo == 'todos'){
			$data['participantes']=$this -> eventosModel->candidatosParticipantes($idEvento);
		}
		else{
			$data['participantes'] = $this -> eventosModel->candidatosParticipantesTipo($idEvento,$tipo);
		}
		
		$this -> load -> view('listaNoParticipantes_evento',$data);	
	}
	public function listaNoParticipantes2(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$idEvento = $_POST['evento'];
		$data['idEvento'] = $idEvento;
		$data['mensaje'] = 'todo';

		$this-> load -> model('eventosModel');

		$data['participantes']=$this -> eventosModel->candidatosParticipantes2($idEvento);

		$this -> load -> view('listaNoParticipantes_evento',$data);	
	}
	public function actualizarMonto(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$idEvento = $_POST['idEvento'];
		$data['idEvento'] = $idEvento;
		$mail = $_POST['mail'];
		$monto = $_POST['pago'];


		$this-> load -> model('eventosModel');

		$this -> eventosModel -> actualizarMonto($idEvento, $mail, $monto);
		

		$data['participantes']=$this -> eventosModel->listaParticipantes2($idEvento);
		$this -> load -> view('listaParticipantes_Evento',$data);

	}


}