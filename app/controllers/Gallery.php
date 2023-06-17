<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
        $this->load->model('Backend','model');
    }
    function index()
	{
		$jquery = "$(function () {
			
		";
		$data['title'] = "";
		$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
		$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
		$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
		$this->template->jquery= $jquery;		
		$this->template->content->view('Gallery/listing',$data); 
		$this->template->publish();
		
	}
	
    
}

?>