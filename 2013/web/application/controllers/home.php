<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		/*
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('administracion/actividad_presupuestal');
		*/
	}


	public function index()
	{

		if (!$this->tank_auth->is_logged_in()) {
			redirect('auth/login');
	    } else {
			$data['home'] = TRUE;
			$data['nav'] = TRUE;
			$data['title'] = 'Inicio';
			$data['main_content'] = 'backend/index_view';
	        $this->load->view('backend/includes/template', $data);
		}
		/*
			$data['home'] = TRUE;
			$data['nav'] = TRUE;
			$data['title'] = 'Inicio';			
		
			$data['main_content'] = 'administracion/seguimiento_view';
			$data['actividad_presupuestal']=$this->actividad_presupuestal->Get_Actividad_Presupuestal();
	        $this->load->view('backend/includes/template', $data);	
		*/
	}
}
