<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
        $this->load->model('User_model','model');
    }
    function index()
	{
		$jquery = "$(function () {
			$('#tblist').DataTable();
			
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/user/remove/'+ids;
			}
		}
		";
		$data['title'] = "Users";
		$this->template->stylesheet->add("/assets/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css");
		$this->template->stylesheet->add("/assets/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css");
		$this->template->stylesheet->add("/assets/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css");

		$this->template->javascript->add("/assets/v3/plugins/datatables/jquery.dataTables.min.js"); 
		$this->template->javascript->add("/assets/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"); 
		$this->template->javascript->add("/assets/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"); 
		$this->template->javascript->add("/assets/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"); 
		$this->template->javascript->add("/assets/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js"); 
		$this->template->javascript->add("/assets/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"); 
		$this->template->javascript->add("/assets/v3/plugins/jszip/jszip.min.js"); 
		$this->template->javascript->add("/assets/v3/plugins/pdfmake/pdfmake.min.js"); 
		$this->template->javascript->add("/assets/v3/plugins/pdfmake/vfs_fonts.js"); 
		$this->template->javascript->add("/assets/v3/plugins/datatables-buttons/js/buttons.html5.min.js"); 
		$this->template->javascript->add("/assets/v3/plugins/datatables-buttons/js/buttons.print.min.js"); 
		$this->template->javascript->add("/assets/v3/plugins/datatables-buttons/js/buttons.colVis.min.js"); 

		$this->template->jquery= $jquery;		
		$this->template->content->view('user/listing',$data); 
		$this->template->publish();
		
	}
	public function add(){
		$data['role'] = $this->model->selectrole();
		$data['institution'] = $this->model->selectinstitution();
		$this->template->content->view('user/add',$data); 
		$this->template->publish();
	}
	public function edit(){
		$data['role'] = $this->model->selectrole();
		$data['institution'] = $this->model->selectinstitution();
		$data['user'] = $this->model->getUser();
		$this->template->content->view('user/edit',$data); 
		$this->template->publish();
	}
	
	public function create(){
		
		$this->model->insertUser();
		
		$this->session->set_flashdata('success_message','Pengguna baru berjaya ditambah.');
		redirect("user");
	}
	public function update(){
		
		$this->model->updateUser();
		
		$this->session->set_flashdata('success_message','Pengguna berjaya dikemaskini.');
		redirect("user");
	}
	
	public function remove(){
		
		$this->model->removeUser();
		
		$this->session->set_flashdata('success_message','Data berjaya dihapuskan.');
		redirect("user");
	}
    
}

?>
