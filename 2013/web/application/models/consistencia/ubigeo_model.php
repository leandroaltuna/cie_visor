<?php 

class Ubigeo_model extends CI_MODEL{

	public function get_dptos(){
        $q = $this->db->get('DPTO');
        return $q;
    }

	public function get_provs($dep){
        $this->db->where('CCDD',$dep);
        $q = $this->db->get('PROV');
        return $q;
    }

	public function get_dis($dep,$prov){
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $q = $this->db->get('DIST');
        return $q;
    }


}