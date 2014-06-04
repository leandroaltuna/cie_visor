<?php
class Ubigeo_piloto_model extends CI_Model{

    function get_dptos(){
    	$this->db->select('COD_DEPARTAMENTO, DES_DISTRITO');
    	$this->db->where_in('ID_DEPARTAMENTO', array(16,20,21));
    	$this->db->where('ID_PROVINCIA',0);
    	$this->db->where('ID_DISTRITO',0);
    	$this->db->where('COD_DEPARTAMENTO !=','99');
    	$this->db->order_by('DES_DISTRITO','asc');
    	$q = $this->db->get('ubigeo');
		return $q;
    }    
    function get_dpto_by_code($code){
		if ($code == 99){ $deps = array(16,20,21);}else{ $deps = $code;}
    	$this->db->select('COD_DEPARTAMENTO, DES_DISTRITO, CENTRO');
    	$this->db->where_not_in('ID_DEPARTAMENTO', array(0,26,27));
    	$this->db->where_in('COD_DEPARTAMENTO',$deps);
    	$this->db->where('ID_PROVINCIA',0);
    	$this->db->where('ID_DISTRITO',0);
    	$this->db->where('COD_DEPARTAMENTO !=','99');
    	$this->db->order_by('DES_DISTRITO','asc');
    	$q = $this->db->get('ubigeo');
		return $q;
    }    

    function get_provs($dpto){
		if ($dpto ==='20' || $dpto === '21'){ $prov = '01';}
		elseif ($dpto==='16') {  $prov = '03';}
		$this->db->select ('COD_DEPARTAMENTO, COD_PROVINCIA,ID_PROVINCIA, DES_DISTRITO');
		$this->db->where('COD_DEPARTAMENTO',$dpto);
		$this->db->where('COD_PROVINCIA',$prov);
		$this->db->where('COD_DISTRITO',0);
		$this->db->order_by('DES_DISTRITO','asc');
		$q = $this->db->get('ubigeo');
		return $q;
    }

	function get_dist($prov,$dpto)
	{
		if ($prov ==='03'){$dist = array('01','02');}
		elseif ($prov === '01' && $dpto ==='20') { $dist = array('11','14');}
		elseif ($prov === '01' && $dpto ==='21') { $dist = array('01','06');}
		$this->db->select ('COD_PROVINCIA, COD_DISTRITO, DES_DISTRITO');
		$this->db->where('COD_DEPARTAMENTO',$dpto);
		$this->db->where('COD_PROVINCIA',$prov);
		$this->db->where_in('COD_DISTRITO',$dist);
		$this->db->order_by('DES_DISTRITO','asc');
		$q = $this->db->get('ubigeo');
		return $q;
	}
	

 }
