<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Backend','model');
	}
	public function index()
	{
		if(get_cookie('_userID')!="" && get_cookie('_userName')!="" && get_cookie('_session')!="")
		{
			if($this->model->checkSessionActive()=="1")
				redirect("dashboard");
			else
				redirect("");
		}
		
		if($this->input->post('l_uname')!="")
		{
			$log = $this->model->getAuthenticate();

			if($log==1)
            	redirect("dashboard");
            else
            {
            	$this->session->set_flashdata('error_message',$log);
            	redirect("");
            }
                    		
		}
		else
		{
			$this->model->visitor();
		}
		$this->template->content->view('login');
        $this->template->set_template("themes/AdminLTE3/login");
        $this->template->publish();
	}
}
