<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consistencia extends CI_Controller {
	public $level = 1;
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');	
		$this->lang->load('tank_auth');	
		$this->load->model('regs_model');		
		$this->load->model('consistencia/car_model');		
		$this->load->model('consistencia/cap1_model');		
		$this->load->model('consistencia/cap2_model');		
		$this->load->model('consistencia/cap3_model');		
		$this->load->model('consistencia/principal_model');		
		$this->load->model('consistencia/ubigeo_model');	
		$this->load->model('consistencia/cap4_model');
		$this->load->model('consistencia/cap5_model');
		$this->load->model('consistencia/cap9_model');
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 16){
				$this->level = $role->level;
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
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['main_content'] = 'consistencia/index_view';
	  		$this->load->view('backend/includes/template', $data);
	}

	public function local($id, $pr = null, $user_id)
	{
			if(is_null($pr))
				redirect($id . '/' . 1 . '/' . $user_id);



			$local = $this->principal_model->get_padlocal($id);
			$data['fdep'] = $local->row()->cod_dpto;
			$data['fprov'] = $local->row()->cod_prov;
			$data['fdis'] = $local->row()->cod_dist;
			$data['cod_area'] = $local->row()->cod_area;

			$prd = (is_null($pr))? 1 : $pr;
			$data['nav'] = TRUE;
			$data['title'] = 'Predios';
			//PREDIOS
			$data['predios'] = $this->principal_model->get_predios($id);

			//si no tiene ningun predio
			if($data['predios']->num_rows() == 0){

				$pr_data['user_id'] = $this->tank_auth->get_user_id();
				$pr_data['created'] = date('Y-m-d H:i:s');
				$pr_data['last_ip'] =  $this->input->ip_address();
				$pr_data['user_agent'] = $this->agent->agent_string();

				$pr_data['id_local'] = $id;	
				$pr_data['Nro_Pred'] = $prd;	
				$pr_data['P1_B_2A_PredNoCol'] = 0;
				//inserto el principal
 				$this->principal_model->insert_pr($pr_data,'P1_B_2A_N');	

 				$data['predios'] = $this->principal_model->get_predios($id);	
 			}	


 			//Get Predio INFO
 			$data['predio_b'] = $this->principal_model->get_predio_base($id,$prd);


 			$data['predio'] = $this->principal_model->get_predio($id,$prd);
 			$data['predio_n'] = $this->principal_model->get_predio_n($id,$prd);


			$data['car_i'] = $this->car_model->get_car($id,$prd);
			$data['car_n'] = $this->car_model->get_car_n($id,$prd);


			$data['cap1_p1_a'] = $this->cap1_model->get_p1_a($id,$prd);
			//ie
			$data['cap1_p1_a_2n'] = $this->cap1_model->get_p1_a_2n($id,$prd);
			//cm
			$data['cap1_p1_a_2_8n'] = $this->cap1_model->get_p1_a_2_8n($id,$prd);
			//ax
			$data['cap1_p1_a_2_9n'] = $this->cap1_model->get_p1_a_2_9n($id,$prd);
			
			$data['cap1_p1_b'] = $this->cap1_model->get_p1_b($id,$prd);
			$data['cap1_p1_c'] = $this->cap1_model->get_p1_c($id,$prd);
			$data['cap1_p1_c_20n'] = $this->cap1_model->get_p1_c_20n($id,$prd);






			$data['cap2_p2_a'] = $this->cap2_model->get_p2_a($id,$prd);
			$data['cap2_p2_b'] = $this->cap2_model->get_p2_b($id,$prd);
			$data['cap2_p2_b_9n'] = $this->cap2_model->get_p2_b_9n($id,$prd);
			$data['cap2_p2_b_10n'] = $this->cap2_model->get_p2_b_10n($id,$prd);
			$data['cap2_p2_b_11n'] = $this->cap2_model->get_p2_b_11n($id,$prd);
			$data['cap2_p2_b_12n'] = $this->cap2_model->get_p2_b_12n($id,$prd);
			$data['cap2_p2_c'] = $this->cap2_model->get_p2_c($id,$prd);

			$data['cap2_p2_d'] = $this->cap2_model->get_p2_d($id,$prd);
			$data['cap2_p2_d_1n'] = $this->cap2_model->get_p2_d_1n($id,$prd);
			$data['cap2_p2_d_3n'] = $this->cap2_model->get_p2_d_3n($id,$prd);
			$data['cap2_p2_d_5n'] = $this->cap2_model->get_p2_d_5n($id,$prd);
			$data['cap2_p2_d_7n'] = $this->cap2_model->get_p2_d_7n($id,$prd);
			$data['cap2_p2_d_9n'] = $this->cap2_model->get_p2_d_9n($id,$prd);

			$data['cap2_p2_e'] = $this->cap2_model->get_p2_e($id,$prd);

			$data['cap2_p2_f'] = $this->cap2_model->get_p2_f($id,$prd);

			$data['cap2_p2_g'] = $this->cap2_model->get_p2_g($id,$prd);

			$data['cap2_p2_g_2n'] = $this->cap2_model->get_p2_g_2n($id,$prd);

			$data['dptos'] = $this->ubigeo_model->get_dptos();


			$data['cap3_i'] = $this->cap3_model->get_cap3($id,$prd);
			$data['cap3_n'] = $this->cap3_model->get_cap3_n($id,$prd);	

			$data['cap4_i'] = $this->cap4_model->get_cap4($id,$prd);
			$data['cap4_n'] = $this->cap4_model->get_cap4_n($id,$prd);
			$data['cap5_i'] = $this->cap5_model->get_cap5($id,$prd);
			$data['cap5_f'] = $this->cap5_model->get_cant_p5f($id,$prd);


			$data['cap9_f'] = $this->cap9_model->get_cap9_f($id,$prd);


			$data['cod'] = $id;
			$real_prd = ($data['predios']->num_rows() > 0)? $prd : 0; 
			$data['pr'] = $real_prd;
			$data['level'] = $this->level;
			$data['user_id'] = $user_id;
			$data['main_content'] = 'consistencia/predios_view';
	  		$this->load->view('backend/includes/template', $data);
	}	


	public function add_predio()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			//id
			$id = $this->input->post('id_local');
			$ui = $this->input->post('user_id');
			$predios = $this->principal_model->get_predios($id)->num_rows();


			//pcar
			$c_data['user_id'] = $ui;
			$c_data['created'] = date('Y-m-d H:i:s');
			$c_data['last_ip'] =  $this->input->ip_address();
			$c_data['user_agent'] = $this->agent->agent_string();

			$c_data['id_local'] = $id;
			$c_data['Nro_Pred'] = $predios + 1;
			$c_data['P1_B_2A_PredNoCol'] = $this->input->post('P1_B_2A_PredNoCol');
				// inserta nuevo registro
			if($this->principal_model->insert_pr($c_data,'P1_B_2A_N') > 0){
				$flag = 1;
				$msg = 'Se ha registrado satisfactoriamente el Predio';
			}else{
				$flag = 0;
				$msg = 'Ocurrió un error 00x-Predio-i' . $predios + 1;		
			}

			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		

		}else{
			show_404();;
		}

	}

