<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consistencia_ajax extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	

		$this->load->model('consistencia/ubigeo_model');
		$this->load->model('consistencia/principal_model');
	}


	public function index()
	{
		show_404();
	}
	
	public function get_ajax_prov()
	{
		$this->output->cache(9999999999);
		$dep = $this->input->post('dep');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->ubigeo_model->get_provs($dep)->result();
			$this->load->view('backend/json/json_view', $data);		
		}else{
			show_404();
		}
	}		

	public function get_ajax_dist()
	{
		$this->output->cache(9999999999);
		$dep = $this->input->post('dep');
		$prov = $this->input->post('prov');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->ubigeo_model->get_dis($dep,$prov)->result();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();
		}
	}		

	public function get_ajax_dnic()
	{
		$this->output->cache(9999999999);
		$is_ajax = $this->input->post('ajax');
		$dni = $this->input->post('dni');
		if($is_ajax){
			$data['datos'] = $this->principal_model->get_dnic($dni)->row();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();
		}
	}	

			
}
