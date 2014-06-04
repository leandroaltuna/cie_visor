<?php

class Procedure_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

      function query_by_Local($id_usuario,$id_local){
       
        $q=$this->db->query("Vis_Locales_Estado_xCodLocal ?,?",array($id_usuario,$id_local));
        return $q;
    
    }

}

?>