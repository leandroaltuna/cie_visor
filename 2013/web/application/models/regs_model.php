<?php
class Regs_model extends CI_Model{

    function insert_reg($data){
		$this->db->insert('registro', $data);		
        return $this->db->insert_id();
    }
    function  update_reg($data,$dni){
        $this->db->where('dni', $dni);
        $this->db->update('registro', $data);       
        return $this->db->affected_rows() > 0; 
    }    
    function  delete_reg($dni){
        $this->db->where('dni', $dni);
        $this->db->delete('registro');       
        return $this->db->affected_rows() > 0; 
    }


    function get_fields_regs(){
        $q = $this->db->list_fields('registro');
        return $q;
    }

   
    function check_dni($dni){
    	$this->db->where('dni',$dni);
        $this->db->where('estado',1);
        $this->db->where('activo',1);        
    	$q = $this->db->get('registro');
		return $q->num_rows();
    }   

   
    function consulta_dni($dni)
    {
        $this->db->select('ODEI, Lugar, cargoFuncional, Profesion, nombre1, nombre2, ap_paterno, ap_materno, NEstado');
        $this->db->where('dni',$dni);
        $q = $this->db->get('v_ConsultaInscripcion');        
        return $q;
    }

    function consulta_dni_mantenimiento($dni){
        $this->db->select('*');
        $this->db->where('dni',$dni);
        $q = $this->db->get('registro');
        return $q;
    }

    function get_regs($st){
        $this->db->select('*');
        $this->db->select('regs.id as myid');
        $this->db->select('u.detalle as unidesc');
        $this->db->join('cargo_funcional cf','regs.cargos_inei = cf.COD','left');
        $this->db->join('proyectos_inei pi','regs.proyectos_inei = pi.SECU_FUNC_SFU','left');
        $this->db->join('universidades u','regs.universidad = u.id','left');
        $this->db->join('ocupacion o','regs.ocupacion = o.codigo','left');
        if($st!=0)
        $this->db->where('estado',$st);
        $this->db->where('activo',1);
        $q = $this->db->get('registro');
        return $q;
    }  

    function get_regs_by_dep($dep,$st){
        $this->db->select('*');
        $this->db->select('regs.id as myid');
        $this->db->select('u.detalle as unidesc');        
        $this->db->where('cod_dep',$dep);
        $this->db->join('cargo_funcional cf','regs.cargos_inei = cf.COD','left');
        $this->db->join('proyectos_inei pi','regs.proyectos_inei = pi.SECU_FUNC_SFU','left');
        $this->db->join('universidades u','regs.universidad = u.id','left');
        $this->db->join('ocupacion o','regs.ocupacion = o.codigo','left');
        if($st!=0)
        $this->db->where('registro.estado',$st);
        $this->db->where('registro.activo',1);
        $q = $this->db->get('regs');
        return $q;
    }      

    function get_nro_regs_by_dep($dep,$st){
        $this->db->select('COUNT(id) as numero');
        if($dep != 0)
        $this->db->where('cod_dep',$dep);
        if($st != 0)
        $this->db->where('estado',$st);
        $this->db->where('activo',1);
        $q = $this->db->get('registro');
        return $q;
    }      

    function cambio_estado($id,$st,$oldst){
        $this->db->set('estado', $st);
        $this->db->where('id', $id);
        $this->db->where('estado', $oldst);
        $this->db->update('registro');
        return $this->db->affected_rows() > 0;  
    } 

     function get_regs_by_state($dep){
        $this->db->select('dni');
        $this->db->select('ap_paterno');
        $this->db->select('ap_materno');
        $this->db->select('nombre1');
        $this->db->select('nombre2');
        $this->db->select('ap_paterno');
        $this->db->select('estado');
        $this->db->where('cod_dep',$dep);
        $this->db->where('activo',1);
        $this->db->order_by('estado','desc');
        $this->db->order_by('order_n','asc');
        $q = $this->db->get('registro');
        return $q;
    }   

 }