<?php

class Departamento_item extends DataMapper {
    
    var $table = 'departamento_item';
    
    var $has_one = array('departamento');
    
    /**
     * Construtor padrão
     */
    function __construct($id = NULL) {
	parent::__construct($id);
    }
    
}

/* End of file departamento_item.php */
/* Location: ./application/models/departamento_item.php */
