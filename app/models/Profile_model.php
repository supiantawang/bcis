<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model{
    
    function getAdmin(){
		$this->db->where("u_id",get_cookie("_userID"));
		$grap = $this->db->get("ek_admin");
		return $grap->row();
	}
	function updateadmin(){
		$data = array(
				'u_fullname'	=>$this->input->post('namapenuh'),
				'u_email'		=>$this->input->post('email'),
				'u_contact'		=>$this->input->post('notel'),
				'u_tempatkerja'	=>$this->input->post('tempatkerja'),
				'u_position'	=>$this->input->post('jawatan'),
				
			);
		$this->db->where("u_id",base64_decode($this->input->post('uid')));
		$this->db->update("ek_admin",$data);
	}
	function updatepassword(){
		$data = array(
				'u_loginpass'	=>$this->encryption->encrypt($this->input->post('newpassword')),				
			);
		$this->db->where("u_id",base64_decode($this->input->post('uid')));
		$this->db->update("ek_admin",$data);
	}
	
}



?>