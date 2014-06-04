<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Roles extends CI_Model
{
	

	function __construct()
	{
		parent::__construct();
	}

	
	function get_roles_by_user($user_id)
	{
		$this->db->select('ur.role_id, r.rolename as rolename,ur.level,r.url as url');
		$this->db->from('users_has_roles ur');
		$this->db->join('roles r', 'r.id = ur.role_id','inner');
		$this->db->where('ur.user_id', $user_id);
		$this->db->where('ur.active', 1);
		$this->db->where('r.active', 1);

		$query = $this->db->get();
		return $query->result();
	}

	function get_ubigeo($user_id)
	{
		$this->db->select('up.ubigeo');
		$this->db->from('user_profiles up');
		$this->db->where('up.user_id', $user_id);
		$query = $this->db->get();
		return $query->row();
	}	
}