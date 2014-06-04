<?php 
class Cap5_model extends CI_MODEL{

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////P5
	public function get_cap5($id,$pr)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P5');
		return $q;
	}

	function consulta_cap5($id,$pr){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P5');
		return $q;
	}

	function insert_cap5($data){
		$this->db->insert('P5', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap5($id,$pr,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->update('P5', $data);
		return $this->db->affected_rows() > 0;
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////P5_F
	public function get_cap5_f($id,$pr)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr ); 	
		$q = $this->db->get('P5_F');
		return $q;
	}

	function get_cant_p5f($id,$pr)
	{
		$this->db->select_max('P5_NroPiso');
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P5_F');
		if ($q->num_rows() > 0) $row = $q->row();
		return $row->P5_NroPiso;
	}

	function get_cant_p5f_v2($id,$pr,$nropiso)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P5_NroPiso', $nropiso );
		$q = $this->db->get('P5_F');
		return $q;
	}

	function insert_cap5_f($data){
		$this->db->insert('P5_F', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap5_f($id,$pr,$nropiso,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->where('P5_NroPiso',$nropiso);
		$this->db->update('P5_F', $data);
		return $this->db->affected_rows() > 0;
	}

	function delete_cap5_f($id,$pr,$piso){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P5_NroPiso', $piso );
		$this->db->delete('P5_F');
		return $this->db->affected_rows() > 0;
	}


	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////P5_N
	public function get_cap5_n($id,$pr,$piso)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P5_NroPiso', $piso );
		$q = $this->db->get('P5_N');
		return $q;
	}

	function get_cant_p5n($id,$pr,$nropiso,$nroedif)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P5_NroPiso', $nropiso );
		$this->db->where('P5_Ed_Nro', $nroedif );
		$q = $this->db->get('P5_N');
		return $q;
	}

	function insert_cap5_n($data){
		$this->db->insert('P5_N', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap5_n($id,$pr,$nropiso,$nroedif,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->where('P5_NroPiso',$nropiso);
		$this->db->where('P5_Ed_Nro',$nroedif);
		$this->db->update('P5_N', $data);
		return $this->db->affected_rows() > 0;
	}

	function delete_p5n_for_edif($id,$pr,$edi){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );       
		$this->db->where('P5_Ed_Nro', $edi );
		$this->db->delete('P5_N');
		return $this->db->affected_rows() > 0;
	}

	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////cap6
	public function get_cap5n_for_p6_2($id,$pr,$nroedif)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P5_Ed_Nro', $nroedif );
		$q = $this->db->get('P5_N');
		return $q;
	}

}

?>