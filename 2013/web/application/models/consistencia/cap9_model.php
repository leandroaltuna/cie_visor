<?php 
class Cap9_model extends CI_MODEL{
	
	public function get_cap9_f($id,$pr)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P9_F');
		return $q;
	}
}

?>