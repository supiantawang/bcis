<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity_model extends CI_Model{
    
    function insertActivity(){
		$data = array(
				'act_name'				=>$this->input->post('namaaktiviti'),
				'topic_id'				=>$this->input->post('topik'),
				'act_order_sort'		=>$this->input->post('turutan'),
				'act_activity_type'		=>1, //1 = Games, 2 = Latihan
				'act_category'			=>$this->input->post('kategori'),
				'act_active'			=>1,
				'act_min_completion_time'=>$this->input->post('masa'),
				
			);
		$this->db->insert("tb_activity",$data);
	}
	function selectTopic($ins_id=''){
		if($ins_id){
			$this->db->where("ins_id",$ins_id);
			$this->db->join("tb_topic_institution","tb_topic_institution.topic_id = tb_topic.topic_id");
			$this->db->order_by("topic_sort","ASC");
			
		}
		$result = $this->db->get("tb_topic");
		//echo $this->db->last_query();exit;
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->topic_institution_id] = $dt->topic_name." - ".$dt->topic_desc;
	    }
	    return $data;
	}
	function selectInstitusi(){
		$this->db->where("ins_active",1);
		$result = $this->db->order_by("ins_id","ASC")
                     ->get("ek_institution");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->ins_id] = $dt->ins_code." - ".$dt->ins_name;
	    }
	    return $data;
	}
	function selectAktiviti(){
		$this->db->where("act_activity_type",1);
		$this->db->join("tb_topic","tb_topic.topic_id = tb_activity.topic_id");
		$this->db->order_by("tb_activity.topic_id","ASC");
		$result = $this->db->order_by("act_name","ASC")
                     ->get("tb_activity");
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->act_id] = $dt->topic_name  . " - " . $dt->act_name;
	    }
	    return $data;
	}
	function selectLessons(){
		$result = $this->db->order_by("LessonID","ASC")
                     ->get("lesson");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->LessonID] = $dt->LessonTitle;
	    }
	    return $data;
	}
	function getActivity(){
		$this->db->where("act_id",base64_decode($this->uri->segment(3)));
		$this->db->from('tb_activity');
		$query = $this->db->get();
		return $query->row();
	}
	function updateActivity(){
		$data = array(
				'act_name'				=>$this->input->post('namaaktiviti'),
				'topic_id'				=>$this->input->post('topik'),
				'act_order_sort'		=>$this->input->post('turutan'),
				'act_activity_type'		=>1, //1 = Games, 2 = Latihan
				'act_category'			=>$this->input->post('kategori'),
				'act_active'			=>1,
				'act_min_completion_time'=>$this->input->post('masa'),
				
			);
		$this->db->where("act_id",base64_decode($this->input->post('activityid')));
		$this->db->update("tb_activity",$data);
	}
	
	function removeExercise(){	

		$this->db->where("act_id",base64_decode($this->uri->segment(3)));
		$this->db->delete("tb_activity");
		
	}
	
	function insertQuestion($path){
		$data = array(
				'aque_name'				=>$this->input->post('soalan'),
				'act_id'				=>$this->input->post('aktiviti'),
				'aque_link'				=>$path,
				'aque_order_sort'		=>$this->input->post('turutan'),
				'aque_type'				=>$this->input->post('jenis'), //1 = MCQ, 2 = T/F
				'aque_active'			=>1,
				
			);
		$this->db->insert("tb_activity_question",$data);
	}
	function getQuestion(){
		$this->db->where("aque_id",base64_decode($this->uri->segment(3)));
		$this->db->from('tb_activity_question');
		$query = $this->db->get();
		return $query->row();
	}
	function updateQuestion($path=''){
		if($path == ""){
			$data = array(
				'aque_name'				=>$this->input->post('soalan'),
				'act_id'				=>$this->input->post('aktiviti'),
				'aque_order_sort'		=>$this->input->post('turutan'),
				'aque_type'				=>$this->input->post('jenis'),
				'aque_active'			=>$this->input->post('status'),
				
			);
		}else{
			$data = array(
				'aque_name'				=>$this->input->post('soalan'),
				'act_id'				=>$this->input->post('aktiviti'),
				'aque_link'				=>$path,
				'aque_order_sort'		=>$this->input->post('turutan'),
				'aque_type'				=>$this->input->post('jenis'),
				'aque_active'			=>$this->input->post('status'),
				
			);
		}
		
		$this->db->where("aque_id",base64_decode($this->input->post('questionid')));
		$this->db->update("tb_activity_question",$data);
	}
	function removequestion(){
		$link = $this->blapps_lib->getData("aque_link","tb_activity_question","aque_id",base64_decode($this->uri->segment(3)));
		if($link !="") unlink("./".$link);
		

		$this->db->where("aque_id",base64_decode($this->uri->segment(3)));
		$this->db->delete("tb_activity_question");
	}
	function removeimgquestion(){
		$link = $this->blapps_lib->getData("aque_link","tb_activity_question","aque_id",base64_decode($this->uri->segment(3)));
		if($link !="") unlink("./".$link);
		

		$this->db->where("aque_id",base64_decode($this->uri->segment(3)));
		$this->db->update("tb_activity_question",array('aque_link'=>''));
	}
	function selectQuestion(){
		//kemaskini lagi untuk aktiviti sahaja...
		$this->db->where("aque_id NOT IN(select aque_id from tb_activity_answer where aque_id = aque_id)");
		$this->db->where("act_activity_type",1);
		$this->db->join("tb_activity","tb_activity.act_id = tb_activity_question.act_id");
		$result = $this->db->order_by("aque_id","ASC")
                     ->get("tb_activity_question");
		$data['']=' - Sila Pilih Soalan - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->aque_id] = $dt->aque_name;
	    }
	    return $data;
	}
	function insertAnswer(){
		if($this->input->post('type') == "mcq"){
			$data = array(
				'aque_id'			=>$this->input->post('soalan'),
				'acta_answer_a'		=>$this->input->post('answerA'),
				'acta_answer_b'		=>$this->input->post('answerB'),
				'acta_answer_c'		=>$this->input->post('answerC'),
				'acta_answer_d'		=>$this->input->post('answerD'), 
				'acta_answer_mcq'	=>$this->input->post('answermcq')
				
			);
		}
		if($this->input->post('type') == "truefalse"){
			$data = array(
				'aque_id'		=> $this->input->post('soalan'),
				'acta_true'		=> "T",
				'acta_false'	=> "F",
				'acta_answer_tf'=> $this->input->post('answertf')				
			);
		}
		$this->db->insert("tb_activity_answer",$data);
	}
	function updateanswer(){
		if($this->input->post('type') == 1){
			$data = array(
				'acta_answer_a'		=>$this->input->post('answerA'),
				'acta_answer_b'		=>$this->input->post('answerB'),
				'acta_answer_c'		=>$this->input->post('answerC'),
				'acta_answer_d'		=>$this->input->post('answerD'), 
				'acta_answer_mcq'	=>$this->input->post('answermcq')
				
			);
		}
		if($this->input->post('type') == 2){
			$data = array(
				'acta_answer_tf'=> $this->input->post('answertf')				
			);
		}
		$this->db->where("acta_id",base64_decode($this->input->post('answerid')));
		$this->db->update("tb_activity_answer",$data);
	}
	function getAnswer(){
		$this->db->where("acta_id",base64_decode($this->uri->segment(3)));
		$this->db->join('tb_activity_question','tb_activity_question.aque_id = tb_activity_answer.aque_id');
		$this->db->from('tb_activity_answer');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->row();
	}
	function removeanswer(){
		$this->db->where("acta_id",base64_decode($this->uri->segment(3)));
		$this->db->delete("tb_activity_answer");
	}
}



?>