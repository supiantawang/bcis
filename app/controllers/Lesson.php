<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesson extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
        $this->load->model('Lesson_model','model');
    }
    function index()
	{
		$jquery = "$(function () {
			$('#tblist').DataTable();
			
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/lesson/remove/'+ids;
			}
		}
		";
		$data['title'] = "Mapping";
		$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
		$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
		$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
		$this->template->jquery= $jquery;		
		$this->template->content->view('lesson/listing',$data); 
		$this->template->publish();
		
	}
	public function add(){
		$jquery = "$(function () {
			$('#institusi').change(function(){
				$.ajax({
					url:'".base_url()."index.php/lesson/getDropdownTopik/'+this.value,
					success: function(data){
						$('#div-topik').html(data)
					}
				})
			});
			
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/lesson/remove/'+ids;
			}
		}
		";
		$this->template->jquery= $jquery;
		//$data['topik'] = $this->model->selectTopik();
		$data['institusi'] = $this->model->selectInstitusi();
		$this->template->content->view('lesson/add',$data); 
		$this->template->publish();
	}
	public function getDropdownTopik($ins_id){
		$topik = $this->model->selectTopik($ins_id);
		echo form_dropdown("topik",$topik,"","class='form-control' required");
	}
	public function edit(){
		$jquery = "$(function () {
			$('#institusi').change(function(){
				$.ajax({
					url:'".base_url()."index.php/lesson/getDropdownTopik/'+this.value,
					success: function(data){
						$('#div-topik').html(data)
					}
				})
			});
			
		});
		
		";
		$this->template->jquery= $jquery;
		$lesson = $this->model->getLesson();
		$ins_id = $this->blapps_lib->getData("ins_id","tb_topic_institution","topic_institution_id",$lesson->topic_institution_id);
		
		$data['lesson'] = $lesson;
		$data['topik'] = $this->model->selectTopik($ins_id);
		$data['institusi'] = $this->model->selectInstitusi();
		$data['ins_id'] = $ins_id;
		$this->template->content->view('lesson/edit',$data); 
		$this->template->publish();
	}
	public function updatefile(){
		$lesson = $this->model->getLesson();
		$ins_id = $this->blapps_lib->getData("ins_id","tb_topic_institution","topic_institution_id",$lesson->topic_institution_id);
		$data['lesson'] = $lesson;
		$data['topik'] = $this->model->selectTopik($ins_id);
		$data['institusi'] = $this->model->selectInstitusi();
		$data['ins_id'] = $ins_id;
		$this->template->content->view('lesson/updatefile',$data); 
		$this->template->publish();
	}
	public function view(){
		$data['lesson'] = $this->model->getLesson();
		$this->template->content->view('lesson/view',$data); 
		$this->template->publish();
	}
	
	public function create(){
		if($this->input->post("link") == "")
			$filename = $this->uploadfile();
		else
			$filename = $this->input->post("link");
		
		$this->model->insertLesson($filename);
		
		$this->session->set_flashdata('success_message','Pelajaran baru berjaya ditambah.');
		redirect("lesson");
	}
	public function update(){
		
		$this->model->updateLesson();
		
		$this->session->set_flashdata('success_message','Pelajaran berjaya dikemaskini.');
		redirect("lesson");
	}
	public function doupdatefile(){
		
		if($this->input->post("link") == "")
			$filename = $this->uploadfile();
		else
			$filename = $this->input->post("link");
		$this->model->updateLessonFile($filename);
		
		$this->session->set_flashdata('success_message','File baru berjaya dikemaskini.');
		redirect("lesson");
	}
	public function remove(){
		
		$this->model->removeLesson();
		
		$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
		redirect("lesson");
	}
	
	public function uploadfile(){
		$config['upload_path'] = './assets/files/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|mp4|pdf|docs|doc';
		$config['encrypt_name'] = TRUE;
		//$config['max_size'] = '20000';
		
		$this->load->library('upload', $config);
		
		$msg = "";
		if( ! $this->upload->do_upload('dokumen')){
			echo $this->upload->display_errors();
			exit;
		}else{
			$data = $this->upload->data();
			$msg = 'assets/files/'.$data["file_name"];
		}
		return $msg;
	}
    
    
}

?>
