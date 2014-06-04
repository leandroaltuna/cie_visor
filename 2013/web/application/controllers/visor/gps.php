<?php

require APPPATH.'/libraries/rest_controller.php';

class Gps extends REST_Controller{

	function __construct(){

			parent::__construct();
			$this->load->library('tank_auth');
			$this->lang->load('tank_auth');
			$this->load->model('visor/visor_model');
			$this->load->model('visor/Procedure_model');
      $this->load->model('visor/P313nimputar_model');
			$this->load->model('seguimiento/operativa_model');
      $this->load->library('session');
      $this->load->helper('my');

	}


	public function sedeOperativa_get(){

        $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->operativa_model->Get_SedebyUser($this->session->userdata('user_id'));
            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }

    }

    public function provinciaOperativa_get(){

        $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->operativa_model->Get_ProvbySedeOpe($this->get('code'));
            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }

    }

    public function updateP313nimputar_post(){

      $registros = array(
          'id_local'  => trim($this->post('id_local')),
          'Nro_Pred'  => trim($this->post('Nro_Pred')),
          'LatitudPunto'  => $this->post('LatitudPunto'),
          'LongitudPunto'  => $this-> post('LongitudPunto'),
          'user_id'  => $this-> post('user_id'),
          );

      $flag = $this->P313nimputar_model->insert($registros);
    }


}

?>