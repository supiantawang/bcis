<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
        $this->load->model('Profile_model','model');
    }
    function index()
	{
		$data['title'] = "Profile";
		$data['user'] = $this->model->getAdmin();
		$this->template->content->view('profile/edit',$data); 
		$this->template->publish();
	}
	function update(){
		$this->model->updateadmin();
		
		$this->session->set_flashdata('success_message','Your infomation has been updated.');
		redirect("profile");
	}
    function password(){
		$data['title'] = "Change Password";
		$this->template->content->view('profile/password',$data); 
		$this->template->publish();
	}
	function updatepassword(){
		$this->model->updatepassword();
		
		$this->session->set_flashdata('success_message','Your password has been updated.');
		redirect("profile/password");
	}
	function kir(){
		$this->template->content->view('profile/kir/listing'); 
		$this->template->publish();
	}
}

?>
