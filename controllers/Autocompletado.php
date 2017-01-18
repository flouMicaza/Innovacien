<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocompletado extends CI_Controller
{
	
	public function __construct()
	{
		
		parent::__construct();
		//cargamos el helper url 
		$this->load->helper('url');
		//cargamos la base de datos
		$this->load->database('default');
		//cargamos el modelo autocompletado_model
		$this->load->model('autocompletado_model');
		
	}
	
	public function autocompletar()
	{
		//si es una petición ajax y existe una variable post
		//llamada info dejamos pasar
		if($this->input->is_ajax_request() && $this->input->post('info'))
        {
        	
			$abuscar = $this->security->xss_clean($this->input->post('info'));
			
			$search = $this->autocompletado_model->buscador($abuscar);
			
			//si search es distinto de false significa que hay resultados
			//y los mostramos con un loop foreach
			if($search !== FALSE)
			{
				
				foreach($search as $fila)
				{
				?>
				
					<p><a href=""><?php echo $fila->localidad ?></a></p>
				
				<?php	
				}
				
			//en otro caso decimos que no hay resultados
			}else{
			?>
				
				<p><?php echo 'No hay resultados' ?></p>
				
			<?php	
			}
			
		}
		
	}
	
}
/*
 * end application/controllers/autocompletado.php
 */