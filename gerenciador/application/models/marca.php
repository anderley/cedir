<?php

class Marca extends DataMapper {
    
    var $table = 'marca';
        
    /**
     * Construtor padr�o
     */
    function __construct($id = NULL) {
		parent::__construct($id);
    }
    
}

/* End of file marca.php */
/* Location: ./application/models/marca.php */
