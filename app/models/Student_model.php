<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model{
    
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
		$this->db->where("u_id",base64_decode($id));
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
	function updatestudentstatus(){
		$ic = $this->blapps_lib->getData("u_noic","ek_admin","u_id",get_cookie("_userID"));
		$data = array(
				'u_status'				=>3, //telah selesai topik/telah dinilai
				'u_interviewer'			=>$this->input->post('interviewer'),
			);
		$this->db->where("u_id",base64_decode($this->input->post('userid')));
		$this->db->update("tb_users",$data);
		
		$data1 = array(
				'vide_status'		=>$this->input->post('penilaian'),
				'vide_notes'		=>$this->input->post('remarks'),
				'u_noic'			=>$ic,
				'vide_date'			=>date("Y-m-d"),
			);
		$this->db->where("u_id",base64_decode($this->input->post('userid')));
		$this->db->update("tb_video_evaluation",$data1);
		
		
	}
	
	function createprofile(){
		
		
		$data = array(

				'u_full_name'	=>$this->input->post('namapenuh'),
				'u_ic_number'	=>$this->input->post('noic'),
				'u_occupation'	=>$this->input->post('pekerjaan'),
				'u_work_place'	=>$this->input->post('tempatkerja'),
				'u_gender'		=>$this->input->post('jantina'),
				'u_phone_number'=>$this->input->post('notel'),
				'u_address'		=>$this->input->post('alamat'),
				'u_course_place'=>$this->input->post('daerah'),
				'u_interview_remarks'=>$this->input->post('negeri'),
				'u_payment_receipt_no'=>$this->input->post('sukukaum'),
				'u_registered_on'=>$this->input->post('sukukaum'),
				'u_activated_by'=>get_cookie('_userID'),
				'u_activated_on'=>date("Y-m-d H:i:s"),
				'u_status'		=>2,
			);
		$this->db->insert("tb_users",$data);
		
		
	}
	
	
}



?>