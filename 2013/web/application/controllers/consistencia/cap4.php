<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap4 extends CI_Controller {
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
		$this->load->model('consistencia/cap4_model');
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
			
		

			$fields = $this->principal_model->get_fields('P4');
			$fields_n = $this->principal_model->get_fields('P4_2N');
			
			$p4_2n_num_fr = $this->input->post('P4_2_CantTram_Lfrente');
			$p4_2n_num_d = $this->input->post('P4_2_CantTram_Lderecho');
			$p4_2n_num_fo = $this->input->post('P4_2_CantTram_Lfondo');
			$p4_2n_num_i = $this->input->post('P4_2_CantTram_Lizq');
			$cantidad_tramos = $p4_2n_num_fr+$p4_2n_num_d+$p4_2n_num_fo+$p4_2n_num_i;
			
			//p4
			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$c_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

		
			foreach ($fields_n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
					$pre_n[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}

			// $c_data['user_id'] = $this->tank_auth->get_user_id();			
			$c_data['user_id'] = $ui;
			$c_data['last_ip'] =  $this->input->ip_address();
			$c_data['user_agent'] = $this->agent->agent_string();

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';
			if ($this->cap4_model->consulta_cap4($id,$pr)->num_rows() == 0) {
				$c_data['id_local'] = $id;
				$c_data['Nro_Pred'] = $pr;
				$c_data['created'] = date('Y-m-d H:i:s');
				// inserta nuevo registro
					if($this->cap4_model->insert_cap4($c_data) > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente el Cap IV';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Cap4-i';
					}

			} else {
				// actualiza
				$c_data['modified'] = date('Y-m-d H:i:s');
					if($this->cap4_model->update_cap4($id,$pr,$c_data) > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente el Cap IV';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Cap4-u';		
					}

			}

			//p4_2n
			$this->cap4_model->delete_cap4_2n($id,$pr);

			// $c_data_n['user_id'] = $this->tank_auth->get_user_id();
			$c_data_n['user_id'] = $ui;
			$c_data_n['last_ip'] =  $this->input->ip_address();
			$c_data_n['user_agent'] = $this->agent->agent_string();
			$c_data_n['created'] = date('Y-m-d H:i:s');

			$c_data_n['id_local'] = $id;
			$c_data_n['Nro_Pred'] = $pr;

			if($cantidad_tramos > 0){
				$cc = 0;
				//foreach($pre_n['P4_2_LindTipo'] as &$z){
				for ($i=0; $i<$cantidad_tramos; $i++){
					if ( $cc<$p4_2n_num_fr ) {
						$c_data_n['P4_2_LindTipo'] = 1;
					}elseif ( $cc>=($p4_2n_num_fr) && $cc<($p4_2n_num_fr+$p4_2n_num_d) ){
						$c_data_n['P4_2_LindTipo'] = 2;
					}elseif ( $cc>=($p4_2n_num_fr+$p4_2n_num_d) && $cc<($p4_2n_num_fr+$p4_2n_num_d+$p4_2n_num_fo) ) {
						$c_data_n['P4_2_LindTipo'] = 3;
					}elseif ( $cc>=($p4_2n_num_fr+$p4_2n_num_d+$p4_2n_num_fo) && $cc<($p4_2n_num_fr+$p4_2n_num_d+$p4_2n_num_fo+$p4_2n_num_i) ) {
						$c_data_n['P4_2_LindTipo'] = 4;
					}
					
					foreach ($fields_n as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified','P4_2_LindTipo'))){
							$c_data_n[$b] = (!isset($pre_n[$b][$cc]) || $pre_n[$b][$cc] == '') ? NULL : $pre_n[$b][$cc];
						}
					}
					$this->cap4_model->insert_cap4_2n($c_data_n);
					$cc++;
				}
				//}
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