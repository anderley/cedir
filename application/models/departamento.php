<?php

class Departamento extends DataMapper {
    
    var $table = 'departamento';
    
    /**
     * Construtor padrão
     */
    function __construct($id = NULL) {
	parent::__construct($id);
    }
    
}

/* End of file departamento.php */
/* Location: ./application/models/departamento.php */