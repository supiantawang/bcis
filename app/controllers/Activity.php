<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
        $this->load->model('Activity_model','model');
    }
    function index()
	{
		$jquery = "$(function () {
			$('#tblist').DataTable();
			
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/activity/remove/'+ids;
			}
		}
		";
		$data['title'] = "";
		$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
		$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
		$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
		$this->template->jquery= $jquery;		
		$this->template->content->view('activity/listing',$data); 
		$this->template->publish();
		
	}
	public function add(){
		$jquery = "$(function () {
			$('#institusi').change(function(){
				$.ajax({
					url:'".base_url()."index.php/activity/getDropdownTopik/'+this.value,
					success: function(data){
						$('#div-topik').html(data)
					}
				})
			});
			
		});
		";
		$this->template->jquery= $jquery;
		$data['title'] = "";
		//$data['topic'] = $this->model->selectTopic();
		$data['institusi'] = $this->model->selectInstitusi();
		$this->template->content->view('activity/add',$data); 
		$this->template->publish();
	}
	public function getDropdownTopik($ins_id){
		$topik = $this->model->selectTopic($ins_id);
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
		$activity = $this->model->getActivity();
		$ins_id = $this->blapps_lib->getData("ins_id","tb_topic_institution","topic_institution_id",$activity->topic_id);
		
		$data['institusi'] = $this->model->selectInstitusi();
		$data['topic'] = $this->model->selectTopic($ins_id);
		$data['act'] = $activity;
		$data['ins_id'] = $ins_id;
		$this->template->content->view('activity/edit',$data); 
		$this->template->publish();
	}
	
	public function create(){
		
		$this->model->insertActivity();
		
		$this->session->set_flashdata('success_message','Aktiviti baru berjaya ditambah.');
		redirect("activity");
	}
	public function update(){
		
		$this->model->updateActivity();
		
		$this->session->set_flashdata('success_message','Aktiviti berjaya dikemaskini.');
		redirect("activity");
	}
	
	public function remove(){
		
		$this->model->removeExercise();
		
		$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
		redirect("activity");
	}
	//=====================[QUESTION]==============================
    public function question(){
		$jquery = "$(function () {
			$('#tblist').DataTable();
			
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/activity/removequestion/'+ids;
			}
		}
		";
		$data['title'] = "";
		$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
		$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
		$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
		$this->template->jquery= $jquery;		
		$this->template->content->view('activity/question/listing',$data); 
		$this->template->publish();
	}
	public function addquestion(){
		$jquery = "$(function () {
			CKEDITOR.replace('editor1');
		});
		";
		$this->template->javascript->add("/assets/backend/plugins/ckeditor/ckeditor.js"); 
		$data['aktiviti'] = $this->model->selectAktiviti();
		
		$this->template->jquery= $jquery;
		$this->template->content->view('activity/question/add',$data); 
		$this->template->publish();
	}
	public function createquestion(){
		$path = "";
		if($_FILES['dokumen']['name'] != "") $path = $this->uploadFile();
		
		$this->model->insertQuestion($path);
		$this->session->set_flashdata('success_message','Soalan baru berjaya ditambah.');
		redirect("activity/question");
	}
	public function editquestion(){
		$jquery = "$(function () {
			CKEDITOR.replace('editor1');
		});
		function deleteThisImage(id){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/activity/removeimgquestion/'+id;
			}
		}
		";
		$this->template->javascript->add("/assets/backend/plugins/ckeditor/ckeditor.js"); 
		$data['aktiviti'] = $this->model->selectAktiviti();
		$data['que'] = $this->model->getQuestion();
		
		$this->template->jquery= $jquery;
		$this->template->content->view('activity/question/edit',$data); 
		$this->template->publish();
	}
	public function updatequestion(){
		$path = "";
		if($_FILES['dokumen']['name'] != "") $path = $this->uploadFile();
		$this->model->updateQuestion($path);
		
		$this->session->set_flashdata('success_message','Soalan aktiviti berjaya dikemaskini.');
		redirect("activity/question");
	}
	public function removequestion(){
		$this->model->removequestion();
		
		$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
		redirect("activity/question");
	}
	public function removeimgquestion($id){
		$this->model->removeimgquestion();
		
		$this->session->set_flashdata('success_message','Imej berjaya dihapuskan.');
		redirect("activity/editquestion/".$id);
	}
	//=====================[ANSWER]==============================
	public function answer(){
		$jquery = "$(function () {
			$('#tblist').DataTable();
			
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/activity/removeanswer/'+ids;
			}
		}
		";
		$data['title'] = "";
		$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
		$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
		$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
		$this->template->jquery= $jquery;		
		$this->template->content->view('activity/answer/listing',$data); 
		$this->template->publish();
	}
	public function addanswer(){
		$jquery = "$(function () {
			CKEDITOR.replace('editor1');
			CKEDITOR.replace('editor2');
			CKEDITOR.replace('editor3');
			CKEDITOR.replace('editor4');
			$('.mcq').hide();
			$('.truefalse').hide();
			$('#soalan').change(function(){
				$.ajax({
					url:'".base_url()."index.php/activity/getquestiontype/'+this.value,
					success:function(data){
						$('#type').val('');
						if(data == 1){
							$('.mcq').show();
							$('#type').val('mcq');
							$('.truefalse').hide();
							$('#answertf').val('');
						}else{
							$('.truefalse').show();
							$('#type').val('truefalse');
							$('.mcq').hide();
							$('#editor1').val('');
							$('#editor2').val('');
							$('#editor3').val('');
							$('#editor4').val('');
							$('#answermcq').val('');
						}
					}
				});
			});
		});
		";
		$this->template->javascript->add("/assets/backend/plugins/ckeditor/ckeditor.js"); 
		$data['question'] = $this->model->selectQuestion();
		
		$this->template->jquery= $jquery;
		$this->template->content->view('activity/answer/add',$data); 
		$this->template->publish();
	}
	public function editanswer(){
		$jquery = "$(function () {
			CKEDITOR.replace('editor1');
			CKEDITOR.replace('editor2');
			CKEDITOR.replace('editor3');
			CKEDITOR.replace('editor4');
			
		});
		";
		$this->template->javascript->add("/assets/backend/plugins/ckeditor/ckeditor.js"); 
		$data['question'] = $this->model->selectQuestion();
		$data['ans'] = $this->model->getAnswer();
		
		$this->template->jquery= $jquery;
		$this->template->content->view('activity/answer/edit',$data); 
		$this->template->publish();
	}
	public function getquestiontype($id){
		$type = $this->blapps_lib->getData("aque_type","tb_activity_question","aque_id",$id);		
		echo $type;
	}
	public function createanswer(){
		$this->model->insertAnswer();
		
		$this->session->set_flashdata('success_message','Jawapan baru berjaya ditambah.');
		redirect("activity/answer");
	}
	public function removeanswer(){
		$this->model->removeanswer();
		
		$this->session->set_flashdata('success_message','Jawapan berjaya dihapuskan.');
		redirect("activity/answer");
	}
	public function updateanswer(){
		$this->model->updateanswer();
		
		$this->session->set_flashdata('success_message','Jawapan berjaya dikemaskini.');
		redirect("activity/answer");
	}
	
	
	function uploadFile(){
		$config['upload_path'] = './assets/files/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|mp4|pdf|docs|doc';
		$config['encrypt_name'] = TRUE;
		
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