<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamento extends CI_Controller {
	
	public function index(){
		$this->load->view('includes/top');
		$this->load->view('departamento');
                $this->load->view('includes/footer');
	}
}

/* End of file departamento.php */
/* Location: ./application/controllers/departamento.php */