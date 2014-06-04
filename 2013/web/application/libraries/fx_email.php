<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class fx_email{
	function __construct()
	{
		$this->ci =& get_instance();
        $this->ci->lang->load('panel');
        $this->ci->load->library('email');
        $this->ci->load->config('tank_auth', TRUE);

	}
    public function send($type, $email, &$data)
    {
        $this->ci->email->from($this->ci->config->item('webmaster_email', 'tank_auth'), $this->ci->config->item('website_name', 'tank_auth'));
        $this->ci->email->reply_to($this->ci->config->item('webmaster_email', 'tank_auth'), $this->ci->config->item('website_name', 'tank_auth'));
        $this->ci->email->to($email);
        $this->ci->email->subject($this->ci->lang->line('panel_'.$type));
        $this->ci->email->message($this->ci->load->view('email/'.$type.'-html', $data, TRUE));
        $this->ci->email->set_alt_message($this->ci->load->view('email/'.$type.'-txt', $data, TRUE));
        $this->ci->email->send();
    }
  }