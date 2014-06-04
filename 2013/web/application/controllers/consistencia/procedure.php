<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/rest_controller.php';
//peiec
class Procedure extends REST_Controller{

  function __construct(){

    parent::__construct();
    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/procedure_model');
    $this->load->library('session');
    $this->load->helper('my');

  }
  

    public function QueryLocal_get(){

         $result=validtoken_get($this->get('token'));

         $user_id = $this->tank_auth->get_user_id();

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);

          prettyPrint(json_encode($msg));

        }else{

            header_json();
           
            $data = $this->procedure_model->query_by_Local($this->session->userdata('user_id'),$this->get('id_local'));
            $res="";
            $i=0;
            echo "[";

            foreach ($data->result() as $fila ){

                if($i>0){echo",";}

                $res=array(
                           "codigo_de_local" => "<a href='consistencia/local/".$fila->codigo_de_local."/1/".$user_id."' target='_blank'>".$fila->codigo_de_local."</a>",
                           "Departamento" => $fila->Departamento,
                           "Provincia" => $fila->Provincia,
                           "Distrito" => $fila->Distrito,
                           "IE" => $fila->IE
                           );

                $jsonData = my_json_encode($res);
           
                prettyPrint($jsonData);

                 $i++;

            }

            echo "]";

        }

    }

}