<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesson_model extends CI_Model{
    
    function insertLesson($filename){
		$data = array(
				'tea_name'		=>$this->input->post('tajuk'),
				'topic_institution_id'=>$this->input->post('topik'),
				'tea_link'		=>$filename,
				'tea_order_sort'=>$this->input->post('susunan'),
				'tea_type'		=>$this->input->post('jenis'),
				'tea_category'	=>$this->input->post('kategori'),
				'tea_active'	=>1,
				'tea_min_completion_time'=>$this->input->post('masaselesai'),
				
			);
		$this->db->insert("tb_teaching",$data);
	}
	function selectTopik($ins_id=''){
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
	function getLesson(){
		$this->db->where("tea_id",base64_decode($this->uri->segment(3)));
		$this->db->from('tb_teaching');
		$query = $this->db->get();
		return $query->row();
	}
	function updateLesson(){
		$data = array(
				'tea_name'		=>$this->input->post('tajuk'),
				'topic_institution_id'=>$this->input->post('topik'),
				'tea_order_sort'=>$this->input->post('susunan'),
				'tea_type'		=>$this->input->post('jenis'),
				'tea_category'	=>$this->input->post('kategori'),
				'tea_active'	=>$this->input->post('status'),
				'tea_min_completion_time'=>$this->input->post('masaselesai'),
				
			);
		$this->db->where("tea_id",base64_decode($this->input->post('lessonid')));
		$this->db->update("tb_teaching",$data);
	}
	function updateLessonFile($filename){
		$link = $this->blapps_lib->getData("tea_link","tb_teaching","tea_id",base64_decode($this->input->post('lessonid')));
		if($link !="") unlink("./".$link);
		
		$data = array(
				'tea_link'		=>$filename,
				
			);
			
		$this->db->where("tea_id",base64_decode($this->input->post('lessonid')));
		$this->db->update("tb_teaching",$data);
		
	}
	function removeLesson(){
		$link = $this->blapps_lib->getData("tea_link","tb_teaching","tea_id",base64_decode($this->uri->segment(3)));
		if($link !="") unlink("./".$link);
		

		$this->db->where("tea_id",base64_decode($this->uri->segment(3)));
		$this->db->delete("tb_teaching");
		
	}
	
	
}



?>