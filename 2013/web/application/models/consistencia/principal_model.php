<?php 
class Principal_model extends CI_MODEL{
    //dni
    function get_dnic($dni){
        $this->db->where('dni',$dni);
        $q = $this->db->get('registro');
        return $q;
    }

    function eliminar_cod($cod){
        $q=$this->db->query("PA_Elimina_Data_Local_No_Cap3 ?, ?", array($cod,'hi')); 
        return $q;        
    }

    //Seguridad
    function get_user_ubigeo($id){
        $this->db->where('id',$id);
        $q = $this->db->get('user_ubigeo');
        return $q;
    }
    function get_padlocal($id){
        $this->db->where('codigo_de_local',$id);
        $q = $this->db->get('Padlocal');
        return $q;
    }


	//predios
	function get_predios($id){
        $this->db->where('id_local',$id);
        $q = $this->db->get('P1_B_2A_N');
        return $q;
    }
    //predio base
    function get_predio_base($id,$pr){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $q = $this->db->get('P1_B_2A_N');
        return $q;
    }

    //predio i
    function get_predio($id,$pr){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $q = $this->db->get('P1_B_3N');
        return $q;
    }

    function insert_pr($data,$tb){
        $this->db->insert($tb, $data);
        return $this->db->affected_rows() > 0;
    }   

    function update_pr($id,$pr,$data){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->update('P1_B_3N',$data);
        return $this->db->affected_rows() > 0;
    }

    //predio n
    function get_predio_n($id,$pr){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $q = $this->db->get('P1_B_3_12N');
        return $q;
    }
    function delete_predio_n($id,$pr){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->delete('P1_B_3_12N');
        return $this->db->affected_rows() > 0;
    }



    //P1_B
	function get_prct($id,$pr){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $q = $this->db->get('P1_B');
        return $q;
    }

    function update_prct($id,$pr,$data){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->update('P1_B',$data);
        return $this->db->affected_rows() > 0;
    }
    //P1_B


 	function get_fields($c){
        $q = $this->db->list_fields($c);
        return $q;
    }

}