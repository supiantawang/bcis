<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
        $this->load->model('Program_model','model');
    }
    function agency()
	{
		$jquery = "$(function () {
			$('#tblist').DataTable();
			
			$('#tambah').click(function(){
				window.location='".base_url()."index.php/program/agency/add';
			});
			
			$('.program-edit').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/program/agency/add/'+id;
			});
			$('.program-view').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/program/agency/view/'+id;
			});
			$('.program-delete').click(function(){
				// if(confirm('Anda Pasti Untuk Hapus?')){
				// 	var id = this.getAttribute('data-id');
				// 	window.location='".base_url()."index.php/program/deletedata/agency/'+id;
				// }else{
				// 	return false;
				// }

				var id = this.getAttribute('data-id');
				$.ajax({
					url:'".base_url()."index.php/program/cekowner/'+id,
					success: function(data){
						if(data == 'owner'){
							if(confirm('Anda Pasti Untuk Hapus?')){
					
								window.location='".base_url()."index.php/program/deletedata/agency/'+id;
							}else{
								return false;
							}
						}else{
							alert('Data boleh dihapuskan oleh pengguna yang mencipta data ini sahaja.')
							return false;
						}
					}
				})
			});
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/program/remove/'+ids;
			}
		}
		";
		if($this->uri->segment(3)=="add"){
			$data['village'] = $this->model->selectvillage();
			$data['agency'] = $this->model->selectagency();
			$data['category'] = $this->model->selectcategory();
			$data['categoryprogram'] = $this->model->selectcategoryprogram();
			$data['jenis'] = $this->model->selecttype();
			
			if($this->uri->segment(4)){
				$data['program'] = $this->model->getprogram($this->uri->segment(4));
			}
			$jquery1 = "$(function () {
				$('.datepicker').datepicker({
					autoclose: true,
					format: 'yyyy-mm-dd'
				});
			});";
			$this->template->stylesheet->add("/assets/backend/plugins/datepicker/datepicker3.css");
			$this->template->javascript->add("/assets/backend/plugins/datepicker/bootstrap-datepicker.js");
			
			$this->template->jquery= $jquery1;
			$this->template->content->view('program/form',$data); 
		}elseif($this->uri->segment(3)=="view"){
			
			$data['agency'] = $this->model->selectagency();
			$data['category'] = $this->model->selectcategory();
			$data['jenis'] = $this->model->selecttype();
			
			if($this->uri->segment(4)){
				$data['program'] = $this->model->getprogram($this->uri->segment(4));
				$data['agensi'] = $this->model->getagensi($data['program']->program_agency);
			}
			
			$this->template->content->view('program/view',$data); 
		}else{
		
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('program/listing');
		
		}
		$this->template->publish();
		
	}
	function required()
	{
		$jquery = "$(function () {
			$('#tblist').DataTable();
			
			$('#tambah').click(function(){
				window.location='".base_url()."index.php/program/required/add';
			});
			
			$('.program-edit').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/program/required/add/'+id;
			});
			$('.program-view').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/program/required/view/'+id;
			});
			$('.program-delete').click(function(){
				// if(confirm('Anda Pasti Untuk Hapus?')){
				// 	var id = this.getAttribute('data-id');
				// 	window.location='".base_url()."index.php/program/deletedata/required/'+id;
				// }else{
				// 	return false;
				// }

				var id = this.getAttribute('data-id');
				$.ajax({
					url:'".base_url()."index.php/program/cekowner/'+id,
					success: function(data){
						if(data == 'owner'){
							if(confirm('Anda Pasti Untuk Hapus?')){
					
								window.location='".base_url()."index.php/program/deletedata/required/'+id;
							}else{
								return false;
							}
						}else{
							alert('Data boleh dihapuskan oleh pengguna yang mencipta data ini sahaja.')
							return false;
						}
					}
				})
			});
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/program/remove/'+ids;
			}
		}
		";
		if($this->uri->segment(3)=="add"){
			$data['village'] = $this->model->selectvillage();
			$data['agency'] = $this->model->selectagency();
			$data['categoryprogram'] = $this->model->selectcategoryprogram();
			$data['jenis'] = $this->model->selecttype();
			

			$jquery1 = "$(function () {
				$('.datepicker').datepicker({
					autoclose: true,
					format: 'yyyy-mm-dd'
				});
			});";
			
			if($this->uri->segment(4)){
				$data['program'] = $this->model->getprogram($this->uri->segment(4));
			}
			$this->template->stylesheet->add("/assets/backend/plugins/datepicker/datepicker3.css");
			$this->template->javascript->add("/assets/backend/plugins/datepicker/bootstrap-datepicker.js");
			
			$this->template->jquery= $jquery1;
			$this->template->content->view('program/required/form',$data); 
		}elseif($this->uri->segment(3)=="view"){
			
			$data['agency'] = $this->model->selectagency();
			$data['category'] = $this->model->selectcategory();
			$data['jenis'] = $this->model->selecttype();
			
			if($this->uri->segment(4)){
				$data['program'] = $this->model->getprogram($this->uri->segment(4));
				$data['agensi'] = $this->model->getagensi($data['program']->program_agency);
			}
			
			$this->template->content->view('program/required/view',$data); 
		}else{
		
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('program/required/listing');
		
		}
		$this->template->publish();
		
	}
	
	function deletedata(){
		if($this->uri->segment(3)=="agency"){
			
			$this->model->deleteagency();
			$this->session->set_flashdata('success_message','Program berjaya dihapuskan.');
			redirect("program/agency");
			
		}
		if($this->uri->segment(3)=="required"){
			
			$this->model->deleteagency();
			$this->session->set_flashdata('success_message','Program berjaya dihapuskan.');
			redirect("program/required");
			
		}
		
		
	}
	
	public function create(){
		
		if($this->uri->segment(3)=="agency"){
			$this->model->insertagency();
		
			$this->session->set_flashdata('success_message','Program berjaya didaftarkan.');
			redirect("program/agency");
		}
		if($this->uri->segment(3)=="required"){
			$this->model->insertrequired();
		
			$this->session->set_flashdata('success_message','Program berjaya didaftarkan.');
			redirect("program/required");
		}
		
		
	}
    function update(){
		if($this->uri->segment(3) == "agency"){
			$this->model->updateagency();
		
			$this->session->set_flashdata('success_message','Program berjaya dikemaskini.');
			redirect("program/agency");
		}elseif($this->uri->segment(3) == "required"){
			$this->model->updateagency();
		
			$this->session->set_flashdata('success_message','Program diperlukan berjaya dikemaskini.');
			redirect("program/required");
		}else{
			/* $this->model->updatestudent();
		
			$this->session->set_flashdata('success_message','Peserta berjaya disahkan.');
			redirect("student"); */
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
	public function cekowner($id){

		$createdby = $this->blapps_lib->getData("program_createdby","pro_program","program_id",base64_decode($id));
		
		

		if(get_cookie("_urole") != 1 && get_cookie("_userID") != $createdby){
			echo "xowner";
		}else{
			echo "owner";
		}
	}
}

?>