public function predio(){
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$ui = $this->input->post('user_id');

			//update padlocal
			$padlocal_data['update_caps'] = date('Y-m-d H:i:s');
			$padlocal_data['update_user'] = $ui;
			$this->principal_model->update_padlocal_caps($id,$padlocal_data);


			$fields_ct = $this->principal_model->get_fields('P1_B');

			$fields = $this->principal_model->get_fields('P1_B_3N');
			$fields_n = $this->principal_model->get_fields('P1_B_3_12N');

			
			foreach ($fields_ct as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$P1_B[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					if($b == 'P1_B_3_5_FecTit' || $b == 'P1_B_3_7_DocPos_Fech')	
						$P1_B_3N[$b] = ($this->input->post($b) == '') ? NULL : makedaysql($this->input->post($b));
					else
						$P1_B_3N[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			foreach ($fields_n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){						
					$P1_B_3_12N[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}	
			}




			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';
			if ($this->principal_model->get_predio($id,$pr)->num_rows() == 0) {
				$P1_B_3N['user_id'] = $ui;
				$P1_B_3N['created'] = date('Y-m-d H:i:s');
				$P1_B_3N['last_ip'] =  $this->input->ip_address();
				$P1_B_3N['user_agent'] = $this->agent->agent_string();			
					
				$P1_B_3N['id_local'] = $id;
				$P1_B_3N['Nro_Pred'] = $pr;
				// inserta nuevo registro
					if($this->principal_model->insert_pr($P1_B_3N,'P1_B_3N') > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente el Predio Nro - ' . $pr ;
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-PR-i-' . $ax;			
					}

			} else {
					$P1_B_3N['user_id'] = $ui;
					$P1_B_3N['modified'] =  date('Y-m-d H:i:s');
					$P1_B_3N['last_ip'] =  $this->input->ip_address();
					$P1_B_3N['user_agent'] = $this->agent->agent_string();						
				// actualiza
					if($this->principal_model->update_pr($id,$pr,$P1_B_3N) > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente el Predio Nro - ' . $pr ;
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-PR-u-' . $ax;			
					}

			}


			if($pr == 1){
				//P1_B predios counter
				if ($this->principal_model->get_prct($id,$pr)->num_rows() == 0) {
					$P1_B['user_id'] = $ui;
					$P1_B['created'] = date('Y-m-d H:i:s');
					$P1_B['last_ip'] =  $this->input->ip_address();
					$P1_B['user_agent'] = $this->agent->agent_string();		
									
					$P1_B['id_local'] = $id;
					$P1_B['Nro_Pred'] = $pr;
					// inserta nuevo registro
					$this->principal_model->insert_pr($P1_B,'P1_B');
				} else {
					$P1_B['user_id'] = $ui;
					$P1_B['modified'] = date('Y-m-d H:i:s');
					$P1_B['last_ip'] =  $this->input->ip_address();
					$P1_B['user_agent'] = $this->agent->agent_string();							
					// actualiza
					$this->principal_model->update_prct($id,$pr,$P1_B);
				}
			}



			//delete ax20n
			$this->principal_model->delete_predio_n($id,$pr);

			$P1_B_3_12N_data['user_id'] = $ui;
			$P1_B_3_12N_data['created'] = date('Y-m-d H:i:s');
			$P1_B_3_12N_data['last_ip'] =  $this->input->ip_address();
			$P1_B_3_12N_data['user_agent'] = $this->agent->agent_string();					
			//insert
			$P1_B_3_12N_data['id_local'] = $id;
			$P1_B_3_12N_data['Nro_Pred'] = $pr;	

			$cc = 0;

			if($P1_B_3_12N['P1_B_3_12_Nro'] > 0){
				foreach($P1_B_3_12N['P1_B_3_12_Nro'] as &$z){	
							foreach ($fields_n as $a=>$b) {
								if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
									$P1_B_3_12N_data[$b] = ($P1_B_3_12N[$b][$cc] == '') ? NULL : $P1_B_3_12N[$b][$cc];
								}	
							}
						    $this->principal_model->insert_pr($P1_B_3_12N_data,'P1_B_3_12N');			
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


	public function get_predio_c()
	{
		$is_ajax = $this->input->post('ajax');

		if($is_ajax){		

			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');

			$axic = $this->principal_model->get_predio_n($id,$pr);
			$datos['prc'] = $axic->result();
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);

		}else{
			show_404();;
		}	
	}	
}
