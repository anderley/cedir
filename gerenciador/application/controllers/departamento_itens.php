<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamento_Itens extends CI_Controller {
	
	private $data = array();
	
	public function __construct() {
            parent::__construct();
            
	    $this->data['menu_departamento'] = TRUE;
	}
	
	public function exibir($d = null) {
		
		if (is_numeric($d)) {
			$d = new Departamento($d);
		}		
		$this->data['d'] =& $d;
		$this->data['d_itens'] =& $d->itens->get();
		
		$this->load->view('includes/top', $this->data);
		$this->load->view('forms/departamento_itens', $this->data);
        $this->load->view('includes/footer');
	}

	public function salvar(){
		$d_item_id = $this->uri->segment(3);
		$depto_id = $this->input->post('depto_id');
		$descricao = $this->input->post('descricao');
		
		if (trim($descricao) != "") {
			$d = new Departamento($depto_id);
			
			$d_item = new Departamento_item();
			
			$d_item->where_related('departamento', 'id', $d)->get_by_descricao($descricao);
						
			if ($d_item->exists() && ($d_item->id != $d_item_id)) {
				$this->data['msg'] = array(
										'class' => 'alert-error',
										'mensagem' => 'Este item já está cadastrado no departamento ' . $d->descricao .'!');
			} else {
				$d_item = new Departamento_item($d_item_id);
				
				if ($d_item->descricao != $descricao) {
					$d_item->descricao = $descricao;
					$d_item->save($d);
					$msg = "Item %s com sucesso!";
					$msg = sprintf($msg, (empty($d_item_id) ? "cadastrado" : "alterado"));
					
					
					$this->data['msg'] = array(
											'class' => 'alert-success',
											'mensagem' => $msg);
				}
			}		
		} else {
			$this->data['msg'] = array(
										'class' => 'alert-error',
										'mensagem' => 'O campo item é obrigatório!');
			$d = $depto_id;
		}
		$this->data['mensagem'] =  $this->load->view('includes/mensagem', $this->data, true);
		
		$this->exibir($d);
	}

	public function excluir() {
		$depto_id = $this->input->post('depto_id');
		$ids = $this->input->post('ids');
		
		$d_item = new Departamento_Item();
		$d_item->where_in('id', $ids)->get();
		$d_item->delete_all();
		
		$d = new Departamento($depto_id);

		$this->data['depto'] =& $d;
		
		$this->load->view('templates/departamento_item', $this->data);
	}
	
	public function trocar_status() {
		
		$depto_id = $this->uri->segment(3);
		$depto_item_id = $this->uri->segment(4);
		
		$d_item = new Departamento_Item($depto_item_id);
		$d_item->indic_habilitado = (($d_item->indic_habilitado == 'S') ? 'N' : 'S');
		$d_item->save();	
		
		$d = new Departamento($depto_id);
		
		$this->data['depto'] =& $d;
		
		$this->load->view('templates/departamento_item', $this->data);
	}
	
	public function editar() {
		
		$depto_id = $this->uri->segment(3);
		$item_id = $this->uri->segment(4);
				
		$d_item = new Departamento_Item($item_id);		
		$d = new Departamento($depto_id);
		
		$this->data['d_item'] =& $d_item;
		$this->data['d'] =& $d;
		$this->data['d_itens'] =& $d->itens->get();
		
		$this->load->view('includes/top', $this->data);
		$this->load->view('forms/departamento_itens', $this->data);
        $this->load->view('includes/footer');
	}
	
	public function buscar() {
		$depto_id = $this->input->post('depto_id');
		$buscar = trim($this->input->post('buscar'));
		
		$d = new Departamento($depto_id);
		
		if ($buscar != "") {			
			$d_item = new Departamento_item();
			
			$d_item->where_related('departamento', 'id', $d)
					->ilike('descricao', $buscar)->or_where('id', $buscar);
			$d_item->get();
		
			$this->data['d_itens'] =& $d_item;
		} else {
			$this->data['d_itens'] =& $d->itens->get();
		}
		$this->data['d'] =& $d;
		
		$this->load->view('includes/top', $this->data);
		$this->load->view('forms/departamento_itens', $this->data);
        $this->load->view('includes/footer');
	}
}
/* End of file departamento_itens.php */
/* Location: ./application/controllers/departamento_itens.php */
