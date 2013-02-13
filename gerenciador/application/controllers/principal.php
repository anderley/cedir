<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
	
	public function index(){
		$d = new Departamento();
				
		$data['departamentos'] =& $d->get();
		
		$this->load->view('includes/top');
		$this->load->view('principal', $data);
                $this->load->view('includes/footer');
	}
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */