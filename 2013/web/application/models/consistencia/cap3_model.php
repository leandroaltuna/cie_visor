<?php 
class Cap3_model extends CI_MODEL{

//CAP3
    public function get_cap3($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P3_1');
        return $q;
    }   

    public function get_cap3_n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P3_1_3N');
        return $q;
    }
//CAP3
    function insert_cap3($data){
        $this->db->insert('P3_1', $data);
        return $this->db->affected_rows() > 0;
    }    
    
    function update_cap3($id,$pr,$data){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->update('P3_1', $data);
        return $this->db->affected_rows() > 0;
    }
}