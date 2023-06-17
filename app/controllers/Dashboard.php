<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
       // $this->load->model('Backend','model');
    }   
    function index()
	{

		$data['title'] = "Dashboard";
		//$this->template->javascript->add("/assets/backend/plugins/chartjs/Chart.min.js");
		//$this->template->javascript->add("/assets/backend/dist/js/pages/dashboard2.js");       	  	   
		$this->template->content->view('dashboard/index',$data); 
		$this->template->publish();
		
	}
    function logout()
      {
      		$this->db->where('sessionID',get_cookie('_session'))
      					->update("ek_login",array('logstatus'=>'N'));

	        delete_cookie("_userID");
    		delete_cookie("_userName");
    		delete_cookie("_loginDateTime"); 
    		delete_cookie("_userFName");
            delete_cookie("_uGroup");
            delete_cookie("leftM");
    		redirect("");
      }
    
    
}

?>
