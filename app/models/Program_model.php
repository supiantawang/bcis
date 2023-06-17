<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program_model extends CI_Model{
    
	function selectpos(){
		
		$result = $this->db->get("pro_pos");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->pos_id] = $dt->pos_name;
	    }
	    return $data;
	}
	function selectkampung(){
		
		$result = $this->db->get("pro_kampung");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->kg_id] = $dt->kg_nama;
	    }
	    return $data;
	}
	function selectagama(){
		
		$result = $this->db->get("pro_agama");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->agama_id] = $dt->agama_desc;
	    }
	    return $data;
	}
	function selectincome(){
		
		$result = $this->db->get("pro_pendapatan");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->pendapatan_id] = $dt->pendapatan_desc;
	    }
	    return $data;
	}
	function selectsukukaum(){
		
		$result = $this->db->where("sukukaum_status",1);
		$result = $this->db->get("pro_sukukaum");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->sukukaum_id] = $dt->sukukaum_name;
	    }
	    return $data;
	}
	function selectkir(){
		
		$result = $this->db->where("u_parent",0);
		$result = $this->db->get("pro_penduduk");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->u_id] = $dt->u_full_name ." [". $dt->u_ic_number ."]";
	    }
	    return $data;
	}
	function selecteducation(){
		
		$result = $this->db->get("pro_pendidikan");
		//$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->pendidikan_id] = $dt->pendidikan_desc;
	    }
	    return $data;
	}
	function selectvillage(){
		$this->db->join("pro_pos pos","pos.pos_id = kg.kg_pos_id");
		$this->db->join("pro_daerah dae","dae.daerah_id = pos.pos_daerah");
		$this->db->order_by("dae.daerah_name","ASC");
		$result = $this->db->get("pro_kampung kg");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->kg_id] = $dt->daerah_name . " - " . $dt->pos_name . " - " . $dt->kg_nama;
	    }
	    return $data;
	}
	function selectagency(){
		
		$result = $this->db->get("pro_agensi");
		//$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->agensi_id] = $dt->agensi_name;
	    }
	    return $data;
	}
	function selectcategory(){
		
		$result = $this->db->get("pro_agensi_type");
		//$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->type_id] = $dt->type_desc;
	    }
	    return $data;
	}
	function selectcategoryprogram(){
		$data['']=' - Sila Pilih - ';
		$result = $this->db->get("pro_program_kategori");
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->kategori_id] = $dt->kategori_desc;
	    }
	    return $data;
	}
	function selecttype(){
		
		$this->db->where("lookup_type","jenis-program");
		$result = $this->db->get("pro_lookup");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->lookup_id] = $dt->lookup_desc;
	    }
	    return $data;
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
	function getKIR($id){
		$this->db->where("u_id",base64_decode($id));
		$this->db->from('pro_penduduk');
		$query = $this->db->get();
		return $query->row();
	}
	function getprogram($id){
		$this->db->where("program_id",base64_decode($id));
		$this->db->from('pro_program');
		$query = $this->db->get();
		return $query->row();
	}
	function getagensi($id){
		$this->db->where("agensi_id",$id);
		$this->db->from('pro_agensi');
		$query = $this->db->get();
		return $query->row();
	}
	function getVideo($id){
		$this->db->where("u_id",base64_decode($id));
		$this->db->from('tb_video_evaluation');
		$query = $this->db->get();
		return $query->row();
	}
	function insertagency(){
		$data = array(
				'program_kg'		=>$this->input->post('village'),
				'program_title'		=>$this->input->post('title'),
				'program_desc'		=>$this->input->post('jantina'),
				'program_category'	=>$this->input->post('category'),
				'program_type'		=>$this->input->post('jenis'),
				'program_agency'	=>$this->input->post('agency'),
				'program_sdate'		=>$this->input->post('sdate'),
				'program_edate'		=>$this->input->post('edate'),
				'program_cost'		=>$this->input->post('cost'),
				'program_totalparticipant'=>$this->input->post('total'),
				'program_desc'		=>$this->input->post('description'),
				'program_achievement'=>$this->input->post('achievement'),
				'program_createdby'	=>get_cookie('_userID'),				
				'program_created'	=>date("Y-m-d H:i:s"),				
				'program_modifiedby'=>get_cookie('_userID'),				
				'program_modified'	=>date("Y-m-d H:i:s"),				
			);
		$this->db->insert("pro_program",$data);
	}
	function insertrequired(){
		$data = array(
				'program_kg'		=>$this->input->post('village'),
				'program_title'		=>$this->input->post('title'),
				'program_desc'		=>$this->input->post('jantina'),
				'program_category'	=>$this->input->post('category'),
				'program_type'		=>$this->input->post('jenis'),
				'program_agency'	=>$this->input->post('agency'),
				'program_sdate'		=>$this->input->post('sdate'),
				'program_edate'		=>$this->input->post('edate'),
				'program_cost'		=>$this->input->post('cost'),
				'program_totalparticipant'=>$this->input->post('total'),
				'program_desc'		=>$this->input->post('description'),
				'program_achievement'=>$this->input->post('achievement'),
				'program_isrequired'=>2,
				'program_createdby'	=>get_cookie('_userID'),				
				'program_created'	=>date("Y-m-d H:i:s"),				
				'program_modifiedby'=>get_cookie('_userID'),				
				'program_modified'	=>date("Y-m-d H:i:s"),				
			);
		$this->db->insert("pro_program",$data);
	}
	function updateagency(){
		$data = array(
				'program_kg'		=>$this->input->post('village'),
				'program_title'		=>$this->input->post('title'),
				'program_desc'		=>$this->input->post('jantina'),
				'program_category'	=>$this->input->post('category'),
				'program_type'		=>$this->input->post('jenis'),
				'program_agency'	=>$this->input->post('agency'),
				'program_sdate'		=>$this->input->post('sdate'),
				'program_edate'		=>$this->input->post('edate'),
				'program_cost'		=>$this->input->post('cost'),
				'program_totalparticipant'=>$this->input->post('total'),
				'program_desc'		=>$this->input->post('description'),
				'program_achievement'=>$this->input->post('achievement'),		
				'program_modifiedby'=>get_cookie('_userID'),				
				'program_modified'	=>date("Y-m-d H:i:s"),				
			);
		$this->db->where("program_id",base64_decode($this->uri->segment(4)));
		$this->db->update("pro_program",$data);
	}
	function deleteagency(){
		$data = array(
				'program_modifiedby'	=>get_cookie('_userID'),				
				'program_modified'	=>date("Y-m-d H:i:s"),				
				'program_delete'		=>1,	
			);
		$this->db->where("program_id",base64_decode($this->uri->segment(4)));
		$this->db->update("pro_program",$data);
	}
	function updateair(){
		$kg = $this->blapps_lib->getData("u_kg_id","pro_penduduk","u_id",$this->input->post('kir'));
		$pos = $this->blapps_lib->getData("u_pos_id","pro_penduduk","u_id",$this->input->post('kir'));
		$data = array(
				'u_pos_id'		=>$pos,
				'u_kg_id'		=>$kg,
				'u_ic_number'	=>$this->input->post('noic'),
				'u_full_name'	=>$this->input->post('nama'),
				'u_gender'		=>$this->input->post('jantina'),
				'u_religion'	=>$this->input->post('agama'),
				'u_tribes'		=>$this->input->post('sukukaum'),
				'u_education'	=>$this->input->post('pendidikan'),
				'u_employment'	=>$this->input->post('pekerjaan'),
				'u_income'		=>$this->input->post('pendapatan'),
				'u_modifiedby'	=>get_cookie('_userID'),				
				'u_modified'	=>date("Y-m-d H:i:s"),				
				'u_status'		=>$this->input->post('status'),	
				'u_parent'		=>$this->input->post('kir'),	
			);
		$this->db->where("u_id",base64_decode($this->uri->segment(4)));
		$this->db->update("pro_penduduk",$data);
	}
	function deleteair(){
		$data = array(
				'u_modifiedby'	=>get_cookie('_userID'),				
				'u_modified'	=>date("Y-m-d H:i:s"),				
				'u_delete'		=>1,	
			);
		$this->db->where("u_id",base64_decode($this->uri->segment(4)));
		$this->db->update("pro_penduduk",$data);
	}
	
	function insertair(){
		$kg = $this->blapps_lib->getData("u_kg_id","pro_penduduk","u_id",$this->input->post('kir'));
		$data = array(
				'u_kg_id'		=>$kg,
				'u_ic_number'	=>$this->input->post('noic'),
				'u_full_name'	=>$this->input->post('nama'),
				'u_gender'		=>$this->input->post('jantina'),
				'u_religion'	=>$this->input->post('agama'),
				'u_tribes'		=>$this->input->post('sukukaum'),
				'u_education'	=>$this->input->post('pendidikan'),
				'u_employment'	=>$this->input->post('pekerjaan'),
				'u_income'		=>$this->input->post('pendapatan'),
				'u_penghulu'	=>0,
				'u_createdby'	=>get_cookie('_userID'),				
				'u_created'		=>date("Y-m-d H:i:s"),				
				'u_modifiedby'	=>get_cookie('_userID'),				
				'u_modified'	=>date("Y-m-d H:i:s"),				
				'u_status'		=>1,	
				'u_parent'		=>$this->input->post('kir'),	
			);
		$this->db->insert("pro_penduduk",$data);
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