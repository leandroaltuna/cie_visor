<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap5 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		$this->load->model('consistencia/car_model');
		$this->load->model('consistencia/cap5_model');
		$this->load->model('consistencia/cap6_model');
		$this->load->model('consistencia/cap8_model');
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

		

			$fields = $this->principal_model->get_fields('P5');
			$fields_f = $this->principal_model->get_fields('P5_F');
			$fields_n = $this->principal_model->get_fields('P5_N');
			
			$cantpisos = $this->input->post('P5_cantNroPiso');

			//P8
			$tot_e = $this->input->post('P5_Tot_E');
			$tot_p = $this->input->post('P5_Tot_P');
			$tot_ld = $this->input->post('P5_Tot_LD');
			$tot_cte = $this->input->post('P5_Tot_CTE');
			$tot_mc = $this->input->post('P5_Tot_MC');

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
			//p5
			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$c_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			// $c_data['user_id'] = $this->tank_auth->get_user_id();
			$c_data['user_id'] = $ui;
			$c_data['last_ip'] =  $this->input->ip_address();
			$c_data['user_agent'] = $this->agent->agent_string();

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';
			if ($this->cap5_model->consulta_cap5($id,$pr)->num_rows() == 0) {
				$c_data['created'] = date('Y-m-d H:i:s');

				$c_data['id_local'] = $id;
				$c_data['Nro_Pred'] = $pr;

				// inserta nuevo registro
					if($this->cap5_model->insert_cap5($c_data) > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente el Cap V';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Cap5-i';
					}

			} else {
				$c_data['modified'] = date('Y-m-d H:i:s');
				// actualiza
					if($this->cap5_model->update_cap5($id,$pr,$c_data) > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente el Cap V';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Cap5-u';		
					}

			}

			//Actualiza PCar
			// $car_data['user_id'] = $this->tank_auth->get_user_id();
			// $car_data['last_ip'] =  $this->input->ip_address();
			// $car_data['user_agent'] = $this->agent->agent_string();
			// $car_data['modified'] = date('Y-m-d H:i:s');

			// $car_data['PC_E_3_TEdif'] = $tot_e;
			// $car_data['PC_E_4_TPat'] = $tot_p;
			// $car_data['PC_E_5_TLosa'] = $tot_ld;
			// $car_data['PC_E_6_TCist'] = $tot_cte;
			// $car_data['PC_E_7_TMurCon'] = $tot_mc;

			// $this->car_model->update_car($id,$pr,$car_data);

			////////////////////////////////////////////////////////////////cap6
			//edificaciones
			$my_nro_p6 = $this->cap6_model->get_cant_p6_1_for_p5($id,$pr);

			if($my_nro_p6 > 0){
				//es igual
				if($my_nro_p6 == $tot_e) {
					//nothing
				//reducir edificaciones
				}elseif($my_nro_p6 > $tot_e){
					//borrar Edif sobrantes
					for($i=$my_nro_p6; $i!=$tot_e; $i--){
						$this->cap6_model->delete_p6_1_from_p5($id,$pr,$i);
					}
				}
			}


			////////////////////////////////////////////////////////////////cap8
			//pisos
			$my_nro_p8 = $this->cap8_model->get_cant_p8_for_p5($id,$pr,'P');
			$this->del_p8_from_p5($my_nro_p8,$tot_p,$id,$pr,'P');
			
			//losa deportiva
			$my_nro_p8 = $this->cap8_model->get_cant_p8_for_p5($id,$pr,'LD');
			$this->del_p8_from_p5($my_nro_p8,$tot_ld,$id,$pr,'LD');

			//cisternas y tanques
			$my_nro_p8 = $this->cap8_model->get_cant_p8_for_p5($id,$pr,'CTE');
			$this->del_p8_from_p5($my_nro_p8,$tot_cte,$id,$pr,'CTE');

			//muro de contencion
			$my_nro_p8 = $this->cap8_model->get_cant_p8_for_p5($id,$pr,'MC');
			$this->del_p8_from_p5($my_nro_p8,$tot_mc,$id,$pr,'MC');


			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P5_F
			foreach ($fields_f as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
					$edi_f[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}
			
			// $c_data_f['user_id'] = $this->tank_auth->get_user_id();
			$c_data_f['user_id'] = $ui;
			$c_data_f['last_ip'] =  $this->input->ip_address();
			$c_data_f['user_agent'] = $this->agent->agent_string();
			
			$c_data_f['id_local'] = $id;
			$c_data_f['Nro_Pred'] = $pr;
			
			$my_nro_p5_f = $this->cap5_model->get_cant_p5f($id,$pr);

			if($my_nro_p5_f > 0){
				//es igual actualiza
				if($my_nro_p5_f == $cantpisos) {
					//nothing
				//reducir pisos
				}elseif($my_nro_p5_f > $cantpisos){
					//borrar pisos sobrantes
					for($i=$my_nro_p5_f; $i!=$cantpisos; $i--){
						$this->cap5_model->delete_cap5_f($id,$pr,$i);
					}
					
				}
			}
			
			if ($cantpisos > 0){
				$cc = 0;
				foreach($edi_f['P5_NroPiso'] as &$z){
						
					foreach ($fields_f as $a=>$b) {
						
						if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
							
							$c_data_f[$b] = ($edi_f[$b][$cc] == '') ? NULL : $edi_f[$b][$cc];	
							
						}
					}

					$hay_datos = $this->cap5_model->get_cant_p5f_v2($id,$pr,$edi_f['P5_NroPiso'][$cc])->num_rows();

					if ($hay_datos > 0) {
						$c_data_f['modified'] = date('Y-m-d H:i:s');
						$this->cap5_model->update_cap5_f($id,$pr,$edi_f['P5_NroPiso'][$cc],$c_data_f);
					}else{
						$c_data_f['created'] = date('Y-m-d H:i:s');
						$this->cap5_model->insert_cap5_f($c_data_f);
					}
					
					$cc++;
				}
			}

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//P5_N
			foreach ($fields_n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
					$edi_n[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}

			// $c_data_n['user_id'] = $this->tank_auth->get_user_id();
			$c_data_n['user_id'] = $ui;
			$c_data_n['last_ip'] =  $this->input->ip_address();
			$c_data_n['user_agent'] = $this->agent->agent_string();

			$c_data_n['id_local'] = $id;
			$c_data_n['Nro_Pred'] = $pr;

			//pregunto cantidad y comparo luego elimno lo que sobra.
			$my_nro_p5_n = $this->cap5_model->get_cap5_n($id,$pr,1)->num_rows();

			if ($my_nro_p5_n > 0){
				if($my_nro_p5_n == $tot_e) {
					//nothing
				//reducir p5_n
				}elseif($my_nro_p5_n > $tot_e){
					//borrar sobrantes
					for($i=$my_nro_p5_n; $i!=$tot_e; $i--){
						$this->cap5_model->delete_p5n_for_edif($id,$pr,$i);
					}
				}
			}

			if ($cantpisos > 0) {
				//solo inserta o actualiza.
				$cc = 0;
				for ($i=0; $i<$cantpisos ; $i++) {
					$c_data_n['P5_NroPiso'] = $i+1;

					for($j=0; $j<$tot_e; $j++){
						$c_data_n['P5_Ed_Nro'] = $j+1;

						$hay_datos = $this->cap5_model->get_cant_p5n($id,$pr,$c_data_n['P5_NroPiso'],$c_data_n['P5_Ed_Nro'])->num_rows();

						foreach ($fields_n as $a=>$b) {
							
							if(!in_array($b, array('id_local','Nro_Pred','P5_NroPiso','P5_Ed_Nro','user_id','last_ip','user_agent','created','modified'))){
								
								$c_data_n[$b] = ($edi_n[$b][$cc] == '') ? NULL : $edi_n[$b][$cc];	
								
							}
						}

						if ($hay_datos > 0){
							$c_data_n['modified'] = date('Y-m-d H:i:s');
							$this->cap5_model->update_cap5_n($id,$pr,$c_data_n['P5_NroPiso'],$c_data_n['P5_Ed_Nro'],$c_data_n);	
						}else{
							$c_data_n['created'] = date('Y-m-d H:i:s');
							$this->cap5_model->insert_cap5_n($c_data_n);	
						}

						//ambientes
						$hay_ambientes = $this->cap6_model->get_cant_p6_2_for_p5($id,$pr,$c_data_n['P5_Ed_Nro'],$c_data_n['P5_NroPiso']);

						$nro_amb = $c_data_n['P5_TotAmb'];
						if ($hay_ambientes > $nro_amb){
							//borrar sobrantes
							for($w=$hay_ambientes; $w!=$nro_amb; $w--){
								$this->cap6_model->delete_p6_2_from_p5($id,$pr,$c_data_n['P5_Ed_Nro'],$c_data_n['P5_NroPiso'],$w);
							}
						}

						$cc++;
					}
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

	private function del_p8_from_p5($my_nro_p8,$total_oe,$id,$pr,$tipo){
		
		if($my_nro_p8 > 0){
			//es igual
			if($my_nro_p8 == $total_oe) {
				//nothing
			//reducir otras edificaciones
			}elseif($my_nro_p8 > $total_oe){
				//borrar OE sobrantes
				for($i=$my_nro_p8; $i!=$total_oe; $i--){
					$this->cap8_model->delete_p8_from_p5($id,$pr,$tipo,$i);
				}
			}
		}
	}

	public function cap5_i()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');

		$data = $this->cap5_model->get_cap5($codigo,$predio);

		echo json_encode($data->result());

	}

	public function cap5_f()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');

		$data = $this->cap5_model->get_cap5_f($codigo,$predio);

		echo json_encode($data->result());

	}

	public function cap5_n()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$piso = $this->input->get('piso');

		$data = $this->cap5_model->get_cap5_n($codigo,$predio,$piso);

		echo json_encode($data->result());

	}

	public function cap5n_for_p6_2()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edif = $this->input->get('edi');

		$data = $this->cap5_model->get_cap5n_for_p6_2($codigo,$predio,$edif);

		echo json_encode($data->result());

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */