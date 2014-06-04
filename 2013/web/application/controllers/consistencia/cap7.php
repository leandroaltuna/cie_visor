<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap7 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		$this->load->model('consistencia/cap7_model');
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

			
			if ($this->cap6_model->consulta_cap6($id,$pr,$nroedif)->num_rows() > 0) 
			{

				$fields = $this->principal_model->get_fields('P7');
				
				//P7
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
				if ($this->cap7_model->consulta_cap7($id,$pr,$nroedif)->num_rows() == 0) {
					$c_data['created'] = date('Y-m-d H:i:s');

					$c_data['id_local'] = $id;
					$c_data['Nro_Pred'] = $pr;
					// inserta nuevo registro
						if($this->cap7_model->insert_cap7($c_data) > 0){
							$flag = 1;
							$msg = 'Se ha registrado satisfactoriamente el Cap VII';
						}else{
							$flag = 0;
							$msg = 'Ocurrió un error 00x-Cap7-i';
						}

				} else {
					$c_data['modified'] = date('Y-m-d H:i:s');
					// actualiza
						if($this->cap7_model->update_cap7($id,$pr,$nroedif,$c_data) > 0){
							$flag = 1;
							$msg = 'Se ha actualizado satisfactoriamente el Cap VII';
						}else{
							$flag = 0;
							$msg = 'Ocurrió un error 00x-Cap7-u';		
						}

				}

				// Pasar automáticamente a la siguiente edificación.
				// $tot_e = $this->cap6_model->get_tot_e_p5($id,$pr);
				// $newedif = $nroedif+1;
				// $datos['newedif'] = ($newedif <= $tot_e) ? $newedif : 0;
				// *********************************************************
			}else{
				$flag = 2;
				$msg = 'Error. Aún no se registra la Edificación en el Cap 6';
			}

			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		

		}else{
			show_404();;
		}
	}

	public function cap7_i()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');

		$data = $this->cap7_model->get_cap7($codigo,$predio,$edi);
		
		echo json_encode($data->row());
		
		// $i=0;
		// echo "[";

		// foreach ($data->result() as $fila ){

		// 	if($i>0){echo",";}

		// 	$x= array("P7_1_2" => $fila->P7_1_2,
		// 	"P7_1_3" => $fila->P7_1_3,
		// 	"P7_1_4" => $fila->P7_1_4,
		// 	"P7_1_5" => $fila->P7_1_5,
		// 	"P7_1_6" => $fila->P7_1_6,
		// 	"P7_1_7" => $fila->P7_1_7,
		// 	"P7_1_8" => $fila->P7_1_8,
		// 	"P7_1_9" => $fila->P7_1_9,
		// 	"P7_1_9A" => $fila->P7_1_9A,
		// 	"P7_1_9B" => $fila->P7_1_9B,
		// 	"P7_1_9C" => $fila->P7_1_9C,
		// 	"P7_1_9D" => $fila->P7_1_9D,
		// 	"P7_1_10" => $fila->P7_1_10,
		// 	"P7_1_11" => $fila->P7_1_11,
		// 	"P7_1_12" => $fila->P7_1_12,
		// 	"P7_1_13" => $fila->P7_1_13,
		// 	"P7_1_14" => $fila->P7_1_14,
		// 	"P7_1_15" => $fila->P7_1_15,
		// 	"P7_1_15A" => $fila->P7_1_15A,
		// 	"P7_1_15B" => $fila->P7_1_15B,
		// 	"P7_1_15C" => $fila->P7_1_15C,
		// 	"P7_1_15D" => $fila->P7_1_15D,
		// 	"P7_1_16" => $fila->P7_1_16,
		// 	"P7_1_17" => $fila->P7_1_17,
		// 	"P7_1_18" => $fila->P7_1_18,
		// 	"P7_1_19" => $fila->P7_1_19,
		// 	"P7_1_20" => $fila->P7_1_20,
		// 	"P7_1_21" => $fila->P7_1_21,
		// 	"P7_1_22" => $fila->P7_1_22,
		// 	"P7_1_23" => $fila->P7_1_23,
		// 	"P7_1_24" => $fila->P7_1_24,
		// 	"P7_1_25" => $fila->P7_1_25,
		// 	"P7_1_26" => $fila->P7_1_26,
		// 	"P7_1_27" => $fila->P7_1_27,
		// 	"P7_1_28" => $fila->P7_1_28,
		// 	"P7_2_1" => $fila->P7_2_1,
		// 	"P7_2_2" => $fila->P7_2_2,
		// 	"P7_Obs" => $fila->P7_Obs);

		// 	$jsonData = my_json_encode($x);

		// 	prettyPrint($jsonData);

		// 	$i++;
		// }

		// echo "]";

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */