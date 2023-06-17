<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
        $this->load->model('Report_model','model');
    }
    function index()
	{
		
		
	}
	public function participant(){
		if( $this->uri->segment(3) == "view"){
			$data['kir'] = $this->model->getKIR($this->uri->segment(4));
			$this->template->content->view('report/viewparticipant',$data); 
		}else{
			$jquery = "$(function () {
				$('.datepicker').datepicker({
				  autoclose: true,
				  format: 'yyyy-mm-dd'
				});
				$('#search').click(function(){
					var sukukaum = $('#sukukaum').val();
					var agama = $('#agama').val();
					//var edate = $('#edate').val();
					//var statusradio = $('input[name=\"statusradio\"]:checked').val();
					
					window.location='".base_url()."index.php/report/participant/'+sukukaum+'/'+agama;
					
					
				})
				$('#reset').click(function(){
					window.location='".base_url()."index.php/report/participant';
				});
				$('#cetak').click(function(){
					var sukukaum = $('#sukukaum').val();
					var agama = $('#agama').val();
					window.location='".base_url()."index.php/report/printpdf/'+sukukaum+'/'+agama;
				});
			});
			
			";
			$this->template->jquery= $jquery;
			$this->template->stylesheet->add("/assets/backend/plugins/datepicker/datepicker3.css");
			$this->template->javascript->add("/assets/backend/plugins/datepicker/bootstrap-datepicker.js"); 
			$data['sukukaum'] = $this->model->selectSukukaum();
			$this->template->content->view('report/listing',$data); 
		}
		
		$this->template->publish();
	}
	
	public function program(){		
		
		$jquery = "$(function () {
			$('.datepicker').datepicker({
			  autoclose: true,
			  format: 'yyyy-mm-dd'
			});
			$('#search').click(function(){
				var kampung = $('#kampung').val();
				var agama = $('#agama').val();
				var programtype = $('#programtype').val();
				var pencapaian = $('#pencapaian').val();
				var sdate = $('#sdate').val();
				var edate = $('#edate').val();
				var pilihan = $(\"input[name='pilihan']:checked\").val();
				
				window.location='".base_url()."index.php/report/program/'+pilihan+'/'+kampung+'/'+programtype+'/'+pencapaian+'/'+sdate+'/'+edate;
				
				
			});
			$('#reset').click(function(){
				window.location='".base_url()."index.php/report/program';
			});
			$('#cetak').click(function(){
				var pilihan = $(\"input[name='pilihan']:checked\").val();
				var kampung = $('#kampung').val();
				var programtype = $('#programtype').val();
				var pencapaian = $('#pencapaian').val();
				var sdate = $('#sdate').val();
				var edate = $('#edate').val();
				window.location='".base_url()."index.php/report/printprogram/'+pilihan+'/'+kampung+'/'+programtype+'/'+pencapaian+'/'+sdate+'/'+edate;
			});
			$('.select2').select2();
		});
		
		";
		$this->template->jquery= $jquery;
		$this->template->stylesheet->add("/assets/backend/plugins/select2/select2.min.css");
		$this->template->javascript->add("/assets/backend/plugins/select2/select2.full.min.js");
		$this->template->stylesheet->add("/assets/backend/plugins/datepicker/datepicker3.css");
		$this->template->javascript->add("/assets/backend/plugins/datepicker/bootstrap-datepicker.js"); 
		$data['kampung'] = $this->model->selectkampung();
		$data['programtype'] = $this->model->selectprogramtype();
		$this->template->content->view('report/program/listing',$data); 
		$this->template->publish();
	}
	public function islamization (){		
		
		$jquery = "$(function () {
			$('.datepicker').datepicker({
			  autoclose: true,
			  format: 'yyyy-mm-dd'
			});
			$('#search').click(function(){
				var daerah = $('#daerah').val();
				var pos = $('#pos').val();
				var kampung = $('#kampung').val();
				var bulan = $('#bulan').val();
				var tahun = $('#tahun').val();
				
				
				window.location='".base_url()."index.php/report/islamization/'+daerah+'/'+pos+'/'+kampung+'/'+bulan+'/'+tahun;
				
				
			});
			$('#reset').click(function(){
				window.location='".base_url()."index.php/report/islamization';
			});
			$('#cetak').click(function(){
				var daerah = $('#daerah').val();
				var pos = $('#pos').val();
				var kampung = $('#kampung').val();
				var bulan = $('#bulan').val();
				var tahun = $('#tahun').val();
				
				window.location='".base_url()."index.php/report/printislamization/'+daerah+'/'+pos+'/'+kampung+'/'+bulan+'/'+tahun;
			});
			$('.select2').select2();
		});
		
		";
		$this->template->jquery= $jquery;
		$this->template->stylesheet->add("/assets/backend/plugins/select2/select2.min.css");
		$this->template->javascript->add("/assets/backend/plugins/select2/select2.full.min.js");
		$this->template->stylesheet->add("/assets/backend/plugins/datepicker/datepicker3.css");
		$this->template->javascript->add("/assets/backend/plugins/datepicker/bootstrap-datepicker.js"); 
		$data['bulan'] = array(
			'semua'=>'- Semua - ',
			'01'=>'JANUARI',
			'02'=>'FEBRUARI',
			'03'=>'MAC',
			'04'=>'APRIL',
			'05'=>'MEI',
			'06'=>'JUN',
			'07'=>'JULAI',
			'08'=>'OGOS',
			'09'=>'SEPTEMBER',
			'10'=>'OKTOBER',
			'11'=>'NOVEMBER',
			'12'=>'DISEMBER'
		);
		$data['programtype'] = $this->model->selectprogramtype();
		$data['daerah'] = $this->model->selectdaerah();
		$data['pos'] = $this->model->selectpos();
		$data['kampung'] = $this->model->selectkampung();
		$this->template->content->view('report/islamization/listing',$data); 
		$this->template->publish();
	}
	public function contribution (){		
		
		$jquery = "$(function () {
			$('.datepicker').datepicker({
			  autoclose: true,
			  format: 'yyyy-mm-dd'
			});
			$('#search').click(function(){
				var daerah = $('#daerah').val();
				var pos = $('#pos').val();
				var kampung = $('#kampung').val();
				
				window.location='".base_url()."index.php/report/contribution/'+daerah+'/'+pos+'/'+kampung;
				
				
			});
			$('#reset').click(function(){
				window.location='".base_url()."index.php/report/contribution';
			});
			$('#cetak').click(function(){
				var daerah = $('#daerah').val();
				var pos = $('#pos').val();
				var kampung = $('#kampung').val();
				
				window.location='".base_url()."index.php/report/printcontribution/'+daerah+'/'+pos+'/'+kampung;
			});
			$('.select2').select2();
		});
		
		";
		$this->template->jquery= $jquery;
		$this->template->stylesheet->add("/assets/backend/plugins/select2/select2.min.css");
		$this->template->javascript->add("/assets/backend/plugins/select2/select2.full.min.js");
		$this->template->stylesheet->add("/assets/backend/plugins/datepicker/datepicker3.css");
		$this->template->javascript->add("/assets/backend/plugins/datepicker/bootstrap-datepicker.js"); 
		
		$data['daerah'] = $this->model->selectdaerah();
		$data['pos'] = $this->model->selectpos();
		$data['kampung'] = $this->model->selectkampung();
		$this->template->content->view('report/contribution/listing',$data); 
		$this->template->publish();
	}
	public function printpdf(){
		/* if($this->uri->segment(3) != 0){
			$this->db->where("u_course_place",$this->uri->segment(3));
		}
		if($this->uri->segment(4) && $this->uri->segment(5)){
			$this->db->where("u_activated_on BETWEEN '".$this->uri->segment(4)." 00:00:00' AND '".$this->uri->segment(5)." 23:59:59' ");
		}
		if($this->uri->segment(6) != 0){
			$this->db->where("u_status",$this->uri->segment(6));
		}
		$penduduk = "";
		if($this->uri->segment(3)  && $this->uri->segment(3) != "semua"){
			$this->db->where("d.sukukaum_id",$this->uri->segment(3));
		}
		if($this->uri->segment(4)  && $this->uri->segment(4) != "semua"){
			$this->db->where("e.agama_id",$this->uri->segment(4));
		}
		
		$this->db->join("pro_pos b","b.pos_id = a.u_pos_id");
		$this->db->join("pro_kampung c","c.kg_id = a.u_kg_id");
		$this->db->join("pro_sukukaum d","d.sukukaum_id = a.u_tribes");
		$this->db->join("pro_agama e","e.agama_id = a.u_religion");
		$penduduk = $this->blapps_lib->getDataResult("pro_penduduk a",array(),"",array("a.u_full_name","ASC")); */
		$data['students'] = "";
		
		$this->load->view('report/student',$data);
	}
	public function printprogram(){
		
		//$data['students'] = $penduduk;
		
		$this->load->view('report/program/printprogram');
	}
	public function printislamization(){
				
		$this->load->view('report/islamization/printislamization');
	}
	public function printcontribution(){
				
		$this->load->view('report/contribution/printcontribution');
	}
	public function viewall (){
	
		$data['daerah'] = $this->model->selectdaerah();
		$data['pos'] = $this->model->selectpos();
		$data['kampung'] = $this->model->selectkampung();
		$this->template->content->view('report/viewall',$data); 
		$this->template->publish();
	}
	
}

?>