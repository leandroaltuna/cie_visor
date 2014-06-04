<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap1 extends CI_Controller {
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
		$this->load->model('consistencia/cap1_model');			
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

		}else{
			show_404();;
		}

	}


	public function ies_i()
	{

		$is_ajax = $this->input->post('ajax');
		$id = $this->input->post('id_local');
		$pr = $this->input->post('Nro_Pred');
		$ui = $this->input->post('user_id');

		$nro_ies = $this->input->post('P1_A_1_Cant_IE');

		if($is_ajax){
			//update padlocal
			$padlocal_data['update_caps'] = date('Y-m-d H:i:s');
			$padlocal_data['update_user'] = $ui;
			$this->principal_model->update_padlocal_caps($id,$padlocal_data);

			$cap1_p1_a = $this->principal_model->get_fields('P1_A');
			$cap1_p1_a_2n = $this->principal_model->get_fields('P1_A_2N');
			//IES_I
			$cap1_p1_a_data['id_local'] =  $id;
			$cap1_p1_a_data['Nro_Pred'] =  $pr;			
			foreach ($cap1_p1_a as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap1_p1_a_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	
			//IES
			$cap1_p1_a_2n_data['id_local'] =  $id;
			$cap1_p1_a_2n_data['Nro_Pred'] =  $pr;			
			foreach ($cap1_p1_a_2n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','user_id','last_ip','user_agent','created','modified'))){
					$cap1_p1_a_2n_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';	

			// $aaa = 'test';
			$my_nro_ies = $this->cap1_model->get_p1_a_2n($id,$pr)->num_rows();
			$my_head_ie = $this->cap1_model->get_p1_a($id,$pr)->num_rows();
			
			//////////////////////////////////////////////////////////////////////////////////////////////////
			//stupid table
			//HEAD IES

			if($my_head_ie > 0){

				// $cap1_p1_a_data['user_id'] = $this->tank_auth->get_user_id();
				$cap1_p1_a_data['user_id'] = $ui;
				$cap1_p1_a_data['modified'] = date('Y-m-d H:i:s');
				$cap1_p1_a_data['last_ip'] =  $this->input->ip_address();
				$cap1_p1_a_data['user_agent'] = $this->agent->agent_string();

				if($this->cap1_model->update_cap1($id,$pr,$cap1_p1_a_data,'P1_A') > 0){
					$flag = 1;
					$msg = 'Se ha actualizado satisfactoriamente el nro de I.E.';	
				}
			}else{

				// $cap1_p1_a_data['user_id'] = $this->tank_auth->get_user_id();
				$cap1_p1_a_data['user_id'] = $ui;
				$cap1_p1_a_data['created'] = date('Y-m-d H:i:s');
				$cap1_p1_a_data['last_ip'] =  $this->input->ip_address();
				$cap1_p1_a_data['user_agent'] = $this->agent->agent_string();

				if($this->cap1_model->insert_cap1($cap1_p1_a_data,'P1_A') > 0){
					$flag = 1;
					$msg = 'Se ha registrado satisfactoriamente el nro de I.E.';					
				}
			}		


			//////////////////////////////////////////////////////////////////////////////////////////////////
			//IES
			// $cap1_p1_a_2n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap1_p1_a_2n_data['user_id'] = $ui;
			$cap1_p1_a_2n_data['created'] = date('Y-m-d H:i:s');
			$cap1_p1_a_2n_data['last_ip'] =  $this->input->ip_address();
			$cap1_p1_a_2n_data['user_agent'] = $this->agent->agent_string();			
			//tiene alguna ie?
			if($my_nro_ies > 0){
				//es igual
				if($my_nro_ies == $nro_ies) {
					//nothing
				//reducir ies
				}elseif($my_nro_ies > $nro_ies){
						//borrar ies sobrantes
						for($i=$my_nro_ies; $i!=$nro_ies; $i--){
							$this->del_ie($id,$pr,$i);
						}
				//aumentar
				}elseif($my_nro_ies < $nro_ies){
						//agregar ies faltantes
						for($i=$my_nro_ies; $i!=$nro_ies; $i++){
							$cap1_p1_a_2n_data['P1_A_2_NroIE'] =  $i+1;
							$this->cap1_model->insert_cap1($cap1_p1_a_2n_data,'P1_A_2N');
						}
				}

			//ingresar primera vez IES
			}else{
					for($i=1; $i <= $nro_ies; $i++){
						$cap1_p1_a_2n_data['P1_A_2_NroIE'] =  $i;
						$this->cap1_model->insert_cap1($cap1_p1_a_2n_data,'P1_A_2N');
					}			

			}	


			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	
			$datos['nro'] = $nro_ies;	
			// $datos['aaa'] = $aaa;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);


		}else{
			show_404();;
		}

	}


	private function del_ie($id,$pr,$ie){
		$this->cap1_model->delete_cap1_ie($id,$pr,$ie,'P1_C_20N');
		$this->cap1_model->delete_cap1_ie($id,$pr,$ie,'P1_C');
		$this->cap1_model->delete_cap1_ie($id,$pr,$ie,'P1_A_2_9N');
		$this->cap1_model->delete_cap1_ie($id,$pr,$ie,'P1_A_2_8N');
		$this->cap1_model->delete_cap1_ie($id,$pr,$ie,'P1_A_2N');
	}

	private function del_codmod($id,$pr,$ie,$cm){
		$this->cap1_model->delete_cap1_codmod($id,$pr,$ie,$cm,'P1_C_20N');
		$this->cap1_model->delete_cap1_codmod($id,$pr,$ie,$cm,'P1_C');
		$this->cap1_model->delete_cap1_codmod($id,$pr,$ie,$cm,'P1_A_2_9N');
		$this->cap1_model->delete_cap1_codmod($id,$pr,$ie,$cm,'P1_A_2_8N');
	}

	private function del_ax($id,$pr,$ie,$cm){
		$this->cap1_model->delete_cap1_ax($id,$pr,$ie,$cm,'P1_C_20N');
		$this->cap1_model->delete_cap1_ax($id,$pr,$ie,$cm,'P1_C');
		$this->cap1_model->delete_cap1_ax($id,$pr,$ie,$cm,'P1_A_2_9N');
	}


	public function ies()
	{

		$is_ajax = $this->input->post('ajax');

		if($is_ajax){
			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$ui = $this->input->post('user_id');

			//update padlocal
			$padlocal_data['update_caps'] = date('Y-m-d H:i:s');
			$padlocal_data['update_user'] = $ui;
			$this->principal_model->update_padlocal_caps($id,$padlocal_data);

			//nie
			$ie = $this->input->post('P1_A_2_NroIE');
			//ncodmod
			$nro_cms = $this->input->post('P1_A_2_8_Can_CMod_IE');	

			$cap1_p1_a_2n = $this->principal_model->get_fields('P1_A_2N');
			$cap1_p1_a_2_8n = $this->principal_model->get_fields('P1_A_2_8N');

			//pre save ie
			foreach ($cap1_p1_a_2n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','user_id','last_ip','user_agent','created','modified'))){
					$cap1_p1_a_2n_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			//pre insert codmod
			$cap1_p1_a_2_8n_data['id_local'] =  $id;
			$cap1_p1_a_2_8n_data['Nro_Pred'] =  $pr;			
			$cap1_p1_a_2_8n_data['P1_A_2_NroIE'] =  $ie;			
			foreach ($cap1_p1_a_2_8n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','user_id','last_ip','user_agent','created','modified'))){
					$cap1_p1_a_2_8n_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			//////////////////////////////////////////////////////////////////////////////////////////////////
			//IE

			// $cap1_p1_a_2n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap1_p1_a_2n_data['user_id'] = $ui;
			$cap1_p1_a_2n_data['modified'] = date('Y-m-d H:i:s');
			$cap1_p1_a_2n_data['last_ip'] =  $this->input->ip_address();
			$cap1_p1_a_2n_data['user_agent'] = $this->agent->agent_string();

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';

			if($this->cap1_model->update_cap1_ie($id,$pr,$ie,$cap1_p1_a_2n_data,'P1_A_2N') > 0){
				$flag = 1;
				$msg = 'Se ha actualizado satisfactoriamente la IE Nro - ' . $ie ;
			}else{
				$flag = 0;
				$msg = 'Ocurrió un error 00x-IE-i-' . $ie;		
			}


			//////////////////////////////////////////////////////////////////////////////////////////////////
			//COD MOD
			// $cap1_p1_a_2_8n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap1_p1_a_2_8n_data['user_id'] = $ui;
			$cap1_p1_a_2_8n_data['created'] = date('Y-m-d H:i:s');
			$cap1_p1_a_2_8n_data['last_ip'] =  $this->input->ip_address();
			$cap1_p1_a_2_8n_data['user_agent'] = $this->agent->agent_string();

			$my_nro_cms = $this->cap1_model->get_cap1_codmod($id,$pr,$ie)->num_rows();
			//tiene alguna ie?
			if($my_nro_cms > 0){
				//es igual
				if($my_nro_cms == $nro_cms) {
					//nothing
				//reducir codmod
				}elseif($my_nro_cms > $nro_cms){
						//borrar ies sobrantes
						for($i=$my_nro_cms; $i!=$nro_cms; $i--){
							$this->del_codmod($id,$pr,$ie,$i);
						}
				//aumentar
				}elseif($my_nro_cms < $nro_cms){
						//agregar ies faltantes
						for($i=$my_nro_cms; $i!=$nro_cms; $i++){
							$cap1_p1_a_2_8n_data['P1_A_2_9_NroCMod'] =  $i+1;
							$this->cap1_model->insert_cap1($cap1_p1_a_2_8n_data,'P1_A_2_8N');
						}
				}

			//ingresar primera vez IES
			}else{
					for($i=1; $i <= $nro_cms; $i++){
						$cap1_p1_a_2_8n_data['P1_A_2_9_NroCMod'] =  $i;
						$this->cap1_model->insert_cap1($cap1_p1_a_2_8n_data,'P1_A_2_8N');
					}			
			}	
			//ultimos cms para generar
			$now_cms =  $this->cap1_model->get_cap1_codmod($id,$pr,$ie);

			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	
			$datos['nro_cms'] = $now_cms->num_rows();	
			$datos['cms'] = $now_cms->result();	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);

		}else{
			show_404();
		}			
	}


	public function get_ie()
	{
		$is_ajax = $this->input->post('ajax');

		if($is_ajax){		

			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$ui = $this->input->post('user_id');

			$ie = $this->input->post('P1_A_2_NroIE');

			$datos['ie'] = $this->cap1_model->get_cap1_ie($id,$pr,$ie)->row();	
			$datos['ie'] = $this->convert_uft8_array($datos['ie']);
			//ultimos cms para generar
			$cms = $this->cap1_model->get_cap1_codmod($id,$pr,$ie);	

			$datos['cms'] = $cms->result();
			$datos['nro_cms'] = $cms->num_rows();	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);

		}else{
			show_404();;
		}	
	}

	function convert_uft8_array($datos)
	{
		foreach ($datos as &$value)
		{
			$value = utf8_encode($value);
		}

		return $datos;
	}

	public function cm()
	{

		$is_ajax = $this->input->post('ajax');

		if($is_ajax){
			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$ui = $this->input->post('user_id');

			//update padlocal
			$padlocal_data['update_caps'] = date('Y-m-d H:i:s');
			$padlocal_data['update_user'] = $ui;
			$this->principal_model->update_padlocal_caps($id,$padlocal_data);

			//nie
			$ie = $this->input->post('P1_A_2_NroIE');
			//ncodmod

			$fields = $this->principal_model->get_fields('P1_A_2_8N');

			$fields_n = $this->principal_model->get_fields('P1_A_2_9N');

			//pre save cm
			$cap1_p1_a_2_8n_data['id_local'] = $id;
			$cap1_p1_a_2_8n_data['Nro_Pred'] = $pr;
			$cap1_p1_a_2_8n_data['P1_A_2_NroIE'] = $ie;

			// $cap1_p1_a_2_8n_data['user_id'] = $this->tank_auth->get_user_id();
			$cap1_p1_a_2_8n_data['user_id'] = $ui;
			$cap1_p1_a_2_8n_data['modified'] = date('Y-m-d H:i:s');
			$cap1_p1_a_2_8n_data['last_ip'] =  $this->input->ip_address();
			$cap1_p1_a_2_8n_data['user_agent'] = $this->agent->agent_string();

			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','user_id','last_ip','user_agent','created','modified'))){
					$cap1_p1_a_2_8n[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	


			//////////////////////////////////////////////////////////////////////////////////////////////////
			//CM

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';
			$cm = null;

			$cc = 0;
			if($cap1_p1_a_2_8n['P1_A_2_9_NroCMod'] > 0){
			foreach($cap1_p1_a_2_8n['P1_A_2_9_NroCMod'] as &$z){

						foreach ($fields as $a=>$b) {
							if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','P1_A_2_9_NroCMod','user_id','last_ip','user_agent','created','modified'))){							
								$cap1_p1_a_2_8n_data[$b] = ($cap1_p1_a_2_8n[$b][$cc] == '') ? NULL : $cap1_p1_a_2_8n[$b][$cc];
							}	
						}

						$cm = $cap1_p1_a_2_8n['P1_A_2_9_NroCMod'][$cc];
						
					    $this->cap1_model->update_cap1_cm($id,$pr,$ie,$cm,$cap1_p1_a_2_8n_data,'P1_A_2_8N');			
					    

					//////////////////////////////////////////////////////////////////////////////////////////////////
					//PRE AX		  
					$ll = 0;
					foreach($cap1_p1_a_2_8n['P1_A_2_9_NroCMod'] as &$z){	  
						foreach ($fields_n as $a=>$b) {
							$ccx = $ll+1;
							if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','P1_A_2_9_NroCMod','P1_A_2_9_Nro','user_id','last_ip','user_agent','created','modified'))){							
								$cap1_p1_a_2_9n_fx[$ll][] = $b . '_' . $ccx;
							}
						}

					$ll++;
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////

					//////////////////////////////////////////////////////////////////////////////////////////////////
					//AX	
						$this->del_ax($id,$pr,$ie,$cm);
						// $this->cap1_model->delete_cap1_ax($id,$pr,$ie,$cm,'P1_A_2_9N');

						$nro_axs = $cap1_p1_a_2_8n['P1_A_2_9F_CantAnex'][$cc];

						if($nro_axs > 0 && $nro_axs != 99){
							//insert axs por cod mod
							for($o = 0; $o<=$nro_axs-1;$o++){
										$cap1_p1_a_2_9n_data = null;
										//data insert ax
										// $cap1_p1_a_2_9n_data['user_id'] = $this->tank_auth->get_user_id();
										$cap1_p1_a_2_9n_data['user_id'] = $ui;
										$cap1_p1_a_2_9n_data['created'] = date('Y-m-d H:i:s');
										$cap1_p1_a_2_9n_data['last_ip'] =  $this->input->ip_address();
										$cap1_p1_a_2_9n_data['user_agent'] = $this->agent->agent_string();									

										$cap1_p1_a_2_9n_data['id_local'] = $id;
										$cap1_p1_a_2_9n_data['Nro_Pred'] = $pr;
										$cap1_p1_a_2_9n_data['P1_A_2_NroIE'] = $ie;
										$cap1_p1_a_2_9n_data['P1_A_2_9_NroCMod'] = $cm;

										//get arrays de Anexos segun Cod Mod
										foreach ($cap1_p1_a_2_9n_fx[$cc] as $a=>$b) {
											//quitar _1
											$subb = substr($b,0,-2);
											if(!in_array($subb, array('id_local','Nro_Pred','P1_A_2_NroIE','P1_A_2_9_NroCMod','P1_A_2_9_Nro','user_id','last_ip','user_agent','created','modified'))){
												$cap1_p1_a_2_9n[$subb] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
											}
										}	

										//Preparar Array de Anexos
										foreach ($fields_n as $a=>$b) {
											if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','P1_A_2_9_NroCMod','P1_A_2_9_Nro','user_id','last_ip','user_agent','created','modified'))){
												$cap1_p1_a_2_9n_data[$b] = ($cap1_p1_a_2_9n[$b][$o] == '') ? NULL : $cap1_p1_a_2_9n[$b][$o];
											}
										}	

										//campos repetidos ax
										$cap1_p1_a_2_9n_data['P1_A_2_9_Nro'] = $cap1_p1_a_2_9n_data['P1_A_2_9_AnexNro'];
										//Insertar Anexos
									    $this->cap1_model->insert_cap1($cap1_p1_a_2_9n_data,'P1_A_2_9N');		

									    ////////////////////////////////////////////////////////////////////////////////////
									    //Info Anexos
										// $cap1_p1_c_data['user_id'] = $this->tank_auth->get_user_id();
										$cap1_p1_c_data['user_id'] = $ui;
										$cap1_p1_c_data['created'] = date('Y-m-d H:i:s');
										$cap1_p1_c_data['last_ip'] =  $this->input->ip_address();
										$cap1_p1_c_data['user_agent'] = $this->agent->agent_string();	

										$cap1_p1_c_data['id_local'] = $id;
										$cap1_p1_c_data['Nro_Pred'] = $pr;
										$cap1_p1_c_data['P1_A_2_NroIE'] = $ie;
										$cap1_p1_c_data['P1_A_2_9_NroCMod'] = $cm;									    
										$cap1_p1_c_data['P1_A_2_9_Nro'] = $cap1_p1_a_2_9n_data['P1_A_2_9_Nro'];		
										//Insertar Info Anexo							    
									    $this->cap1_model->insert_cap1($cap1_p1_c_data,'P1_C');		
										
							}

						}

					//////////////////////////////////////////////////////////////////////////////////////////////////

					$cc++;									    

			}	
			}

			$flag = 1;
			$msg = 'Se ha actualizado satisfactoriamente los Códigos Modulares';


			$datos['flag'] = $flag;	
			$datos['nrocms'] = $cc;	
			$datos['msg'] = $msg;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);

		}else{
			show_404();;
		}			
	}


	public function get_ax()
	{
		$is_ajax = $this->input->post('ajax');

		if($is_ajax){		

			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$ui = $this->input->post('user_id');

			$ie = $this->input->post('P1_A_2_NroIE');
			$cm = $this->input->post('P1_A_2_9_NroCMod');
			$ax = $this->cap1_model->get_cap1_ax($id,$pr,$ie,$cm);
			$datos['axs'] = $ax->result();
			$datos['nroaxs'] = $ax->num_rows();
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);

		}else{
			show_404();;
		}	
	}

	public function get_axi()
	{
		$is_ajax = $this->input->post('ajax');

		if($is_ajax){		

			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$ui = $this->input->post('user_id');

			$ie = $this->input->post('P1_A_2_NroIE');
			$cm = $this->input->post('P1_A_2_9_NroCMod');
			$ax = $this->input->post('P1_A_2_9_Nro');
			$axi = $this->cap1_model->get_cap1_axi($id,$pr,$ie,$cm,$ax);
			// $axic = $this->cap1_model->get_cap1_axic($id,$pr,$ie,$cm,$ax);
			$datos['axi'] = $axi->result();
			// $datos['axic'] = $axic->result();
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);

		}else{
			show_404();;
		}	
	}

	public function get_ax_c()
	{
		$is_ajax = $this->input->post('ajax');

		if($is_ajax){		

			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$ui = $this->input->post('user_id');

			$ie = $this->input->post('P1_A_2_NroIE');
			$cm = $this->input->post('P1_A_2_9_NroCMod');
			$ax = $this->input->post('P1_A_2_9_Nro');
			$axic = $this->cap1_model->get_cap1_axic($id,$pr,$ie,$cm,$ax);
			$datos['axic'] = $axic->result();
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);

		}else{
			show_404();;
		}	
	}


	public function ax(){
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$ui = $this->input->post('user_id');
			
			//update padlocal
			$padlocal_data['update_caps'] = date('Y-m-d H:i:s');
			$padlocal_data['update_user'] = $ui;
			$this->principal_model->update_padlocal_caps($id,$padlocal_data);

			$fields = $this->principal_model->get_fields('P1_C');
			$fields_n = $this->principal_model->get_fields('P1_C_20N');

			$ie = $this->input->post('P1_A_2_NroIE');
			$cm = $this->input->post('P1_A_2_9_NroCMod');
			$ax = $this->input->post('P1_A_2_9_Nro');

			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','P1_A_2_9_NroCMod','P1_A_2_9_Nro','user_id','last_ip','user_agent','created','modified'))){
					if($b == 'P1_C_13_FecTit' || $b == 'P1_C_15_DocPos_Fech')
						$P1_C_data[$b] = ($this->input->post($b) == '') ? NULL : makedaysql($this->input->post($b));
					else
						$P1_C_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			foreach ($fields_n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','P1_A_2_9_NroCMod','P1_A_2_9_Nro','user_id','last_ip','user_agent','created','modified'))){						
					$P1_C_20N[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}	
			}

			// $c_data['user_id'] = $this->tank_auth->get_user_id();
			// $c_data['created'] = date('Y-m-d H:i:s');
			// $c_data['last_ip'] =  $this->input->ip_address();
			// $c_data['user_agent'] = $this->agent->agent_string();


			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';

			// $P1_C_data['user_id'] = $this->tank_auth->get_user_id();
			$P1_C_data['user_id'] = $ui;
			$P1_C_data['modified'] = date('Y-m-d H:i:s');
			$P1_C_data['last_ip'] =  $this->input->ip_address();
			$P1_C_data['user_agent'] = $this->agent->agent_string();	

			// actualiza
			if($this->cap1_model->update_cap1_ax($id,$pr,$ie,$cm,$ax,$P1_C_data) > 0){
				$flag = 1;
				$msg = 'Se ha actualizado satisfactoriamente el Anexo Nro - ' . $ax ;
			}else{
				$flag = 0;
				$msg = 'Ocurrió un error 00x-AX-u-' . $ax;		
			}


			//delete ax20n
			$this->cap1_model->delete_cap1_ax_c($id,$pr,$ie,$cm,$ax,'P1_C_20N');
			//insert
			// $P1_C_20N_data['user_id'] = $this->tank_auth->get_user_id();
			$P1_C_20N_data['user_id'] = $ui;
			$P1_C_20N_data['created'] = date('Y-m-d H:i:s');
			$P1_C_20N_data['last_ip'] =  $this->input->ip_address();
			$P1_C_20N_data['user_agent'] = $this->agent->agent_string();

			$P1_C_20N_data['id_local'] = $id;
			$P1_C_20N_data['Nro_Pred'] = $pr;	
			$P1_C_20N_data['P1_A_2_NroIE'] = $ie;	
			$P1_C_20N_data['P1_A_2_9_NroCMod'] = $cm;	
			$P1_C_20N_data['P1_A_2_9_Nro'] = $ax;	

			if($P1_C_20N['P1_C_20_Nro'] > 0){
				$cc = 0;
				foreach($P1_C_20N['P1_C_20_Nro'] as &$z){

						foreach ($fields_n as $a=>$b) {
							if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','P1_A_2_9_NroCMod','P1_A_2_9_Nro','user_id','last_ip','user_agent','created','modified'))){							
								$P1_C_20N_data[$b] = ($P1_C_20N[$b][$cc] == '') ? NULL : $P1_C_20N[$b][$cc];
							}	
						}
					    $this->cap1_model->insert_cap1($P1_C_20N_data,'P1_C_20N');			
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