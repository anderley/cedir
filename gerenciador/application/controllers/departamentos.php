<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamentos extends CI_Controller {
	
	private $data = array();
	
	public function __construct() {
            parent::__construct();
            
	    $this->data['menu_departamento'] = TRUE;
	}
	
	public function index() {
		
		$d = new Departamento();
				
		$this->data['departamentos'] =& $d->get();
		
		$this->load->view('includes/top', $this->data);
		$this->load->view('departamento', $this->data);
		$this->load->view('includes/footer');
	}
	
	public function editar() {
		
		$depto_id = $this->uri->segment(3);
		
		$d = new Departamento($depto_id);
		
		$this->data['d'] =& $d;
		
		$this->load->view('includes/top', $this->data);
		$this->load->view('forms/departamento', $this->data);
        $this->load->view('includes/footer');
	}
	
	public function salvar() {
		
		$descricao = $this->input->post('descricao');
		
		if (trim($descricao) != "") {		
			$d = new Departamento();
			$d->where('descricao', $descricao)->get();
			
			if ($d->exists()) {
				$this->data['msg'] = array(
										'class' => 'alert-error',
										'mensagem' => 'Este departamento já está cadastrado!');
			} else {
				$d->descricao = $descricao;
				$d->save();
		
				$this->data['departamentos'] =& $d->get();
				$this->data['msg'] = array(
										'class' => 'alert-success',
										'mensagem' => 'Departamento cadastrado com sucesso!');
			}
		} else {
			$this->data['msg'] = array(
										'class' => 'alert-error',
										'mensagem' => 'O campo departamento é obrigatório!');
		}
		$this->data['mensagem'] =  $this->load->view('includes/mensagem', $this->data, true);
		
		$this->load->view('includes/top', $this->data);
		$this->load->view('departamento', $this->data);
        $this->load->view('includes/footer');
	}
	
	public function novo() {
		$this->load->view('includes/top', $this->data);
		$this->load->view('forms/departamento', $this->data);
        $this->load->view('includes/footer');
	}
	
	public function itens($d = null) {
		if (is_numeric($d)) {
			$d = new Departamento($d);
		}		
		$this->data['d'] = $d;
		
		$this->load->view('includes/top', $this->data);
		$this->load->view('forms/departamento_itens', $this->data);
        $this->load->view('includes/footer');
	}
	
	public function trocar_status() {
		
		$depto_id = $this->uri->segment(3);
		
		$d = new Departamento($depto_id);
		$d->indic_habilitado = (($d->indic_habilitado == 'S') ? 'N' : 'S');
		$d->save();
		
		foreach($d->itens->get_iterated() as $i) {
			$i->indic_habilitado = $d->indic_habilitado;
			$i->save();
		}		
		$this->data['departamentos'] =& $d->get();
		
		$this->load->view('templates/departamento', $this->data);
	}
	
	public function excluir() {
		$ids = $this->input->post('ids');
		
		$d = new Departamento();
		$d->where_in('id', $ids)->get();
		$d->delete_all();
		
		$this->data['departamentos'] =& $d->get();
		
		$this->load->view('templates/departamento', $this->data);
	}
	
	public function buscar() {
		$buscar = trim($this->input->post('buscar'));			
		$d = new Departamento();
		
		if ($buscar != "") {			
			$d->where('id', $buscar)->or_ilike('descricao', $buscar);
		
			$this->data['departamentos'] =& $d->get();
		} else {
			$this->data['departamentos'] =& $d->get();
		}
		$this->load->view('includes/top', $this->data);
		$this->load->view('departamento', $this->data);
		$this->load->view('includes/footer');
	}
}
/* End of file departamentos.php */
/* Location: ./application/controllers/departamentos.php */
