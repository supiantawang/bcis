<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
        $this->load->model('Student_model','model');
    }
    function index()
	{
		$jquery = "$(function () {
			$('#tblist').DataTable();
			
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/exercise/remove/'+ids;
			}
		}
		";
		$data['title'] = "";
		$institusi = $this->blapps_lib->getData("u_location","ek_admin","u_id",get_cookie("_userID"));
		$limit = $this->model->getlimit();
		
		$session = "0";
		$valuesequence = "0";
		
		$this->db->select_max("u_session");
		$maxvalue = $this->blapps_lib->getData("u_session","tb_users","u_course_place",$institusi);
		
		$countSession = $this->blapps_lib->getDataCount("tb_users",array(array("u_session",$maxvalue)));
		
		$session = $maxvalue;
		if($countSession >= $limit || $maxvalue == 0){
			$session = $session + 1;
		}
		
		$this->db->select_max("u_session_sequence");
		$this->db->where("u_session", $session);
		$maxvaluesequence = $this->blapps_lib->getData("u_session_sequence","tb_users","u_course_place",$institusi);
		
		$valuesequence = $maxvaluesequence + 1 ;
		
		if($maxvaluesequence >= $limit)
			$valuesequence = 1;
		
		$data['tempatkursus'] = $this->model->gettempatkursus($institusi);
		$data['institusi'] = $institusi;
		$data['user'] = $this->model->getUser($this->uri->segment(3));
		$data['session'] = $session;
		$data['xsequence'] = $valuesequence."/".$limit;
		$data['sequence'] = $valuesequence;
		$data['interviewer'] = $this->model->selectInterviewer();
		$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
		$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
		$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
		$this->template->jquery= $jquery;		
		$this->template->content->view('student/edit',$data); 
		$this->template->publish();
		
	}
	public function edit(){
		$institusi = $this->blapps_lib->getData("u_location","ek_admin","u_id",get_cookie("_userID"));
		$limit = $this->model->getlimit();
		
		$session = "0";
		$valuesequence = "0";
		
		$this->db->select_max("u_session");
		$maxvalue = $this->blapps_lib->getData("u_session","tb_users","u_course_place",$institusi);
		
		$countSession = $this->blapps_lib->getDataCount("tb_users",array(array("u_session",$maxvalue)));
		
		$session = $maxvalue;
		if($countSession >= $limit || $maxvalue == 0){
			$session = $session + 1;
		}
		
		$this->db->select_max("u_session_sequence");
		$this->db->where("u_session", $session);
		$maxvaluesequence = $this->blapps_lib->getData("u_session_sequence","tb_users","u_course_place",$institusi);
		
		$valuesequence = $maxvaluesequence + 1 ;
		
		if($maxvaluesequence >= $limit)
			$valuesequence = 1;
		
		$data['tempatkursus'] = $this->model->gettempatkursus($institusi);
		$data['institusi'] = $institusi;
		$data['user'] = $this->model->getUser($this->uri->segment(3));
		$data['session'] = $session;
		$data['xsequence'] = $valuesequence."/".$limit;
		$data['sequence'] = $valuesequence;
		$data['interviewer'] = $this->model->selectInterviewer();
		$this->template->content->view('student/edit',$data); 
		$this->template->publish();
	}
	public function create(){
		$this->model->createprofile();
		
			$this->session->set_flashdata('success_message','Peserta berjaya dikemaskini.');
			redirect("student/check");
	}
    function update(){
		if($this->uri->segment(3) == "status"){
			$this->model->updatestudentstatus();
		
			$this->session->set_flashdata('success_message','Peserta berjaya dikemaskini.');
			redirect("student/check");
		}else{
			$this->model->updatestudent();
		
			$this->session->set_flashdata('success_message','Peserta berjaya disahkan.');
			redirect("student");
		}
		
	}
	public function check(){
		
		if($this->uri->segment(3)== "view"){
			$data['interviewer'] = $this->model->selectInterviewer();
			$data['user'] = $this->model->getUser($this->uri->segment(4));
			$this->template->content->view('student/check/view',$data); 
			$this->template->publish();
		}else{
			$data['sequence'] = "";
			$jquery = "$(function () {
				$('#tblist').DataTable();
				
			});
			function deleteThis(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/exercise/remove/'+ids;
				}
			}
			";
			$data['title'] = "";
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;
			$this->template->content->view('student/check/listing',$data); 
			$this->template->publish();
		}
		
	}
	public function finish(){
		
		if($this->uri->segment(3)== "view"){
			$data['interviewer'] = $this->model->selectInterviewer();
			$data['user'] = $this->model->getUser($this->uri->segment(4));
			$data['video'] = $this->model->getVideo($this->uri->segment(4));
			$this->template->content->view('student/finish/view',$data); 
			$this->template->publish();
		}else{
			$data['sequence'] = "";
			$jquery = "$(function () {
				$('#tblist').DataTable();
				
			});
			function deleteThis(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/exercise/remove/'+ids;
				}
			}
			";
			$data['title'] = "";
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;
			$this->template->content->view('student/finish/listing',$data); 
			$this->template->publish();
		}
		
	}
	
}

?>