<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Input extends CI_Input {

function posts() {
        
        $posts = array();
        
        foreach($_POST as $key => $value) {
            
            $posts[$key] = $this->post($key);
            
        }
        
        return $posts;
        
    } 

}

/* End of File */