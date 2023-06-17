<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cert extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        $this->load->model('Cert_model','model');
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
		$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
		$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
		$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
		$this->template->jquery= $jquery;		
		$this->template->content->view('interview/listing',$data); 
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
		$this->template->content->view('interview/edit',$data); 
		$this->template->publish();
	}
	public function view(){
		
	}
    function update(){
		if($this->uri->segment(3) == "status"){
			$path = "";
			if($this->input->post("penilaian") == 1){
				//generate cert pdf
				$path = $this->generatecert($this->input->post('userid'));
			}
			/* echo $path;
		exit; */	
			$this->model->updatestudentstatus($path);
		
			$this->session->set_flashdata('success_message','Peserta berjaya dikemaskini.');
			redirect("interview/participant");
		}else{
			$this->model->updatestudent();
		
			$this->session->set_flashdata('success_message','Peserta berjaya disahkan.');
			redirect("interview");
		}
		
	}
	public function participant(){
		
		if($this->uri->segment(3)== "view"){
			$data['interviewer'] = $this->model->selectInterviewer();
			$data['user'] = $this->model->getUser($this->uri->segment(4));
			$data['video'] = $this->model->getVideo($this->uri->segment(4));
			$this->template->content->view('interview/check/view',$data); 
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
			$this->template->content->view('interview/check/listing',$data); 
			$this->template->publish();
		}
		
	}
	public function generate($u_id){
		$path = "assets/certificate/cert_".date("YmdHis").".pdf";
		$user = $this->model->getUser($u_id);
		//echo $this->db->last_query();exit;
		
		$this->db->join("ek_subinstitution","ek_subinstitution.sub_id = tb_users.u_course_place");
		$this->db->join("ek_institution","ek_institution.ins_id = ek_subinstitution.id_institution");
		$insid = $this->blapps_lib->getData("ins_id","tb_users","u_id",$u_id);
		//echo $this->db->last_query();exit;
		$this->db->where("cert_active",1);
		$certid = $this->blapps_lib->getData("cert_id","tb_cert_tpl","ins_id",$insid);
		
		$certpath = $this->blapps_lib->getData("settting_value","tb_setting_rules","settting_name","cert_url");
		
		$this->model->updatestudentcert($u_id,$path);
		$data['certid'] = $certid;
		$data['filepath'] = $path;
		$data['certpath'] = $certpath;
		$data['nama'] = $user->u_full_name;
		$data['noic'] = $user->u_ic_number;
		$data['tarikh'] = date("d/m/Y");
		$this->load->view("cert/certpdf",$data);
		
		echo "Sijil Berjaya Dijana";
	}
}

?>