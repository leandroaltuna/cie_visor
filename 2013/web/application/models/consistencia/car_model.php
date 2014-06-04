<?php 
class Car_model extends CI_MODEL{

//CAR
    function get_car($id,$pr){
		$this->db->select('pc.*');
		$this->db->select('d.CCDD, d.Nombre as departamento');
		$this->db->select('p.CCPP, p.Nombre as provincia');
		$this->db->select('di.CCDI, di.Nombre as distriton');
		$this->db->from('PCar pc');
        $this->db->join('DPTO d','pc.PC_A_1_Dep = d.CCDD','left');	    	
        $this->db->join('PROV p','pc.PC_A_1_Dep = p.CCDD and pc.PC_A_2_Prov = p.CCPP','left');	    	
        $this->db->join('DIST di','pc.PC_A_1_Dep = di.CCDD and pc.PC_A_2_Prov = di.CCPP and pc.PC_A_3_Dist = di.CCDI','left');	    	
        $this->db->where('pc.id_local', $id );
        $this->db->where('pc.Nro_Pred', $pr );
        $q = $this->db->get();
        return $q;
    }

    function get_car_n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('PCar_C_1N');
        return $q;
    }

    function get_car_distritos($d,$p){
        $this->db->where('CCDD', $d );
        $this->db->where('CCPP', $p);
        $this->db->order_by('Nombre asc');
        $q = $this->db->get('DIST');
        return $q;
    }    

    function consulta_car($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('PCar');
        return $q;
    }      
    
    function insert_car($data){
        $this->db->insert('PCar', $data);
        return $this->db->affected_rows() > 0;
    }    
    
    function update_car($id,$pr,$data){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->update('PCar', $data);
        return $this->db->affected_rows() > 0;
    }

    function insert_car_n($data){
        $this->db->insert('PCar_C_1N', $data);
        return $this->db->affected_rows() > 0;
    }  

    function delete_car_n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );        
        $this->db->delete('PCar_C_1N');
        return $this->db->affected_rows() > 0;
    }  

//CAR

}