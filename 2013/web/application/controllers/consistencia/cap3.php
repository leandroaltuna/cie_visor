<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap3 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		


		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');	
		$this->lang->load('tank_auth');	
		$this->load->model('regs_model');		
		$this->load->model('consistencia/cap3_model');			
		$this->load->model('consistencia/principal_model');		

		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 16){
				$flag = TRUE;
				break;
			}
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}		
	}



	public function index()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			//id
			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$ui = $this->input->post('user_id');

			
			$fields = $this->principal_model->get_fields('P3_1');

			//pcar
			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified','P3_1_3_NroPtos','P3_1_4_ArchGPS','RutaFoto'))){
					$c_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			// $c_data['user_id'] = $this->tank_auth->get_user_id();
			// $c_data['created'] = date('Y-m-d H:i:s');
			// $c_data['last_ip'] =  $this->input->ip_address();
			// $c_data['user_agent'] = $this->agent->agent_string();

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';
			if ($this->cap3_model->get_cap3($id,$pr)->num_rows() == 0) {
				$c_data['id_local'] = $id;
				$c_data['Nro_Pred'] = $pr;
				// $c_data['user_id'] = $this->tank_auth->get_user_id();
				$c_data['user_id'] = $ui;
				$c_data['created'] = date('Y-m-d H:i:s');
				$c_data['last_ip'] =  $this->input->ip_address();
				$c_data['user_agent'] = $this->agent->agent_string();					
				// inserta nuevo registro
					if($this->cap3_model->insert_cap3($c_data) > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente el Capitulo III';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Car-i';		
					}

			} else {
				// $c_data['user_id'] = $this->tank_auth->get_user_id();
				$c_data['user_id'] = $ui;
				$c_data['modified'] = date('Y-m-d H:i:s');
				$c_data['last_ip'] =  $this->input->ip_address();
				$c_data['user_agent'] = $this->agent->agent_string();					
				// actualiza
					if($this->cap3_model->update_cap3($id,$pr,$c_data) > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente el Capitulo III';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Car-u';		
					}

			}

			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		

		}else{
			show_404();;
		}

	}

}