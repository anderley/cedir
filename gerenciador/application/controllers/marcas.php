<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marcas extends CI_Controller {
	
	private $data = array();
	
	public function __construct() {
            parent::__construct();
            
	    $this->data['menu_marca'] = TRUE;
	}
	
	public function index() {
		
		$m = new Marca();
				
		$this->data['marcas'] =& $m->get();
		
		$this->load->view('includes/top', $this->data);
		$this->load->view('marca', $this->data);
		$this->load->view('includes/footer');
	}
	
	public function editar() {
		
		$marca_id = $this->uri->segment(3);
		
		$m = new Marca($marca_id);
		
		$this->data['m'] =& $m;
		
		$this->load->view('includes/top', $this->data);
		$this->load->view('forms/marca', $this->data);
        $this->load->view('includes/footer');
	}
	
	public function salvar() {
		
		$descricao = $this->input->post('descricao');
		$id = $this->input->post('id');
		
		if (trim($descricao) != "") {		
			$m = new Marca();
			$m->where('descricao', $descricao)->get();
			
			if ($m->exists() && !empty($id)) {
				$this->data['msg'] = array(
										'class' => 'alert-error',
										'mensagem' => 'Esta marca j� est� cadastrado!');
			} else {
				$m = new Marca($id);
				$m->descricao = $descricao;
				$m->save();
		
				$m = new Marca();
				$msg = 'Marca %s com sucesso!';
				
				$this->data['marcas'] =& $m->get();
				$this->data['msg'] = array(
										'class' => 'alert-success',
										'mensagem' => sprintf($msg, ((empty($id)) ? "cadastrada" : "alterada")));
			}
		} else {
			$this->data['msg'] = array(
										'class' => 'alert-error',
										'mensagem' => 'O campo marca � obrigat�rio!');
		}
		$this->data['mensagem'] =  $this->load->view('includes/mensagem', $this->data, true);
		
		$this->load->view('includes/top', $this->data);
		$this->load->view('marca', $this->data);
        $this->load->view('includes/footer');
	}
	
	public function novo() {
		$this->load->view('includes/top', $this->data);
		$this->load->view('forms/marca', $this->data);
        $this->load->view('includes/footer');
	}
	
	public function trocar_status() {
		
		$ids = $this->input->post('ids');
		$indic_habilitado;
		
		$marcas = new Marca();
		$marcas->where_in('id', $ids)->get();
		
		foreach($marcas as $m) {
			if (!isset($indic_habilitado)) {
				$indic_habilitado = (($m->indic_habilitado == 'S') ? 'N' : 'S');
			}
			$m->indic_habilitado = $indic_habilitado;
			$m->save();
		}
		$m = new Marca();
		$this->data['marcas'] =& $m->get();
		
		$this->load->view('templates/marca', $this->data);
	}
	
	public function excluir() {
		$ids = $this->input->post('ids');
		
		$m = new Marca();
		$m->where_in('id', $ids)->get();
		$m->delete_all();
		
		$this->data['marcas'] =& $m->get();
		
		$this->load->view('templates/marca', $this->data);
	}
	
	public function buscar() {
		$buscar = trim($this->input->post('buscar'));			
		$m = new Marca();
		
		if ($buscar != "") {			
			$m->where('id', $buscar)->or_ilike('descricao', $buscar);
		
			$this->data['marcas'] =& $m->get();
		} else {
			$this->data['marcas'] =& $m->get();
		}
		$this->load->view('includes/top', $this->data);
		$this->load->view('marca', $this->data);
		$this->load->view('includes/footer');
	}
}
/* End of file marcas.php */
/* Location: ./application/controllers/marcas.php */
