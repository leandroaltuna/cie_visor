<?php 
class Cap4_model extends CI_MODEL{
	
	public function get_cap4($id,$pr)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P4');
		return $q;
	}

	public function get_cap4_n($id,$pr)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P4_2N');
		return $q;
    }

	function consulta_cap4($id,$pr){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P4');
		return $q;
	}

	function insert_cap4($data){
		$this->db->insert('P4', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap4($id,$pr,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->update('P4', $data);
		return $this->db->affected_rows() > 0;
	}

	function delete_cap4_2n($id,$pr){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );        
		$this->db->delete('P4_2N');
		return $this->db->affected_rows() > 0;
	}

	function insert_cap4_2n($data){
		$this->db->insert('P4_2N', $data);
		return $this->db->affected_rows() > 0;
	}
}

?>