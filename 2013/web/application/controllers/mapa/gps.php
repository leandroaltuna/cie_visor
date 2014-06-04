<?php
class Gps extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('my');
		$this->load->model('visor/visor_model');
		$this->load->model('visor/Procedure_model');
		$this->load->model('segmentaciones/operativa_model');

		$this->load->library('session');

	}

	public function index(){

		$this->load->view('mapa/gps.php');

	}

	public function diez(){

		$this->load->view('mapa/gps_diez.php');

	}

	public function last(){

	      $data['user_id'] = $this->session->userdata('user_id');

		$this->load->view('mapa/puntos_gps.php', $data);

	}
}



