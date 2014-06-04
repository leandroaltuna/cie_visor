<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap6 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		$this->load->model('consistencia/cap6_model');
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
			$nroedif = $this->input->post('Nro_Ed');
			$ui = $this->input->post('user_id');

		

			$fields = $this->principal_model->get_fields('P6_1');
			$fields_8n = $this->principal_model->get_fields('P6_1_8N');
			$fields_10n = $this->principal_model->get_fields('P6_1_10N');
			// $fields_2 = $this->principal_model->get_fields('P6_2');
			// $fields_2_4n = $this->principal_model->get_fields('P6_2_4N');
			
			// $p5_piso = $this->input->post('P5_NroPiso');
			// $amb = $this->input->post('P6_2_1');
			
			//P6_1
			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified','P6_3_1','P6_3_1A','P6_3_2','P6_3_2A','P6_3_2B','P6_3_2C','P6_3_2D','P6_3_3','P6_3_3A','P6_4_1','P6_4_1A','P6_4_2','P6_5_1','P6_5_1A','P6_Obs'))){
					$c_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}

			//P6_1_8N
			foreach ($fields_8n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$P6_1_8n[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}

			//P6_1_10N
			foreach ($fields_10n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$P6_1_10N[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}

			// //P6_2
			// foreach ($fields_2 as $a=>$b) {
			// 	if(!in_array($b, array('id_local','Nro_Pred','P5_Ed_Nro','user_id','last_ip','user_agent','created','modified'))){
			// 		$c_data_2[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
			// 	}
			// }

			// //P6_2_4N
			// foreach ($fields_2_4n as $a=>$b) {
			// 	if(!in_array($b, array('id_local','Nro_Pred','P5_Ed_Nro','user_id','last_ip','user_agent','created','modified'))){
			// 		$P6_2_4N[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
			// 	}
			// }


			///////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////
			//P6_1
			// $c_data['user_id'] = $this->tank_auth->get_user_id();
			$c_data['user_id'] = $ui;
			$c_data['last_ip'] =  $this->input->ip_address();
			$c_data['user_agent'] = $this->agent->agent_string();

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';
			if ($this->cap6_model->consulta_cap6($id,$pr,$nroedif)->num_rows() == 0) {
				$c_data['created'] = date('Y-m-d H:i:s');

				$c_data['id_local'] = $id;
				$c_data['Nro_Pred'] = $pr;
				// inserta nuevo registro
					if($this->cap6_model->insert_cap6($c_data) > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente el Cap VI Sec. A';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Cap6-i';
					}

			} else {
				$c_data['modified'] = date('Y-m-d H:i:s');
				// actualiza
					if($this->cap6_model->update_cap6($id,$pr,$nroedif,$c_data) > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente el Cap VI Sec. A';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Cap6-u';		
					}
			}


			///////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////
			//P6_1_8N
			$this->cap6_model->delete_cap6_1_8n($id,$pr,$nroedif);

			// $c_data_8n['user_id'] = $this->tank_auth->get_user_id();
			$c_data_8n['user_id'] = $ui;
			$c_data_8n['last_ip'] =  $this->input->ip_address();
			$c_data_8n['user_agent'] = $this->agent->agent_string();
			$c_data_8n['created'] = date('Y-m-d H:i:s');

			$c_data_8n['id_local'] = $id;
			$c_data_8n['Nro_Pred'] = $pr;
			$c_data_8n['Nro_Ed'] = $nroedif;
			
			$cc = 0;
			for ($i=0; $i<10 ; $i++){
			
					foreach ($fields_8n as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
							
							if ($b == 'P6_1_8_Accesibilidad')
								$c_data_8n[$b] = (!isset($P6_1_8n['P6_1_8_Accesibilidad'][$cc]) || $P6_1_8n['P6_1_8_Accesibilidad'][$cc] == '') ? NULL : $P6_1_8n['P6_1_8_Accesibilidad'][$cc];
							
							if ($b == 'P6_1_8ID')
								$c_data_8n[$b] = $cc+1;
						}
					}
					
				    $this->cap6_model->insert_cap6_1_8n($c_data_8n);

				    $cc++;
			}


			///////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////
			//P6_1_10N
			$this->cap6_model->delete_cap6_1_10n($id,$pr,$nroedif);

			// $c_data_10n['user_id'] = $this->tank_auth->get_user_id();
			$c_data_10n['user_id'] = $ui;
			$c_data_10n['last_ip'] =  $this->input->ip_address();
			$c_data_10n['user_agent'] = $this->agent->agent_string();
			$c_data_10n['created'] = date('Y-m-d H:i:s');

			$c_data_10n['id_local'] = $id;
			$c_data_10n['Nro_Pred'] = $pr;
			$c_data_10n['Nro_Ed'] = $nroedif;

			$cc = 0;
			foreach($P6_1_10N['P6_1_10_e'] as &$z){

					foreach ($fields_10n as $a=>$b) {
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
							
							if ($b == 'P6_1_10_e')
								$c_data_10n[$b] = ($P6_1_10N['P6_1_10_e'][$cc] == '') ? NULL : $P6_1_10N['P6_1_10_e'][$cc];
							
							if ($b == 'P6_1_10')
								$c_data_10n[$b] = $cc+1;
						}
					}
					
				    $this->cap6_model->insert_cap6_1_10n($c_data_10n);

				    $cc++;
			}


			///////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////
			//P6_2
			// $c_data_2['user_id'] = $this->tank_auth->get_user_id();
			// $c_data_2['last_ip'] =  $this->input->ip_address();
			// $c_data_2['user_agent'] = $this->agent->agent_string();
			

			// if ($this->cap6_model->consulta_cap6_2($id,$pr,$nroedif,$p5_piso,$amb)->num_rows() == 0) {
			// 	$c_data_2['created'] = date('Y-m-d H:i:s');

			// 	$c_data_2['id_local'] = $id;
			// 	$c_data_2['Nro_Pred'] = $pr;
			// 	$c_data_2['P5_Ed_Nro'] = $nroedif;
			// 	// inserta nuevo registro
			// 		if($this->cap6_model->insert_cap6_2($c_data_2) > 0){
			// 			$flag = 1;
			// 			$msg = 'Se ha registrado satisfactoriamente el Cap VI';
			// 		}else{
			// 			$flag = 0;
			// 			$msg = 'Ocurrió un error 00x-Cap6_2-i';
			// 		}

			// } else {
			// 	$c_data_2['modified'] = date('Y-m-d H:i:s');
			// 	// actualiza
			// 		if($this->cap6_model->update_cap6_2($id,$pr,$nroedif,$p5_piso,$amb,$c_data_2) > 0){
			// 			$flag = 1;
			// 			$msg = 'Se ha actualizado satisfactoriamente el Cap VI';
			// 		}else{
			// 			$flag = 0;
			// 			$msg = 'Ocurrió un error 00x-Cap6_2-u';		
			// 		}
			// }


			///////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////
			//P6_2_4N
			// $this->cap6_model->delete_cap6_2_4n($id,$pr,$nroedif,$p5_piso,$amb);

			// $c_data_2_4n['user_id'] = $this->tank_auth->get_user_id();
			// $c_data_2_4n['last_ip'] =  $this->input->ip_address();
			// $c_data_2_4n['user_agent'] = $this->agent->agent_string();
			// $c_data_2_4n['created'] = date('Y-m-d H:i:s');

			// $c_data_2_4n['id_local'] = $id;
			// $c_data_2_4n['Nro_Pred'] = $pr;
			// $c_data_2_4n['P5_Ed_Nro'] = $nroedif;
			// $c_data_2_4n['P5_NroPiso'] = $p5_piso;
			// $c_data_2_4n['P6_2_1'] = $amb;

			// $cc = 0;
			// //foreach($P6_2_4N['P6_2_4Mod'] as &$z){
			// for ($i=0; $i<14; $i++){
				
			// 		$c_data_2_4n['P6_2_4ID'] = $cc+1;
			// 		foreach ($fields_2_4n as $a=>$b) {
			// 			if(!in_array($b, array('id_local','Nro_Pred','P5_Ed_Nro','P5_NroPiso','P6_2_1','P6_2_4ID','user_id','last_ip','user_agent','created','modified'))){
			// 				$c_data_2_4n[$b] = (!isset($P6_2_4N[$b][$cc]) || $P6_2_4N[$b][$cc] == '') ? NULL : $P6_2_4N[$b][$cc];
			// 			}
			// 		}
					
			// 	    $this->cap6_model->insert_cap6_2_4n($c_data_2_4n);

			// 	    $cc++;
			// }

			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		

		}else{
			show_404();
		}
	}

	public function cap6_amb()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			//id
			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$nroedif = $this->input->post('Nro_Ed');
			$p5_piso = $this->input->post('P5_NroPiso');
			$amb = $this->input->post('P6_2_1');
			$ui = $this->input->post('user_id');

			//update padlocal
			// $padlocal_data['update_caps'] = date('Y-m-d H:i:s');
			// $padlocal_data['update_user'] = $ui;
			// $this->principal_model->update_padlocal_caps($id,$padlocal_data);

			if ($this->cap6_model->consulta_cap6($id,$pr,$nroedif)->num_rows() > 0) 
			{
			

				$fields_2 = $this->principal_model->get_fields('P6_2');
				$fields_2_4n = $this->principal_model->get_fields('P6_2_4N');
				

				//P6_2
				foreach ($fields_2 as $a=>$b) {
					if(!in_array($b, array('id_local','Nro_Pred','P5_Ed_Nro','user_id','last_ip','user_agent','created','modified'))){
						$c_data_2[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
					}
				}

				//P6_2_4N
				foreach ($fields_2_4n as $a=>$b) {
					if(!in_array($b, array('id_local','Nro_Pred','P5_Ed_Nro','user_id','last_ip','user_agent','created','modified'))){
						$P6_2_4N[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
					}
				}

				///////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////
				//P6_2
				// $c_data_2['user_id'] = $this->tank_auth->get_user_id();
				$c_data_2['user_id'] = $ui;
				$c_data_2['last_ip'] =  $this->input->ip_address();
				$c_data_2['user_agent'] = $this->agent->agent_string();
				

				if ($this->cap6_model->consulta_cap6_2($id,$pr,$nroedif,$p5_piso,$amb)->num_rows() == 0) {
					$c_data_2['created'] = date('Y-m-d H:i:s');

					$c_data_2['id_local'] = $id;
					$c_data_2['Nro_Pred'] = $pr;
					$c_data_2['P5_Ed_Nro'] = $nroedif;
					// inserta nuevo registro
						if($this->cap6_model->insert_cap6_2($c_data_2) > 0){
							$flag = 1;
							$msg = 'Se ha registrado satisfactoriamente el Cap VI - Ambientes';
						}else{
							$flag = 0;
							$msg = 'Ocurrió un error 00x-Cap6_2-i';
						}

				} else {
					$c_data_2['modified'] = date('Y-m-d H:i:s');
					// actualiza
						if($this->cap6_model->update_cap6_2($id,$pr,$nroedif,$p5_piso,$amb,$c_data_2) > 0){
							$flag = 1;
							$msg = 'Se ha actualizado satisfactoriamente el Cap VI - Ambientes';
						}else{
							$flag = 0;
							$msg = 'Ocurrió un error 00x-Cap6_2-u';		
						}
				}


				///////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////
				//P6_2_4N
				$this->cap6_model->delete_cap6_2_4n($id,$pr,$nroedif,$p5_piso,$amb);

				// $c_data_2_4n['user_id'] = $this->tank_auth->get_user_id();
				$c_data_2_4n['user_id'] = $ui;
				$c_data_2_4n['last_ip'] =  $this->input->ip_address();
				$c_data_2_4n['user_agent'] = $this->agent->agent_string();
				$c_data_2_4n['created'] = date('Y-m-d H:i:s');

				$c_data_2_4n['id_local'] = $id;
				$c_data_2_4n['Nro_Pred'] = $pr;
				$c_data_2_4n['P5_Ed_Nro'] = $nroedif;
				$c_data_2_4n['P5_NroPiso'] = $p5_piso;
				$c_data_2_4n['P6_2_1'] = $amb;

				$cc = 0;
				//foreach($P6_2_4N['P6_2_4Mod'] as &$z){
				for ($i=0; $i<14; $i++){
					
						$c_data_2_4n['P6_2_4ID'] = $cc+1;
						foreach ($fields_2_4n as $a=>$b) {
							if(!in_array($b, array('id_local','Nro_Pred','P5_Ed_Nro','P5_NroPiso','P6_2_1','P6_2_4ID','user_id','last_ip','user_agent','created','modified'))){
								$c_data_2_4n[$b] = (!isset($P6_2_4N[$b][$cc]) || $P6_2_4N[$b][$cc] == '') ? NULL : $P6_2_4N[$b][$cc];
							}
						}
						
					    $this->cap6_model->insert_cap6_2_4n($c_data_2_4n);

					    $cc++;
				}

				// Pasar al siguiente ambiente o piso de la edificación.
				// $tot_amb = $this->cap6_model->get_tot_amb_p5n($id,$pr,$nroedif,$p5_piso);
				// $newamb = $amb+1;
				// $nroamb = ($newamb <= $tot_amb) ? $newamb : 1;

				// if ($nroamb == 1) {
				// 	$nropiso = $this->cap6_model->get_nropiso_p5n($id,$pr,$nroedif);
				// 	$newpiso = $p5_piso+1;
				// 	$datos['newpiso'] = ($newpiso <= $nropiso) ? $newpiso : 0;
				// }else{
				// 	$datos['newpiso'] = $p5_piso;
				// }

				// $datos['newamb'] = $nroamb;
				// ***********************************************************************
			}else{
				$flag = 2;
				$msg = 'Error. Aún no se registra la Edificación de los ambientes';
			}

			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		

		}else{
			show_404();
		}
	}

	public function cap6_i2()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			//id
			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$nroedif = $this->input->post('Nro_Ed');
			$ui = $this->input->post('user_id');

			//update padlocal
			// $padlocal_data['update_caps'] = date('Y-m-d H:i:s');
			// $padlocal_data['update_user'] = $ui;
			// $this->principal_model->update_padlocal_caps($id,$padlocal_data);

			if ($this->cap6_model->consulta_cap6($id,$pr,$nroedif)->num_rows() > 0) 
			{

				$fields = $this->principal_model->get_fields('P6_1');
			
			
				//P6_1
				foreach ($fields as $a=>$b) {
					if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified','P6_1_3','P6_1_4','P6_1_5','P6_1_6','P6_1_7','P6_1_8','P6_1_9'))){
						$c_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
					}
				}

				
				///////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////
				//P6_1
				// $c_data['user_id'] = $this->tank_auth->get_user_id();
				$c_data['user_id'] = $ui;
				$c_data['last_ip'] =  $this->input->ip_address();
				$c_data['user_agent'] = $this->agent->agent_string();

				$flag = 0;
				$msg = 'Error inesperado, por favor intentalo nuevamente';
				if ($this->cap6_model->consulta_cap6($id,$pr,$nroedif)->num_rows() > 0) {

					$c_data['modified'] = date('Y-m-d H:i:s');
					// actualiza
						if($this->cap6_model->update_cap6($id,$pr,$nroedif,$c_data) > 0){
							$flag = 1;
							$msg = 'Se ha actualizado satisfactoriamente el Cap VI Sec. C,D,E';
						}else{
							$flag = 0;
							$msg = 'Ocurrió un error 00x-Cap6-u';
						}
				}

				// Pasar automáticamente a la siguiente edificación.
				// $tot_e = $this->cap6_model->get_tot_e_p5($id,$pr);
				// $newedif = $nroedif+1;
				// $datos['newedif'] = ($newedif <= $tot_e) ? $newedif : 0;
				// ********************************************************
			}else{
				$flag = 2;
				$msg = 'Error. Aún no se registra la sección A.';
			}
			
			$datos['flag'] = $flag;
			$datos['msg'] = $msg;
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);

		}else{
			show_404();
		}
	}


	public function cap6_i()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');

		$data = $this->cap6_model->get_cap6($codigo,$predio,$edi);
		
		echo json_encode($data->row());
		
	}

	public function cap6_1_8n()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');

		$data = $this->cap6_model->get_cap6_1_8n($codigo,$predio,$edi);
		
		echo json_encode($data->result());
		
	}

	public function cap6_1_10n()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');

		$data = $this->cap6_model->get_cap6_1_10n($codigo,$predio,$edi);
		
		echo json_encode($data->result());
		
	}

	public function cap6_2_i()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');
		$piso = $this->input->get('piso');
		$amb = $this->input->get('amb');

		$data = $this->cap6_model->get_cap6_2($codigo,$predio,$edi,$piso,$amb);
		
		echo json_encode($data->row());
		
	}

	public function cap6_2_4n()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');
		$piso = $this->input->get('piso');
		$amb = $this->input->get('amb');

		$data = $this->cap6_model->get_cap6_2_4n($codigo,$predio,$edi,$piso,$amb);
		
		echo json_encode($data->result());
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */