<?php

class Personal_patrimonio_model extends CI_MODEL{

	public function __construct() {
            parent::__construct();
            $this->load->database();
    }


	public function get_token($token){
		$q=$this->db->query("select token from Personal_Patrimonio where token=?", array($token));
        return $q;
	}

}