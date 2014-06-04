<?php 
class Cap8_model extends CI_MODEL{
	
	public function get_cap8($id,$pr,$tipo,$nro)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P8_2_Tipo', $tipo );
		$this->db->where('P8_2_Nro', $nro );
		$q = $this->db->get('P8');
		return $q;
	}

	function consulta_cap8($id,$pr,$tipo,$nro){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P8_2_Tipo', $tipo );
		$this->db->where('P8_2_Nro', $nro );
		$q = $this->db->get('P8');
		return $q;
	}

	function insert_cap8($data){
		$this->db->insert('P8', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap8($id,$pr,$tipo,$nro,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->where('P8_2_Tipo',$tipo);
		$this->db->where('P8_2_Nro',$nro);
		$this->db->update('P8', $data);
		return $this->db->affected_rows() > 0;
	}


	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////cap5
	function get_cant_p8_for_p5($id,$pr,$tipo)
	{
		$this->db->select_max('P8_2_Nro');
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P8_2_Tipo', $tipo );
		$q = $this->db->get('P8');
		if ($q->num_rows() > 0) $row = $q->row();
		return $row->P8_2_Nro;
	}

	function delete_p8_from_p5($id,$pr,$tipo,$nro){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );       
		$this->db->where('P8_2_Tipo', $tipo );
		$this->db->where('P8_2_Nro', $nro );
		$this->db->delete('P8');
		return $this->db->affected_rows() > 0;
	}

	function get_tot_otrasedif_p5($id,$pr,$tipo)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P5');
		if ($q->num_rows() > 0) $row = $q->row();
		switch ($tipo) {
			case '1':
				return $row->P5_Tot_P;	
				break;

			case '2':
				return $row->P5_Tot_LD;	
				break;

			case '3':
				return $row->P5_Tot_CTE;	
				break;

			case '4':
				return $row->P5_Tot_MC;	
				break;
		}
	}

}

?>