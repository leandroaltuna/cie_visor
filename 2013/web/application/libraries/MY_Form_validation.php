<?php 
class MY_Form_validation extends CI_Form_validation {

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
        $this->ci->load->model('regs_model');
        $this->_error_prefix = '<div class="help-block error">';
        $this->_error_suffix = '</div>';    
    }


    /**
     * Error Array
     *
     * Returns the error messages as an array
     *
     * @return  array
     */
    function error_array()
    {
        if (count($this->_error_array) === 0)
        {
                return FALSE;
        }
        else
            return $this->_error_array;
 
    }

    function check_dni($dni){
        if($this->ci->regs_model->check_dni($dni) > 0){
            return FALSE;   
        }else{
            return TRUE;
        }       
    }
}