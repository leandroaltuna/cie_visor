<?php 
class Reporte_model extends CI_MODEL{

	
	function get_ResultadoFinal($id)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', 1 );
		$q = $this->db->get('PCar');
		return $q;
	}


	function get_EstadoPadlocal($id)
	{
		$this->db->where('codigo_de_local', $id );
		$q = $this->db->get('Padlocal');
		return $q;
	}

	function update_estado_dig($id,$data){
		$this->db->where('codigo_de_local',$id);
		$this->db->update('Padlocal', $data);
		return $this->db->affected_rows() > 0;
	}

}