<?php 
class Cap7_model extends CI_MODEL{
	
	public function get_cap7($id,$pr,$edi)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('Nro_Ed', $edi );
		$q = $this->db->get('P7');
		return $q;
	}

	function consulta_cap7($id,$pr,$edi){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('Nro_Ed', $edi );
		$q = $this->db->get('P7');
		return $q;
	}

	function insert_cap7($data){
		$this->db->insert('P7', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap7($id,$pr,$edi,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->where('Nro_Ed', $edi);
		$this->db->update('P7', $data);
		return $this->db->affected_rows() > 0;
	}
}

?>