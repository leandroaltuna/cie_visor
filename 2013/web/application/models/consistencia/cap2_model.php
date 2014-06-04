<?php 
class Cap2_model extends CI_MODEL{
//CAR
    function consulta_cap2($id,$pr,$tb){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get($tb);
        return $q;
    }

    function insert_cap2($data,$tb){
        $this->db->insert($tb, $data);
        return $this->db->affected_rows() > 0;
    }    
    
    function update_cap2($id,$pr,$data,$tb){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->update($tb, $data);
        return $this->db->affected_rows() > 0;
    }
    function delete_cap2($id,$pr,$tb){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->delete($tb);
        return $this->db->affected_rows() > 0;
    }

	//A
    function get_p2_a($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P2_A');
        return $q;
    }


    //B
    function get_p2_b($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P2_B');
        return $q;
    }

    function get_p2_b_9n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P2_B_9N');
        return $q;
    }

    function get_p2_b_10n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_B_10N');
        return $q;
    }    

    function get_p2_b_11n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_B_11N');
        return $q;
    }  

    function get_p2_b_12n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_B_12N');
        return $q;
    }  


    //C
    function get_p2_c($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P2_C');
        return $q;
    }

    //D
    function get_p2_d($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P2_D');
        return $q;
    }

    function get_p2_d_1n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_D_1N');
        return $q;
    }    

    function get_p2_d_3n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_D_3N');
        return $q;
    }  

    function get_p2_d_5n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_D_5N');
        return $q;
    } 

    function get_p2_d_7n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_D_7N');
        return $q;
    } 

    function get_p2_d_9n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_D_9N');
        return $q;
    } 


    //E
    function get_p2_e($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_E');
        return $q;
    } 

    //F
    function get_p2_f($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_F');
        return $q;
    }   

    //G
    function get_p2_g($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_G');
        return $q;
    }  

    function get_p2_g_2n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr);
        $q = $this->db->get('P2_G_2N');
        return $q;
    }









    // function insert_car($data){
    //     $this->db->insert('PCar', $data);
    //     return $this->db->affected_rows() > 0;
    // }    
    
    // function update_car($id,$pr,$data){
    //     $this->db->where('id_local',$id);
    //     $this->db->where('Nro_Pred',$pr);
    //     $this->db->update('PCar', $data);
    //     return $this->db->affected_rows() > 0;
    // }

    // function insert_car_n($data){
    //     $this->db->insert('PCar_C_1N', $data);
    //     return $this->db->affected_rows() > 0;
    // }  

    // function delete_car_n($id,$pr){
    //     $this->db->where('id_local', $id );
    //     $this->db->where('Nro_Pred', $pr );        
    //     $this->db->delete('PCar_C_1N');
    //     return $this->db->affected_rows() > 0;
    // }  


}