<?php

class Departamento extends DataMapper {
    
    var $table = 'departamento';
    
    var $has_many = array(
			'itens' => array(
					'class' => 'departamento_item',
					'cascade_delete' => FALSE)
	);
    
    /**
     * Construtor padrão
     */
    function __construct($id = NULL) {
		parent::__construct($id);
    }
    
}

/* End of file departamento.php */
/* Location: ./application/models/departamento.php */
