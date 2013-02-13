<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto extends CI_Controller {
	
	public function index(){
		$this->load->view('includes/top');
		$this->load->view('produto');
                $this->load->view('includes/footer');
	}
}

/* End of file produto.php */
/* Location: ./application/controllers/produto.php */