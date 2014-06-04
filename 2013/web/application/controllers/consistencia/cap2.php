<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap2 extends CI_Controller {
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
		$this->load->model('consistencia/cap2_model');			
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

			$cap2_p2_a = $this->principal_model->get_fields('P2_A');
			$cap2_p2_b = $this->principal_model->get_fields('P2_B');
			$cap2_p2_b_9n = $this->principal_model->get_fields('P2_B_9N');
			$cap2_p2_b_10n = $this->principal_model->get_fields('P2_B_10N');
			$cap2_p2_b_11n = $this->principal_model->get_fields('P2_B_11N');
			$cap2_p2_b_12n = $this->principal_model->get_fields('P2_B_12N');
			$cap2_p2_c = $this->principal_model->get_fields('P2_C');
			$cap2_p2_d = $this->principal_model->get_fields('P2_D');
			$cap2_p2_d_1n = $this->principal_model->get_fields('P2_D_1N');
			$cap2_p2_d_3n = $this->principal_model->get_fields('P2_D_3N');
			$cap2_p2_d_5n = $this->principal_model->get_fields('P2_D_5N');
			$cap2_p2_d_7n = $this->principal_model->get_fields('P2_D_7N');
			$cap2_p2_d_9n = $this->principal_model->get_fields('P2_D_9N');
			$cap2_p2_e = $this->principal_model->get_fields('P2_E');
			$cap2_p2_f = $this->principal_model->get_fields('P2_F');
			$cap2_p2_g = $this->principal_model->get_fields('P2_G');
			$cap2_p2_g_2n = $this->principal_model->get_fields('P2_G_2N');
			
			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//p2_a
			foreach ($cap2_p2_a as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_a_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$cap2_p2_a_data['id_local'] = $id;
			$cap2_p2_a_data['Nro_Pred'] = $pr;

			if ($this->cap2_model->consulta_cap2($id,$pr,'P2_A')->num_rows() == 0) {
				
				// $cap2_p2_a_data['user_id'] = $this->tank_auth->get_user_id();
				$cap2_p2_a_data['user_id'] = $ui;
				$cap2_p2_a_data['created'] = date('Y-m-d H:i:s');
				$cap2_p2_a_data['last_ip'] =  $this->input->ip_address();
				$cap2_p2_a_data['user_agent'] = $this->agent->agent_string();

					if($this->cap2_model->insert_cap2($cap2_p2_a_data,'P2_A') > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-i-cap2_p2_a';		
					}


			} else {
				// $cap2_p2_a_data['user_id'] = $this->tank_auth->get_user_id();
				$cap2_p2_a_data['user_id'] = $ui;
				$cap2_p2_a_data['modified'] = date('Y-m-d H:i:s');
				$cap2_p2_a_data['last_ip'] =  $this->input->ip_address();
				$cap2_p2_a_data['user_agent'] = $this->agent->agent_string();

					if($this->cap2_model->update_cap2($id,$pr,$cap2_p2_a_data,'P2_A')  > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-u-cap2_p2_a';		
					}				
			}		

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//p2_b
			foreach ($cap2_p2_b as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_b_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$cap2_p2_b_data['id_local'] = $id;
			$cap2_p2_b_data['Nro_Pred'] = $pr;

			if ($this->cap2_model->consulta_cap2($id,$pr,'P2_B')->num_rows() == 0) {

					// $cap2_p2_b_data['user_id'] = $this->tank_auth->get_user_id();
					$cap2_p2_b_data['user_id'] = $ui;
					$cap2_p2_b_data['created'] = date('Y-m-d H:i:s');
					$cap2_p2_b_data['last_ip'] =  $this->input->ip_address();
					$cap2_p2_b_data['user_agent'] = $this->agent->agent_string();		

					if($this->cap2_model->insert_cap2($cap2_p2_b_data,'P2_B') > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-i-cap2_p2_b';		
					}				
			} else {
					// $cap2_p2_b_data['user_id'] = $this->tank_auth->get_user_id();
					$cap2_p2_b_data['user_id'] = $ui;
					$cap2_p2_b_data['modified'] = date('Y-m-d H:i:s');
					$cap2_p2_b_data['last_ip'] =  $this->input->ip_address();
					$cap2_p2_b_data['user_agent'] = $this->agent->agent_string();		

					if($this->cap2_model->update_cap2($id,$pr,$cap2_p2_b_data,'P2_B') > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-u-cap2_p2_b';		
					}					
			}	

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_B_9N
			foreach ($cap2_p2_b_9n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_b_9n_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$this->cap2_model->delete_cap2($id,$pr,'P2_B_9N');

			$cap2_p2_b_9n_data['id_local'] = $id;
			$cap2_p2_b_9n_data['Nro_Pred'] = $pr;	

			// $cap2_p2_b_9n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_b_9n_data['user_id'] = $ui;
			$cap2_p2_b_9n_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_b_9n_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_b_9n_data['user_agent'] = $this->agent->agent_string();				
			$cc = 0;
			foreach($cap2_p2_b_9n_pre['P2_B_9_Cod'] as &$z){

					foreach ($cap2_p2_b_9n as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
							if($b == 'P2_B_9_Cod_e')
								$cap2_p2_b_9n_data[$b] = ($cap2_p2_b_9n_pre['P2_B_9_Cod'][$cc] == '') ? NULL : $cap2_p2_b_9n_pre['P2_B_9_Cod'][$cc];
							if($b == 'P2_B_9_Cod')
								$cap2_p2_b_9n_data[$b] = $cc+1;
						}	
					}
					$this->cap2_model->insert_cap2($cap2_p2_b_9n_data,'P2_B_9N');			
					$cc++;
			}


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_B_10N
			foreach ($cap2_p2_b_10n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_b_10n_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$this->cap2_model->delete_cap2($id,$pr,'P2_B_10N');

			$cap2_p2_b_10n_data['id_local'] = $id;
			$cap2_p2_b_10n_data['Nro_Pred'] = $pr;	

			// $cap2_p2_b_10n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_b_10n_data['user_id'] = $ui;
			$cap2_p2_b_10n_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_b_10n_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_b_10n_data['user_agent'] = $this->agent->agent_string();	

			$cc = 0;
			foreach($cap2_p2_b_10n_pre['P2_B_10_Cod'] as &$z){

					foreach ($cap2_p2_b_10n as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
							if($b == 'P2_B_10_Cod_e')
								$cap2_p2_b_10n_data[$b] = ($cap2_p2_b_10n_pre['P2_B_10_Cod'][$cc] == '') ? NULL : $cap2_p2_b_10n_pre['P2_B_10_Cod'][$cc];
							if($b == 'P2_B_10_Cod')
								$cap2_p2_b_10n_data[$b] = $cc+1;
						}	
					}
					$this->cap2_model->insert_cap2($cap2_p2_b_10n_data,'P2_B_10N');			
					$cc++;
			}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_B_11N
			foreach ($cap2_p2_b_11n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_b_11n_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$this->cap2_model->delete_cap2($id,$pr,'P2_B_11N');

			$cap2_p2_b_11n_data['id_local'] = $id;
			$cap2_p2_b_11n_data['Nro_Pred'] = $pr;	

			// $cap2_p2_b_11n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_b_11n_data['user_id'] = $ui;
			$cap2_p2_b_11n_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_b_11n_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_b_11n_data['user_agent'] = $this->agent->agent_string();	

			$cc = 0;
			foreach($cap2_p2_b_11n_pre['P2_B_11_Cod'] as &$z){

					foreach ($cap2_p2_b_11n as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
							if($b == 'P2_B_11_Cod_e')
								$cap2_p2_b_11n_data[$b] = ($cap2_p2_b_11n_pre['P2_B_11_Cod'][$cc] == '') ? NULL : $cap2_p2_b_11n_pre['P2_B_11_Cod'][$cc];
							if($b == 'P2_B_11_Cod')
								$cap2_p2_b_11n_data[$b] = $cc+1;
							//otro		
							if($b == 'P2_B_11_Cod_O')
								$cap2_p2_b_11n_data[$b] = ($cc == 10)? $cap2_p2_b_11n_pre[$b] : NULL;								
						}	
					}
					$this->cap2_model->insert_cap2($cap2_p2_b_11n_data,'P2_B_11N');			
					$cc++;
			}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_B_12N
			foreach ($cap2_p2_b_12n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_b_12n_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$this->cap2_model->delete_cap2($id,$pr,'P2_B_12N');

			$cap2_p2_b_12n_data['id_local'] = $id;
			$cap2_p2_b_12n_data['Nro_Pred'] = $pr;	

			// $cap2_p2_b_12n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_b_12n_data['user_id'] = $ui;
			$cap2_p2_b_12n_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_b_12n_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_b_12n_data['user_agent'] = $this->agent->agent_string();	

			$cc = 0;
			foreach($cap2_p2_b_12n_pre['P2_B_12_Cod'] as &$z){

					foreach ($cap2_p2_b_12n as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
							if($b == 'P2_B_12_Cod_e')
								$cap2_p2_b_12n_data[$b] = ($cap2_p2_b_12n_pre['P2_B_12_Cod'][$cc] == '') ? NULL : $cap2_p2_b_12n_pre['P2_B_12_Cod'][$cc];
							if($b == 'P2_B_12_Cod')
								$cap2_p2_b_12n_data[$b] = $cc+1;
							//otro		
							if($b == 'P2_B_12_Cod_O')
								$cap2_p2_b_12n_data[$b] = ($cc == 5)? $cap2_p2_b_12n_pre[$b] : NULL;								
						}	
					}
					$this->cap2_model->insert_cap2($cap2_p2_b_12n_data,'P2_B_12N');			
					$cc++;
			}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//p2_c
			foreach ($cap2_p2_c as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_c_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$cap2_p2_c_data['id_local'] = $id;
			$cap2_p2_c_data['Nro_Pred'] = $pr;



			if ($this->cap2_model->consulta_cap2($id,$pr,'P2_C')->num_rows() == 0) {

					// $cap2_p2_c_data['user_id'] = $this->tank_auth->get_user_id();
					$cap2_p2_c_data['user_id'] = $ui;
					$cap2_p2_c_data['created'] = date('Y-m-d H:i:s');
					$cap2_p2_c_data['last_ip'] =  $this->input->ip_address();
					$cap2_p2_c_data['user_agent'] = $this->agent->agent_string();	

					if($this->cap2_model->insert_cap2($cap2_p2_c_data,'P2_C') > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-i-cap2_p2_d';		
					}				
			} else {
					// $cap2_p2_c_data['user_id'] = $this->tank_auth->get_user_id();
					$cap2_p2_c_data['user_id'] = $ui;
					$cap2_p2_c_data['modified'] = date('Y-m-d H:i:s');
					$cap2_p2_c_data['last_ip'] =  $this->input->ip_address();
					$cap2_p2_c_data['user_agent'] = $this->agent->agent_string();	

					if($this->cap2_model->update_cap2($id,$pr,$cap2_p2_c_data,'P2_C') > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-u-cap2_p2_d';		
					}					
			}	

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//p2_d
			foreach ($cap2_p2_d as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_d_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$cap2_p2_d_data['id_local'] = $id;
			$cap2_p2_d_data['Nro_Pred'] = $pr;

			if ($this->cap2_model->consulta_cap2($id,$pr,'P2_D')->num_rows() == 0) {
					// $cap2_p2_d_data['user_id'] = $this->tank_auth->get_user_id();
					$cap2_p2_d_data['user_id'] = $ui;
					$cap2_p2_d_data['created'] = date('Y-m-d H:i:s');
					$cap2_p2_d_data['last_ip'] =  $this->input->ip_address();
					$cap2_p2_d_data['user_agent'] = $this->agent->agent_string();					
					if($this->cap2_model->insert_cap2($cap2_p2_d_data,'P2_D') > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-i-cap2_p2_d';		
					}				
			} else {
					// $cap2_p2_d_data['user_id'] = $this->tank_auth->get_user_id();
					$cap2_p2_d_data['user_id'] = $ui;
					$cap2_p2_d_data['modified'] = date('Y-m-d H:i:s');
					$cap2_p2_d_data['last_ip'] =  $this->input->ip_address();
					$cap2_p2_d_data['user_agent'] = $this->agent->agent_string();	

					if($this->cap2_model->update_cap2($id,$pr,$cap2_p2_d_data,'P2_D') > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-u-cap2_p2_d';		
					}					
			}	


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_D_1N
			foreach ($cap2_p2_d_1n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_d_1n_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$this->cap2_model->delete_cap2($id,$pr,'P2_D_1N');

			$cap2_p2_d_1n_data['id_local'] = $id;
			$cap2_p2_d_1n_data['Nro_Pred'] = $pr;	

			// $cap2_p2_d_1n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_d_1n_data['user_id'] = $ui;
			$cap2_p2_d_1n_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_d_1n_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_d_1n_data['user_agent'] = $this->agent->agent_string();	

			$cc = 0;
			foreach($cap2_p2_d_1n_pre['P2_D_1_Cod'] as &$z){

					foreach ($cap2_p2_d_1n as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
							if($b == 'P2_D_1_Cod_Est')
								$cap2_p2_d_1n_data[$b] = ($cap2_p2_d_1n_pre['P2_D_1_Cod'][$cc] == '') ? NULL : $cap2_p2_d_1n_pre['P2_D_1_Cod'][$cc];
							if($b == 'P2_D_1_Cod')
								$cap2_p2_d_1n_data[$b] = $cc+1;
							//otro		
							if($b == 'P2_D_1_Cod_O')
								$cap2_p2_d_1n_data[$b] = ($cc == 3)? $cap2_p2_d_1n_pre[$b] : NULL;								
						}	
					}
					$this->cap2_model->insert_cap2($cap2_p2_d_1n_data,'P2_D_1N');			
					$cc++;
			}



			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_D_3N
			foreach ($cap2_p2_d_3n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_d_3n_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	
			$this->cap2_model->delete_cap2($id,$pr,'P2_D_3N');

			$cap2_p2_d_3n_data['id_local'] = $id;
			$cap2_p2_d_3n_data['Nro_Pred'] = $pr;	

			// $cap2_p2_d_3n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_d_3n_data['user_id'] = $ui;
			$cap2_p2_d_3n_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_d_3n_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_d_3n_data['user_agent'] = $this->agent->agent_string();	


			$cc = 0;
			if(isset($cap2_p2_d_3n_pre['P2_D_3_Nro'])){
				foreach($cap2_p2_d_3n_pre['P2_D_3_Nro'] as &$z){
						foreach ($cap2_p2_d_3n as $a=>$b) {
							if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
								$cap2_p2_d_3n_data[$b] = ($cap2_p2_d_3n_pre[$b][$cc] == '') ? NULL : $cap2_p2_d_3n_pre[$b][$cc];
							}	
						}
						$this->cap2_model->insert_cap2($cap2_p2_d_3n_data,'P2_D_3N');			
						$cc++;
				}
			}




			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_D_5N
			foreach ($cap2_p2_d_5n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_d_5n_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$this->cap2_model->delete_cap2($id,$pr,'P2_D_5N');

			// $cap2_p2_d_5n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_d_5n_data['user_id'] = $ui;
			$cap2_p2_d_5n_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_d_5n_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_d_5n_data['user_agent'] = $this->agent->agent_string();	

			$cap2_p2_d_5n_data['id_local'] = $id;
			$cap2_p2_d_5n_data['Nro_Pred'] = $pr;	
			$cc = 0;
			foreach($cap2_p2_d_5n_pre['P2_D_5_Cod'] as &$z){

					foreach ($cap2_p2_d_5n as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
							if($b == 'P2_D_5_Cod_Est')
								$cap2_p2_d_5n_data[$b] = ($cap2_p2_d_5n_pre['P2_D_5_Cod'][$cc] == '') ? NULL : $cap2_p2_d_5n_pre['P2_D_5_Cod'][$cc];
							if($b == 'P2_D_5_Cod')
								$cap2_p2_d_5n_data[$b] = $cc+1;
							//otro		
							if($b == 'P2_D_5_Cod_O')
								$cap2_p2_d_5n_data[$b] = ($cc == 5)? $cap2_p2_d_5n_pre[$b] : NULL;								
						}	
					}
					$this->cap2_model->insert_cap2($cap2_p2_d_5n_data,'P2_D_5N');			
					$cc++;
			}


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_D_7N
			foreach ($cap2_p2_d_7n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_d_7n_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	
			$this->cap2_model->delete_cap2($id,$pr,'P2_D_7N');

			$cap2_p2_d_7n_data['id_local'] = $id;
			$cap2_p2_d_7n_data['Nro_Pred'] = $pr;	

			// $cap2_p2_d_7n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_d_7n_data['user_id'] = $ui;
			$cap2_p2_d_7n_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_d_7n_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_d_7n_data['user_agent'] = $this->agent->agent_string();	

			$cc = 0;
			if(isset($cap2_p2_d_7n_pre['P2_D_7_Nro'])){
				foreach($cap2_p2_d_7n_pre['P2_D_7_Nro'] as &$z){
						foreach ($cap2_p2_d_7n as $a=>$b) {
							if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
								$cap2_p2_d_7n_data[$b] = ($cap2_p2_d_7n_pre[$b][$cc] == '') ? NULL : $cap2_p2_d_7n_pre[$b][$cc];
							}	
						}
						$this->cap2_model->insert_cap2($cap2_p2_d_7n_data,'P2_D_7N');			
						$cc++;
				}
			}



			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_D_9N
			foreach ($cap2_p2_d_9n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_d_9n_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$this->cap2_model->delete_cap2($id,$pr,'P2_D_9N');

			$cap2_p2_d_9n_data['id_local'] = $id;
			$cap2_p2_d_9n_data['Nro_Pred'] = $pr;	

			// $cap2_p2_d_9n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_d_9n_data['user_id'] = $ui;
			$cap2_p2_d_9n_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_d_9n_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_d_9n_data['user_agent'] = $this->agent->agent_string();	

			$cc = 0;
			foreach($cap2_p2_d_9n_pre['P2_D_9_Nro'] as &$z){

					foreach ($cap2_p2_d_9n as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
							if($b == 'P2_D_9_Cod')
								$cap2_p2_d_9n_data[$b] = ($cap2_p2_d_9n_pre['P2_D_9_Nro'][$cc] == '') ? NULL : $cap2_p2_d_9n_pre['P2_D_9_Nro'][$cc];
							if($b == 'P2_D_9_Nro')
								$cap2_p2_d_9n_data[$b] = $cc+1;							
						}	
					}
					$this->cap2_model->insert_cap2($cap2_p2_d_9n_data,'P2_D_9N');			
					$cc++;
			}


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_E
			foreach ($cap2_p2_e as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_e_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$cap2_p2_e_data['id_local'] = $id;
			$cap2_p2_e_data['Nro_Pred'] = $pr;


			if ($this->cap2_model->consulta_cap2($id,$pr,'P2_E')->num_rows() == 0) {
					// $cap2_p2_e_data['user_id'] = $this->tank_auth->get_user_id();
					$cap2_p2_e_data['user_id'] = $ui;
					$cap2_p2_e_data['created'] = date('Y-m-d H:i:s');
					$cap2_p2_e_data['last_ip'] =  $this->input->ip_address();
					$cap2_p2_e_data['user_agent'] = $this->agent->agent_string();	

					if($this->cap2_model->insert_cap2($cap2_p2_e_data,'P2_E') > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-i-cap2_p2_e';		
					}


			} else {
					// $cap2_p2_e_data['user_id'] = $this->tank_auth->get_user_id();
					$cap2_p2_e_data['user_id'] = $ui;
					$cap2_p2_e_data['modified'] = date('Y-m-d H:i:s');
					$cap2_p2_e_data['last_ip'] =  $this->input->ip_address();
					$cap2_p2_e_data['user_agent'] = $this->agent->agent_string();	

					if($this->cap2_model->update_cap2($id,$pr,$cap2_p2_e_data,'P2_E')  > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-u-cap2_p2_e';		
					}				
			}	

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_F
			foreach ($cap2_p2_f as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_f_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$this->cap2_model->delete_cap2($id,$pr,'P2_F');

			$cap2_p2_f_data['id_local'] = $id;
			$cap2_p2_f_data['Nro_Pred'] = $pr;	

			// $cap2_p2_f_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_f_data['user_id'] = $ui;
			$cap2_p2_f_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_f_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_f_data['user_agent'] = $this->agent->agent_string();	

			$cc = 0;
			foreach($cap2_p2_f_pre['P2_F_1_ElimBas'] as &$z){

					foreach ($cap2_p2_f as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
							if($b == 'P2_F_1_ElimBas_e')
								$cap2_p2_f_data[$b] = ($cap2_p2_f_pre['P2_F_1_ElimBas'][$cc] == '') ? NULL : $cap2_p2_f_pre['P2_F_1_ElimBas'][$cc];
							if($b == 'P2_F_1_ElimBas')
								$cap2_p2_f_data[$b] = $cc+1;
							//otro		
							if($b == 'P2_F_1_ElimBas_O')
								$cap2_p2_f_data[$b] = ($cc == 9)? $cap2_p2_f_pre[$b] : NULL;								
						}	
					}
					$this->cap2_model->insert_cap2($cap2_p2_f_data,'P2_F');			
					$cc++;
			}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//p2_g
			foreach ($cap2_p2_g as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_g_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$cap2_p2_g_data['id_local'] = $id;
			$cap2_p2_g_data['Nro_Pred'] = $pr;



			if ($this->cap2_model->consulta_cap2($id,$pr,'P2_G')->num_rows() == 0) {
				
					// $cap2_p2_g_data['user_id'] = $this->tank_auth->get_user_id();
					$cap2_p2_g_data['user_id'] = $ui;
					$cap2_p2_g_data['created'] = date('Y-m-d H:i:s');
					$cap2_p2_g_data['last_ip'] =  $this->input->ip_address();
					$cap2_p2_g_data['user_agent'] = $this->agent->agent_string();			
							
					if($this->cap2_model->insert_cap2($cap2_p2_g_data,'P2_G') > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-i-cap2_p2_g';		
					}


			} else {
					// $cap2_p2_g_data['user_id'] = $this->tank_auth->get_user_id();
					$cap2_p2_g_data['user_id'] = $ui;
					$cap2_p2_g_data['modified'] = date('Y-m-d H:i:s');
					$cap2_p2_g_data['last_ip'] =  $this->input->ip_address();
					$cap2_p2_g_data['user_agent'] = $this->agent->agent_string();

					if($this->cap2_model->update_cap2($id,$pr,$cap2_p2_g_data,'P2_G')  > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente Cap II';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-u-cap2_p2_g';		
					}				
			}	



			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P2_G_2N
			foreach ($cap2_p2_g_2n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap2_p2_g_2n_pre[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	
			$this->cap2_model->delete_cap2($id,$pr,'P2_G_2N');

			$cap2_p2_g_2n_data['id_local'] = $id;
			$cap2_p2_g_2n_data['Nro_Pred'] = $pr;	

			// $cap2_p2_g_2n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap2_p2_g_2n_data['user_id'] = $ui;
			$cap2_p2_g_2n_data['created'] = date('Y-m-d H:i:s');
			$cap2_p2_g_2n_data['last_ip'] =  $this->input->ip_address();
			$cap2_p2_g_2n_data['user_agent'] = $this->agent->agent_string();	
			
			$cc = 0;
			if($cap2_p2_g_2n_pre['P2_G_2_Cod'] > 0){
				foreach($cap2_p2_g_2n_pre['P2_G_2_Cod'] as &$z){
						foreach ($cap2_p2_g_2n as $a=>$b) {
							if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
								if($b == 'P2_G_2_Nro')
									$cap2_p2_g_2n_data[$b] = $cc+1;
								if($b == 'P2_G_2_Cod')
									$cap2_p2_g_2n_data[$b] = ($cap2_p2_g_2n_pre[$b][$cc] == '') ? NULL : $cap2_p2_g_2n_pre[$b][$cc];
								if($b == 'P2_G_2A_EstPre')
									$cap2_p2_g_2n_data[$b] = ($cap2_p2_g_2n_pre[$b][$cc] == '') ? NULL : $cap2_p2_g_2n_pre[$b][$cc];
								if($b == 'P2_G_2B_snip')
									$cap2_p2_g_2n_data[$b] = ($cap2_p2_g_2n_pre[$b][$cc] == '') ? NULL : $cap2_p2_g_2n_pre[$b][$cc];							
								//otro		
								if($b == 'P2_G_2_Otro')
									$cap2_p2_g_2n_data[$b] = ($cc == 6)? $cap2_p2_g_2n_pre[$b] : NULL;		
							}	
						}
						$this->cap2_model->insert_cap2($cap2_p2_g_2n_data,'P2_G_2N');			
						$cc++;
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