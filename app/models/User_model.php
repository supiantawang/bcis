<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
    
    function insertUser(){
		$data = array(
				'u_loginname'	=>$this->input->post('noic'),
				'u_loginpass'	=>$this->encryption->encrypt($this->input->post('password')),
				'u_fullname'	=>strtoupper($this->input->post('namapenuh')),
				'u_noic'		=>$this->input->post('noic'),
				'u_email'		=>$this->input->post('email'),
				'u_contact'		=>$this->input->post('notel'),
				'u_status'		=>1,
				'u_role'		=>$this->input->post('peranan'),
				'u_location'	=>$this->input->post('institusi'),
				'u_tempatkerja'	=>$this->input->post('tempatkerja'),
				'u_position'	=>$this->input->post('jawatan'),
				
			);
		$this->db->insert("ek_admin",$data);
	}
	function selectLessons(){
		$result = $this->db->order_by("LessonID","ASC")
                     ->get("ek_lesson");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->LessonID] = $dt->LessonTitle;
	    }
	    return $data;
	}
	function selectrole(){
		if(get_cookie("_urole") == "2"){
			$this->db->where("role_id in(2,3,4,5)");
		}
		if(get_cookie("_urole") == "4"){
			$this->db->where("role_id in(4,5)");
		}
		$result = $this->db->order_by("role_id","ASC")
                     ->get("ek_lkprole");
		//$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->role_id] = $dt->role_desc;
	    }
	    return $data;
	}
	function selectinstitution(){
		/* if(get_cookie("_urole") == "2"){
			$sublocation = $this->blapps_lib->getData("u_location","ek_admin","u_id",get_cookie("_userID"));
			$id_institution = $this->blapps_lib->getData("id_institution","ek_subinstitution","sub_id",$sublocation);
			$this->db->where("id_institution",$id_institution);
		}
		if(get_cookie("_urole") == "4"){
			$location = $this->blapps_lib->getData("u_location","ek_admin","u_id",get_cookie("_userID"));
			$this->db->where("sub_id",$location);
		} */
		$result = $this->db->order_by("daerah_name","ASC")
                     ->get("pro_daerah");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->daerah_id ] = $dt->daerah_name;
	    }
	    return $data;
	}
	function getUser(){
		$this->db->where("u_id",base64_decode($this->uri->segment(3)));
		$this->db->from('ek_admin');
		$query = $this->db->get();
		return $query->row();
	}
	function updateUser(){
		$data = array(
				'u_loginname'	=>$this->input->post('noic'),
				'u_fullname'	=>$this->input->post('namapenuh'),
				'u_noic'		=>$this->input->post('noic'),
				'u_email'		=>$this->input->post('email'),
				'u_contact'		=>$this->input->post('notel'),
				'u_status'		=>$this->input->post('status'),
				'u_role'		=>$this->input->post('peranan'),
				'u_location'	=>$this->input->post('institusi'),
				'u_tempatkerja'	=>$this->input->post('tempatkerja'),
				'u_position'	=>$this->input->post('jawatan'),
				
			);
		$this->db->where("u_id",base64_decode($this->input->post('userid')));
		$this->db->update("ek_admin",$data);
	}
	
	function removeUser(){	

		$this->db->where("u_id",base64_decode($this->uri->segment(3)));
		$this->db->delete("ek_admin");
		
	}
	
	
}



?>