<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model{
    
	
	function selectSukukaum(){
		
		$result = $this->db->get("pro_sukukaum");
		$data['semua']=' - Semua - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->sukukaum_id] = $dt->sukukaum_name;
	    }
	    return $data;
	}
	function selectkampung(){
		
		$result = $this->db->get("pro_kampung");
		$data['semua']=' - Semua - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->kg_id] = $dt->kg_nama;
	    }
	    return $data;
	}
	function selectprogramtype(){
		
		$this->db->where("lookup_type","jenis-program");
		$result = $this->db->get("pro_lookup");
		$data['semua']=' - Semua - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->lookup_id] = $dt->lookup_desc;
	    }
	    return $data;
	}
	function selectdaerah(){
		
		$this->db->where("daerah_status",1);
		$result = $this->db->get("pro_daerah");
		$data['semua']=' - Semua - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->daerah_id] = $dt->daerah_name;
	    }
	    return $data;
	}
	function selectpos(){
		
		$this->db->where("pos_status",1);
		$result = $this->db->get("pro_pos");
		$data['semua']=' - Semua - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->pos_id] = $dt->pos_name;
	    }
	    return $data;
	}
	function getKIR($id){
		$this->db->where("u_id",base64_decode($id));
		$this->db->from('pro_penduduk');
		$query = $this->db->get();
		return $query->row();
	}
	
}



?>