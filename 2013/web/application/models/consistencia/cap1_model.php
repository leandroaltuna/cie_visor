<?php 
class Cap1_model extends CI_MODEL{

    function insert_cap1($data,$tb){
        $this->db->insert($tb, $data);
        return $this->db->affected_rows() > 0;
    }    
    
    function update_cap1($id,$pr,$data,$tb){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->update($tb, $data);
        return $this->db->affected_rows() > 0;
    } 

    function delete_cap1($id,$pr,$tb){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->delete($tb);
        return $this->db->affected_rows() > 0;
    }
    ///////////////////////////////////////////////////////////////////////////////
    //IE
    function delete_cap1_ie($id,$pr,$ie,$tb){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->where('P1_A_2_NroIE',$ie);
        $this->db->delete($tb);
        return $this->db->affected_rows() > 0;
    }
    function update_cap1_ie($id,$pr,$ie,$data,$tb){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->where('P1_A_2_NroIE',$ie);
        $this->db->update($tb,$data);
        return $this->db->affected_rows() > 0;
    }
    function get_cap1_ie($id,$pr,$ie){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $this->db->where('P1_A_2_NroIE',$ie);
        $q = $this->db->get('P1_A_2N');
        return $q;
    }  
    ////////////////////////////////////////////////////////////////////////////////


    ///////////////////////////////////////////////////////////////////////////////
    //COD MOD
    function update_cap1_cm($id,$pr,$ie,$cm,$data,$tb){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->where('P1_A_2_NroIE',$ie);
        $this->db->where('P1_A_2_9_NroCMod',$cm);
        $this->db->update($tb,$data);
        return $this->db->affected_rows() > 0;
    }
    function get_cap1_codmod($id,$pr,$ie){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $this->db->where('P1_A_2_NroIE',$ie);
        $q = $this->db->get('P1_A_2_8N');
        return $q;
    }  

    function delete_cap1_codmod($id,$pr,$ie,$cm,$tb){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->where('P1_A_2_NroIE',$ie);
        $this->db->where('P1_A_2_9_NroCMod',$cm);
        $this->db->delete($tb);
        return $this->db->affected_rows() > 0;
    }   
    ////////////////////////////////////////////////////////////////////////////////
    //AXS
    function get_cap1_ax($id,$pr,$ie,$cm){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $this->db->where('P1_A_2_NroIE',$ie);
        $this->db->where('P1_A_2_9_NroCMod',$cm);
        $q = $this->db->get('P1_A_2_9N');
        return $q;
    }  

    function get_cap1_axi($id,$pr,$ie,$cm,$ax){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $this->db->where('P1_A_2_NroIE',$ie);
        $this->db->where('P1_A_2_9_NroCMod',$cm);
        $this->db->where('P1_A_2_9_Nro',$ax);
        $q = $this->db->get('P1_C');
        return $q;
    }  

    function get_cap1_axic($id,$pr,$ie,$cm,$ax){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $this->db->where('P1_A_2_NroIE',$ie);
        $this->db->where('P1_A_2_9_NroCMod',$cm);
        $this->db->where('P1_A_2_9_Nro',$ax);
        $q = $this->db->get('P1_C_20N');
        return $q;
    }  

    function update_cap1_ax($id,$pr,$ie,$cm,$ax,$data){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->where('P1_A_2_NroIE',$ie);
        $this->db->where('P1_A_2_9_NroCMod',$cm);
        $this->db->where('P1_A_2_9_Nro',$ax);
        $this->db->update('P1_C',$data);
        return $this->db->affected_rows() > 0;
    }

    function delete_cap1_ax($id,$pr,$ie,$cm,$tb){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->where('P1_A_2_NroIE',$ie);
        $this->db->where('P1_A_2_9_NroCMod',$cm);
        $this->db->delete($tb);
        return $this->db->affected_rows() > 0;
    }   


    function delete_cap1_ax_c($id,$pr,$ie,$cm,$ax,$tb){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->where('P1_A_2_NroIE',$ie);
        $this->db->where('P1_A_2_9_NroCMod',$cm);
        $this->db->where('P1_A_2_9_Nro',$ax);
        $this->db->delete($tb);
        return $this->db->affected_rows() > 0;
    }   
    ////////////////////////////////////////////////////////////////////////////////



    function get_p1_a($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P1_A');
        return $q;
    }  

    function get_p1_b($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P1_B');
        return $q;
    }  

    function get_p1_a_2n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P1_A_2N');
        return $q;
    }  

    function get_p1_a_2_8n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P1_A_2_8N');
        return $q;
    }  

    function get_p1_a_2_9n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P1_A_2_9N');
        return $q;
    }  

    function get_p1_c($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P1_C');
        return $q;
    }   

    function get_p1_c_20n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P1_C_20N');
        return $q;
    }          
}