<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cert_model extends CI_Model{
    
    function insertExercise(){
		$data = array(
				'LessonID'		=>$this->input->post('tajuk'),
				'Question'		=>$this->input->post('soalan'),
				'ChoiceA'		=>$this->input->post('jawapanA'),
				'ChoiceB'		=>$this->input->post('jawapanB'),
				'ChoiceC'		=>$this->input->post('jawapanC'),
				'ChoiceD'		=>$this->input->post('jawapanD'),
				'Answer'		=>$this->input->post('jawapan'),
				
			);
		$this->db->insert("exercise",$data);
	}
	function selectInterviewer(){
		$this->db->where("u_role",5);
		$this->db->or_where("(u_role = 4 AND u_interviewer =1)");
		$result = $this->db->order_by("u_id","ASC")
                     ->get("ek_admin");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->u_id] = $dt->u_fullname;
	    }
	    return $data;
	}
	function getUser($id){
		$this->db->where("u_id",$id);
		$this->db->from('tb_users');
		$query = $this->db->get();
		return $query->row();
	}
	function getVideo($id){
		$this->db->where("u_id",base64_decode($id));
		$this->db->from('tb_video_evaluation');
		$query = $this->db->get();
		return $query->row();
	}
	function updateExercise(){
		$data = array(
				'LessonID'		=>$this->input->post('tajuk'),
				'Question'		=>$this->input->post('soalan'),
				'ChoiceA'		=>$this->input->post('jawapanA'),
				'ChoiceB'		=>$this->input->post('jawapanB'),
				'ChoiceC'		=>$this->input->post('jawapanC'),
				'ChoiceD'		=>$this->input->post('jawapanD'),
				'Answer'		=>$this->input->post('jawapan'),
			);
		$this->db->where("ExerciseID",base64_decode($this->input->post('exerciseid')));
		$this->db->update("exercise",$data);
	}
	
	function removeExercise(){	

		$this->db->where("ExerciseID",base64_decode($this->uri->segment(3)));
		$this->db->delete("exercise");
		
	}
	
	function gettempatkursus($id){
		$this->db->where("sub_id",$id);
		$this->db->from('ek_subinstitution');
		$query = $this->db->get();
		return $query->row()->sub_name;
	}
	/* function getsession(){
		$institusi = 2;
		
		$this->db->where("u_status_active",0);
		$this->db->where("u_course_place",$institusi);
		$this->db->from('tb_users');
		$query = $this->db->get();
		return $query->num_rows();
	} */
	function getlimit(){
		$this->db->where("settting_name","limit_use_for_each_session");
		$this->db->from('tb_setting_rules');
		$query = $this->db->get();
		return $query->row()->settting_value;
	}
	function updatestudent(){
		$data = array(
				'u_status_active'		=>1,
				'u_status'				=>2, //telah disahkan
				'u_course_place'		=>$this->input->post('tempatkursus'),
				'u_payment_receipt_no'	=>$this->input->post('resit'),
				'u_activated_by'		=>get_cookie('_userID'),
				'u_activated_on'		=>date("Y-m-d H:i:s"),
				'u_session'				=>$this->input->post('sesi'),
				'u_session_sequence'	=>$this->input->post('giliran'),
				'u_interviewer'			=>$this->input->post('interviewer'),
			);
		$this->db->where("u_id",base64_decode($this->uri->segment(3)));
		$this->db->update("tb_users",$data);
	}
	function updatestudentstatus($path){
		if($this->input->post("penilaian") == 1){
			$status = 4;
			$result = 1;
		}else{
			$status = 5;
			$result = 0;
		}
		$data = array(
				'u_status'				=>$status, 
				'u_overall_result'		=>$result, 
				'u_interview_remarks'	=>$this->input->post('remarks'),
				'u_complete_date'		=>date("Y-m-d H:i:s"),
				'u_interview_date'		=>date("Y-m-d H:i:s"),
				'u_certificate_path'	=>$path,
			);
		$this->db->where("u_id",base64_decode($this->input->post('userid')));
		$this->db->update("tb_users",$data);
		
		
	}
	function updatestudentcert($id,$path){
		
		$data = array(
				'u_certificate_path'	=>$path,
			);
		$this->db->where("u_id",$id);
		$this->db->update("tb_users",$data);
		
		
	}
	
}



?>