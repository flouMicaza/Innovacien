<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrearProyecto extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> helper('form');
		$this->load->helper('url');
	}
	public function crearProyectoVista(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$this -> load -> view('crearProyectoVista',$data);


	}

	public function crearProyecto(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];	
		$tipo_proyecto = $_POST['tipo_proyecto'];

		$this -> load -> model('crearProyectoModel');
		$this -> crearProyectoModel -> crearProyecto($nombre_proyecto,$data['mail'],$tipo_proyecto);
	
		$this-> load -> model('crearProyectoFlo');
		$datos=$this-> crearProyectoFlo ->verUnProyecto($nombre_proyecto);

		$data['nombre_p']= $datos['nombre'];
		$data['fecha_creacion'] = $datos['fecha_creacion'];
		$data['creador'] = $datos['creador'];
		$data['tipo_p'] = $datos['tipo'];

		//creacion de directorios
		$dir = $_SERVER['DOCUMENT_ROOT'].'/proyectos/'.$nombre_proyecto;
		mkdir($dir, 0777);
		$dir = $_SERVER['DOCUMENT_ROOT'].'/proyectos/'.$nombre_proyecto.'/eventos';
		mkdir($dir, 0777);
		$dir = $_SERVER['DOCUMENT_ROOT'].'/proyectos/'.$nombre_proyecto.'/documentos';
		mkdir($dir, 0777);

		$this->load->view('infoProyecto',$data);
	}

	public function listaParticipantes(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$data['nombre_proyecto'] = $nombre_proyecto;

		$this -> load -> model('crearProyectoModel');
		$data['qry'] = $this -> crearProyectoModel -> listaParticipantes($nombre_proyecto);

		$this -> load -> view('listaParticipantes_proyecto', $data);
	}

	public function agregarParticipante(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$data['nombre_proyecto'] = $nombre_proyecto;

		$correo = $_POST['mail_participante'];

		$this -> load -> model('crearProyectoModel');
		$this -> crearProyectoModel -> añadirParticipante($nombre_proyecto,$correo);

		$data['qry'] = $this -> crearProyectoModel -> listaParticipantes($nombre_proyecto);
		$this -> load -> view('listaParticipantes_proyecto', $data);
	}

	public function quitarParticipante(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$data['nombre_proyecto'] = $nombre_proyecto;

		$correo = $_POST['mail_participante'];

		$this -> load -> model('crearProyectoModel');
		$this -> crearProyectoModel -> quitarParticipante($nombre_proyecto,$correo);

		$data['qry'] = $this -> crearProyectoModel -> listaParticipantes($nombre_proyecto);
		$this -> load -> view('listaParticipantes_proyecto', $data);

	}

	public function vistaNoParticipantes(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$data['nombre_proyecto'] = $nombre_proyecto;

		$tipo_usr = $_POST['tipo_usr'];
		$data['tipo_usr'] = $tipo_usr;

		$this -> load -> model('crearProyectoModel');

		if($tipo_usr == 'todos'){
			$ans = $this -> crearProyectoModel -> noParticipantes($nombre_proyecto);
		}
		else{
			$ans = $this -> crearProyectoModel -> noParticipantes_tipo($nombre_proyecto,$tipo_usr);
		}
		$data['qry'] = $ans;

		$this -> load -> view('listaNoParticipantes_proyecto',$data);
	}

	public function agregarParticipante2(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$data['nombre_proyecto'] = $nombre_proyecto;

		$correo = $_POST['mail_participante'];

		$this -> load -> model('crearProyectoModel');
		$this -> crearProyectoModel -> añadirParticipante($nombre_proyecto,$correo);

		$tipo_usr = $_POST['tipo_usr'];
		$data['tipo_usr'] = $tipo_usr;

		if($tipo_usr == 'todos'){
			$ans = $this -> crearProyectoModel -> noParticipantes($nombre_proyecto);
		}
		else{
			$ans = $this -> crearProyectoModel -> noParticipantes_tipo($nombre_proyecto,$tipo_usr);
		}
		$data['qry'] = $ans;

		$this -> load -> view('listaNoParticipantes_proyecto',$data);
		
	}

	public function listaArchivos(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');
		$data['mensaje'] = null;

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$data['nombre_proyecto'] = $nombre_proyecto;

		$this -> load -> model('crearProyectoModel');
		$data['qry'] = $this -> crearProyectoModel -> listaArchivos($nombre_proyecto);

		$this -> load -> view('listaArchivos_proyecto', $data);
	}

	public function descargar(){
		$data['nombre_archivo'] = $_POST['nombre_archivo'];
		$data['link_archivo'] = $_POST['link_archivo'];

		$this -> load -> view('descargar_archivo',$data);
	}

	public function subirArchivo(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$nombre_archivo = $_POST['nombre_archivo'];
		$data['nombre_proyecto'] = $_POST['nombre_proyecto'];
		$descripcion = $_POST['descripcion_archivo'];

		$dir = '/proyectos/'.$nombre_proyecto.'/documentos/';
		$fichero = $_SERVER['DOCUMENT_ROOT'].$dir.basename($_FILES['archivo']['name']);

		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero)){
			$this -> load -> model('crearProyectoModel');
			$ubicacion = $dir.basename($_FILES['archivo']['name']);
			$this -> crearProyectoModel -> subirArchivo ($ubicacion, $nombre_proyecto, $nombre_archivo, $data['mail'], $descripcion);
			$data['qry'] = $this -> crearProyectoModel -> listaArchivos($nombre_proyecto);
			$data['mensaje'] = null;
			$this -> load -> view('listaArchivos_proyecto', $data);
		}
		else{
			$this -> load -> model('crearProyectoModel');
			$data['qry'] = $this -> crearProyectoModel -> listaArchivos($nombre_proyecto);
			$data['mensaje'] = "error al subir archivo, intentelo otra vez";

		}
	}

	public function borrarArchivo(){
		$data['nombre'] = $this -> session ->userdata('nombre');
		$data['tipo'] = $this -> session -> userdata('tipo');
		$data['log'] = $this -> session -> userdata('logueado');
		$data['mail'] = $this -> session -> userdata('mail');

		$nombre_proyecto = $_POST['nombre_proyecto'];
		$data['nombre_proyecto'] = $nombre_proyecto;
		$nombre_archivo = $_POST['nombre_archivo'];
		$link_archivo = $_POST['link_archivo'];
		$directorio = $_SERVER['DOCUMENT_ROOT'].$link_archivo;

		if(unlink($directorio)){
			$this -> load -> model('crearProyectoModel');
			$this -> crearProyectoModel-> borrarArchivo($link_archivo, $nombre_proyecto);
			$data['qry'] = $this -> crearProyectoModel -> listaArchivos($nombre_proyecto);
			$data['mensaje'] = null;

			$this -> load -> view('listaArchivos_proyecto', $data);			 
		}
		else{
			$this -> load -> model('crearProyectoModel');
			$data['qry'] = $this -> crearProyectoModel -> listaArchivos($nombre_proyecto);
			$data['mensaje'] = "Error al borrar archivo, intentelo otra vez";
		}
	}



}
?>
	
