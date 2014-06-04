<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Car extends CI_Controller {
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
		$this->load->model('consistencia/car_model');			
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
			$pcar_num = $this->input->post('pcar_num');

			$fields = $this->principal_model->get_fields('PCar');
			$fields_n = $this->principal_model->get_fields('PCar_C_1N');
			

			//pcar
			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					if($b == 'PC_C_2_Rfinal_fecha')
						$c_data[$b] = ($this->input->post($b) == '') ? NULL :  makedaysql($this->input->post($b));
					else
						$c_data[$b] = ($this->input->post($b) == '') ? NULL :  $this->input->post($b);
				}
			}	

		
			foreach ($fields_n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
					$pre_n[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}	
			}



			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';
			if ($this->car_model->consulta_car($id,$pr)->num_rows() == 0) {

				$c_data['user_id'] = $ui;
				$c_data['created'] = date('Y-m-d H:i:s');
				$c_data['last_ip'] =  $this->input->ip_address();
				$c_data['user_agent'] = $this->agent->agent_string();

				$c_data['id_local'] = $id;
				$c_data['Nro_Pred'] = $pr;
				// inserta nuevo registro
					if($this->car_model->insert_car($c_data) > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente la Carátula';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Car-i';		
					}

			} else {
				$c_data['user_id'] = $ui;
				$c_data['modified'] =  date('Y-m-d H:i:s');
				$c_data['last_ip'] =  $this->input->ip_address();
				$c_data['user_agent'] = $this->agent->agent_string();				
				// actualiza
					if($this->car_model->update_car($id,$pr,$c_data) > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente la Carátula';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Car-u';		
					}

			}

			$this->car_model->delete_car_n($id,$pr);

			$c_data_n['user_id'] = $ui;
			$c_data_n['created'] = date('Y-m-d H:i:s');
			$c_data_n['last_ip'] =  $this->input->ip_address();
			$c_data_n['user_agent'] = $this->agent->agent_string();

			$c_data_n['id_local'] = $id;
			$c_data_n['Nro_Pred'] = $pr;	
			if($pcar_num > 0){
				$cc = 0;
				foreach($pre_n['PC_C_1_NroVis'] as &$z){

						foreach ($fields_n as $a=>$b) {
							if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
								if($b == 'PC_C_1_Et_Fecha' || $b == 'PC_C_1_Et_Fecha_Prox' || $b == 'PC_C_1_Jb_Fecha')							
									$c_data_n[$b] = (!isset($pre_n[$b][$cc]) || $pre_n[$b][$cc] == '') ? NULL : makedaysql($pre_n[$b][$cc]);
								else
									$c_data_n[$b] = (!isset($pre_n[$b][$cc]) || $pre_n[$b][$cc] == '') ? NULL : $pre_n[$b][$cc];
							}	
						}
					    $this->car_model->insert_car_n($c_data_n);			
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