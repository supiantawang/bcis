<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Management extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
        $this->load->model('Management_model','model');
    }
    public function district()
	{
		if($this->uri->segment(3)=="add"){
			$data['institusi'] = $this->model->selectInstitusi();
			$this->template->content->view('management/district/add',$data); 
		}elseif($this->uri->segment(3)=="edit"){
			
			$jquery = "$(function () {
				
			});
			function deleteThisImage(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/management/remove/logo/'+ids;
				}
			}
			";
			$this->template->jquery= $jquery;
			$data['district'] = $this->model->getdistrict();
			$this->template->content->view('management/district/edit',$data); 
		}else{
			$jquery = "$(function () {
				$('#tblist').DataTable();
				
			});
			function deleteThis(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/management/remove/district/'+ids;
				}
			}
			";
			$data['title'] = "";
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('management/district/listing',$data); 
		}
		
		
		$this->template->publish();
		
	}
	public function posinfo()
	{
		if($this->uri->segment(3)=="add"){
			$data['lokasi'] = $this->model->selectlokasi();
			$this->template->content->view('management/pos/add',$data); 
		}elseif($this->uri->segment(3)=="edit"){
			$data['lokasi'] = $this->model->selectlokasi();
			$data['pos'] = $this->model->getpos();
			$this->template->content->view('management/pos/add',$data); 
		}else{
			$jquery = "$(function () {
				$('#tblist').DataTable();
				
			});
			function deleteThis(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/management/remove/pos/'+ids;
				}
			}
			";
			$data['title'] = "";
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('management/pos/listing',$data); 
		}
		
		$this->template->publish();
		
	}
	public function village()
	{
		$data['institusi'] = "";
		if($this->uri->segment(3)=="add"){
			$data['title'] = "test";
			$data['pos'] = $this->model->selectpos();
			
			$this->template->content->view('management/village/form',$data); 
		}elseif($this->uri->segment(3)=="edit"){
			$data['title'] = "";
			$data['pos'] = $this->model->selectpos();
			$data['village'] = $this->model->getVillage();
			$this->template->content->view('management/village/form',$data); 
		}elseif($this->uri->segment(3)=="view"){
			$data['title'] = "";
			$data['pos'] = $this->model->selectpos();
			$data['village'] = $this->model->getVillage();;
			$this->template->content->view('management/village/view',$data); 
		}elseif($this->uri->segment(3)=="listing"){
			$jquery = "$(function () {
				$('#tblist').DataTable({
				'pageLength': 25
				});
				
				
				
			});
			function deleteThis(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/management/remove/village/'+ids;
				}
			}
			";
			$data['title'] = "";
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('management/village/main/listing',$data);
		}else{
			$jquery = "$(function () {
				$('#tblist').DataTable({
				'pageLength': 25
				});
				
			});
			
			
			$('.village-view').click(function(){
					var id = this.getAttribute('data-id');
					window.location='".base_url()."index.php/management/village/view/'+id;
				});
			function deleteThis(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/management/remove/village/'+ids;
				}
			}
			";
			$data['title'] = "";
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('management/village/listing',$data); 
		}
		
		$this->template->publish();
		
	}
	public function ethnic(){
		$data['title'] = "";
		if($this->uri->segment(3)=="add"){
			//$data['institusi'] = $this->model->selectInstitusi();
			//$data['topic'] = $this->model->selectTopic();
			$this->template->content->view('management/ethnic/add',$data); 
			$this->template->publish();
		}elseif($this->uri->segment(3)=="view"){
			//$data['institusi'] = $this->model->selectInstitusi();

			$this->template->content->view('management/ethnic/view',$data); 
			
			
		}elseif($this->uri->segment(3)=="item"){
			$jquery = "$(function () {
				$('#tblist').DataTable({
				'pageLength': 25
				});
				
			});
			function deleteThis(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/management/remove/item/'+ids;
				}
			}
			";
			$data['title'] = "";
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;
			
			$data['institusi'] = $this->model->selectInstitusi();

			$this->template->content->view('management/ethnic/item/listing',$data); 
			$this->template->publish();
			
		}elseif($this->uri->segment(3)=="additem"){
			
			$this->template->publish();
			
		}elseif($this->uri->segment(3)=="edititem"){
			
			$this->template->publish();
			
		}elseif($this->uri->segment(3)=="edit"){
			$data['ethnic'] = $this->model->getEthnic();
			$this->template->content->view('management/ethnic/edit',$data); 
			$this->template->publish();
		}else{
			$jquery = "$(function () {
				$('#tblist').DataTable({
				'pageLength': 25
				});
				
			});
			function deleteThis(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/management/remove/ethnic/'+ids;
				}
			}
			";
			$data['title'] = "";
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('management/ethnic/listing',$data); 
			$this->template->publish();
		}
		
		
	}
	
	
	
	public function create(){
		if($this->uri->segment(3)=="pos"){
			$this->model->insertpos();
		
			$this->session->set_flashdata('success_message','Pos berjaya didaftarkan.');
			redirect("management/posinfo");
		}
		if($this->uri->segment(3)=="village"){
			
			
			$this->model->insertVillage();
		
			$this->session->set_flashdata('success_message','Maklumat kampung berjaya didaftarkan.');
			redirect("management/village");
		}
		if($this->uri->segment(3)=="ethnic"){
			$this->model->insertEthnic();
		
			$this->session->set_flashdata('success_message','Suku Kaum berjaya didaftarkan.');
			redirect("management/ethnic");
		}
		if($this->uri->segment(3)=="contribution"){
			$this->model->insertContribution();
		
			$this->session->set_flashdata('success_message','Agensi Sumbangan berjaya didaftarkan.');
			redirect("management/contribution");
		}
		if($this->uri->segment(3)=="district"){
			$this->model->insertdistrict();
		
			$this->session->set_flashdata('success_message','Daerah berjaya didaftarkan.');
			redirect("management/district");
		}
		if($this->uri->segment(3)=="organizer"){
			$this->model->insertorganizer();
		
			$this->session->set_flashdata('success_message','Agensi Penganjur berjaya didaftarkan.');
			redirect("management/organizer");
		}
		
		
	}
	public function update(){
		if($this->uri->segment(3)=="village"){
			$this->model->updatevillage();
		
			$this->session->set_flashdata('success_message','Maklumat kampung berjaya dikemaskini.');
			redirect("management/village");
		}
		if($this->uri->segment(3)=="district"){
			$path = "";
			//if($_FILES['dokumen']['name'] != "") $path = $this->uploadfile();
			$this->model->updateDistrict();
		
			$this->session->set_flashdata('success_message','Daerah berjaya dikemaskini.');
			redirect("management/district");
		}
		if($this->uri->segment(3)=="subinstitution"){
			$this->model->updateSubinstitution();
		
			$this->session->set_flashdata('success_message','Sub Institusi berjaya dikemaskini.');
			redirect("management/subinstitution");
		}
		if($this->uri->segment(3)=="maintopic"){
			//
			$path = "";
			if($_FILES['audio']['name'] != "") $path = $this->uploadaudio();
			$this->model->updateMainTopic($path);
		
			$this->session->set_flashdata('success_message','Topik utama berjaya dikemaskini.');
			redirect("management/topic/listing");
		}
		if($this->uri->segment(3)=="ethnic"){
			$this->model->updateEthnic();
		
			$this->session->set_flashdata('success_message','Data berjaya dikemaskini.');
			redirect("management/ethnic");
		}
		if($this->uri->segment(3)=="contribution"){
			$this->model->updateContribution();
		
			$this->session->set_flashdata('success_message','Data berjaya dikemaskini.');
			redirect("management/contribution");
		}
		if($this->uri->segment(3)=="pos"){
			$this->model->updatepos();
		
			$this->session->set_flashdata('success_message','Data berjaya dikemaskini.');
			redirect("management/posinfo");
		}
		if($this->uri->segment(3)=="organizer"){
			$this->model->updateorganizer();
		
			$this->session->set_flashdata('success_message','Data berjaya dikemaskini.');
			redirect("management/organizer");
		}


		
	}
	public function remove(){
		if($this->uri->segment(3)=="village"){
			$this->model->removevillage();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/village");
		}
		
		if($this->uri->segment(3)=="ethnic"){
			$this->model->removeethnic();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/ethnic");
		}
		if($this->uri->segment(3)=="pos"){
			$this->model->removepos();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/posinfo");
		}
		if($this->uri->segment(3)=="contribution"){
			$this->model->removeContribution();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/contribution");
		}
		if($this->uri->segment(3)=="district"){
			$this->model->removedistrict();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/district");
		}
		
		if($this->uri->segment(3)=="organizer"){
			$this->model->removeorganizer();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/organizer");
		}
		
		
		
		
		
		
		//old
		
		if($this->uri->segment(3)=="subinstitution"){
			$this->model->removeSubInstitution();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/subinstitution");
		}
		if($this->uri->segment(3)=="maintopic"){
			$this->model->removeMaintopic();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/topic/listing");
		}
		if($this->uri->segment(3)=="topic"){
			$this->model->removeTopic();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/topic");
		}
		if($this->uri->segment(3)=="audio"){
			$this->model->removeAudio();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/topic/editmaintopic/".$this->uri->segment(4));
		}
		if($this->uri->segment(3)=="logo"){
			$this->model->removeLogo();
			
			$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
			redirect("management/institusi/edit/".$this->uri->segment(4));
		}
		
		
	}
	public function createinstitution(){
		$path = "";
		if($_FILES['dokumen']['name'] != "") $path = $this->uploadfile();
		
		$this->model->insertinstitution($path);
		
		$this->session->set_flashdata('success_message','Institusi baru berjaya ditambah.');
		redirect("management/institusi");
	}
	
	
	
	
	public function updatefile(){
		$data['lesson'] = $this->model->getLesson();
		$data['topik'] = $this->model->selectTopik();
		$this->template->content->view('lesson/updatefile',$data); 
		$this->template->publish();
	}
	public function view(){
		$data['lesson'] = $this->model->getLesson();
		$this->template->content->view('lesson/view',$data); 
		$this->template->publish();
	}
	
	
	public function doupdatefile(){
		
		$filename = $this->uploadfile();
		$this->model->updateLessonFile($filename);
		
		$this->session->set_flashdata('success_message','File baru berjaya dikemaskini.');
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
    public function uploadaudio(){
		$config['upload_path'] = './assets/files/uploads';
		$config['allowed_types'] = 'mp3';
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		$msg = "";
		if( ! $this->upload->do_upload('audio')){
			echo $this->upload->display_errors();
			exit;
		}else{
			$data = $this->upload->data();
			$msg = 'assets/files/uploads/'.$data["file_name"];
		}
		return $msg;
	}
    public function contribution(){
		$data['title'] = "";
		if($this->uri->segment(3)=="add"){
			//$data['institusi'] = $this->model->selectInstitusi();
			//$data['topic'] = $this->model->selectTopic();
			$this->template->content->view('management/contribution/add',$data); 
			$this->template->publish();
		}elseif($this->uri->segment(3)=="view"){
			//$data['institusi'] = $this->model->selectInstitusi();

			$this->template->content->view('management/contribution/view',$data); 
			
			
		}elseif($this->uri->segment(3)=="edit"){
			$data['contribution'] = $this->model->getContribution();
			$this->template->content->view('management/contribution/edit',$data); 
			$this->template->publish();
		}else{
			$jquery = "$(function () {
				$('#tblist').DataTable({
				'pageLength': 25
				});
				
			});
			function deleteThis(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/management/remove/contribution/'+ids;
				}
			}
			";
			$data['title'] = "";
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('management/contribution/listing',$data); 
			$this->template->publish();
		}
	}
public function organizer(){
		if($this->uri->segment(3)=="add"){
			$data['kategori'] = $this->model->selectkategori();
			$this->template->content->view('management/organizer/add',$data); 
			$this->template->publish();
		}elseif($this->uri->segment(3)=="view"){
			$data['kategori'] = $this->model->selectkategori();

			$this->template->content->view('management/organizer/view',$data); 
			
			
		}elseif($this->uri->segment(3)=="edit"){
			$data['kategori'] = $this->model->selectkategori();
			$data['organizer'] = $this->model->getorganizer();
			$this->template->content->view('management/organizer/edit',$data); 
			$this->template->publish();
		}else{
			$jquery = "$(function () {
				$('#tblist').DataTable({
				'pageLength': 25
				});
				
			});
			function deleteThis(ids){
				if(confirm('Anda pasti untuk hapuskan data ini?')){
					window.location='".base_url()."index.php/management/remove/organizer/'+ids;
				}
			}
			";
			$data['title'] = "";
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('management/organizer/listing',$data); 
			$this->template->publish();
		}
	}


    
}

?>