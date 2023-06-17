<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(get_cookie('_userID')=="")
        {
            $this->session->set_flashdata('err_message', 'Please authenticate first !'); 
            redirect('');
        }
        
        $this->load->model('Community_model','model');
    }
	function index(){
		
		$data['title'] = "Resident Registration";
		$jquery = "$(function () {
			
			
			$('#tambah').click(function(){
				window.location='".base_url()."index.php/community/kir/add';
			});
			$('.kir-edit').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/community/kir/add/'+id;
			});
			$('.kir-view').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/community/kir/view/'+id;
			});
			$('.kir-delete').click(function(){
				var id = this.getAttribute('data-id');
				$.ajax({
					url:'".base_url()."index.php/community/cekowner/kir/'+id,
					success: function(data){
						if(data == 'owner'){
							if(confirm('Anda Pasti Untuk Hapus?')){
					
								window.location='".base_url()."index.php/community/deletedata/kir/'+id;
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
			
			$('#tblist').DataTable();
			
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/exercise/remove/'+ids;
			}
		}
		";
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
		$this->template->content->view('community/kir/listing',$data);
	
		$this->template->publish();
	}
    function kir()
	{
		$jquery = "$(function () {
			
			
			$('#tambah').click(function(){
				window.location='".base_url()."index.php/community/kir/add';
			});
			$('.kir-edit').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/community/kir/add/'+id;
			});
			$('.kir-view').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/community/kir/view/'+id;
			});
			$('.kir-delete').click(function(){
				var id = this.getAttribute('data-id');
				$.ajax({
					url:'".base_url()."index.php/community/cekowner/kir/'+id,
					success: function(data){
						if(data == 'owner'){
							if(confirm('Anda Pasti Untuk Hapus?')){
					
								window.location='".base_url()."index.php/community/deletedata/kir/'+id;
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
			
			$('#tblist').DataTable();
			
		});
		function deleteThis(ids){
			if(confirm('Anda pasti untuk hapuskan data ini?')){
				window.location='".base_url()."index.php/exercise/remove/'+ids;
			}
		}
		";
		if($this->uri->segment(3)=="add"){
			$data['title'] = "Add New ";
			$data['pos'] = $this->model->selectpos();
			$data['kampung'] = $this->model->selectkampung();
			$data['agama'] = $this->model->selectagama();
			$data['sukukaum'] = $this->model->selectsukukaum();
			$data['income'] = $this->model->selectincome();
			$data['education'] = $this->model->selecteducation();
			$data['pendidikanagama'] = $this->model->selectpendidikanagama();
			if($this->uri->segment(4)){
				$data['kir'] = $this->model->getKIR($this->uri->segment(4));
			}

			$jquery1 = "
			$(function () {
				$('#label-alert').hide();
				$('#datepicker').datepicker({
					autoclose: true,
					format: 'yyyy-mm-dd'
				});

				//$('#div-tarikhagama').hide();

				$('#agama').change(function(){
					if(this.value == '1')
						$('#div-tarikhagama').show();
					else{
						$('#div-tarikhagama').hide();
						$('#datepicker').val('');
					}
				});
				$('#noic').keyup(function(){
					$.ajax({
						url: '".base_url()."index.php/community/checkIC/'+this.value,
						success: function(data){
							if(data == 'ada'){
								$('#label-alert').show();
								$('#red-alert').html('No Kad Pengenalan ini sudah didaftarkan.');
							}else{
								$('#label-alert').hide();
								$('#red-alert').html('');
							}
						}
					});
				});
			});
			";

			$this->template->jquery= $jquery1;
			$this->template->stylesheet->add("/assets/backend/plugins/select2/select2.min.css");
			$this->template->stylesheet->add("/assets/backend/plugins/datepicker/datepicker3.css");
			$this->template->javascript->add("/assets/backend/plugins/select2/select2.full.min.js");
			$this->template->javascript->add("/assets/backend/plugins/datepicker/bootstrap-datepicker.js");

			$this->template->content->view('community/kir/form',$data); 
		}elseif($this->uri->segment(3)=="view"){
			
			$data['kir'] = $this->model->getKIR($this->uri->segment(4));
			
			$this->template->content->view('community/kir/view',$data); 
		}else{
			$data['title'] = "Ketua Isi Rumah";
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
			$this->template->content->view('community/kir/listing',$data);
		
		}
		$this->template->publish();
		
	}
	function air()
	{
		$jquery = "$(function () {
			
			
			$('#tambah').click(function(){
				window.location='".base_url()."index.php/community/air/add';
			});
			$('.air-edit').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/community/air/add/'+id;
			});
			$('.air-view').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/community/air/view/'+id;
			});
			$('.air-delete').click(function(){
				// if(confirm('Anda Pasti Untuk Hapus?')){
				// 	var id = this.getAttribute('data-id');
				// 	window.location='".base_url()."index.php/community/deletedata/air/'+id;
				// }else{
				// 	return false;
				// }
				var id = this.getAttribute('data-id');
				$.ajax({
					url:'".base_url()."index.php/community/cekowner/air/'+id,
					success: function(data){
						if(data == 'owner'){
							if(confirm('Anda Pasti Untuk Hapus?')){
					
								window.location='".base_url()."index.php/community/deletedata/air/'+id;
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
			$('#tblist').DataTable();
		});
		
		";
		if($this->uri->segment(3)=="add"){
			$data['kir'] = $this->model->selectkir();
			$data['education'] = $this->model->selecteducation();
			$data['pos'] = $this->model->selectpos();
			$data['kampung'] = $this->model->selectkampung();
			$data['agama'] = $this->model->selectagama();
			$data['sukukaum'] = $this->model->selectsukukaum();
			$data['income'] = $this->model->selectincome();
			$data['pendidikanagama'] = $this->model->selectpendidikanagama();
			if($this->uri->segment(4)){
				$data['air'] = $this->model->getKIR($this->uri->segment(4));
			}
			$jquery1 = "
			$(function () {
				$('#label-alert').hide();
				$('.select2').select2();
				$('#datepicker').datepicker({
					autoclose: true,
					format: 'yyyy-mm-dd'
				});

				//$('#div-tarikhagama').hide();

				$('#agama').change(function(){
					if(this.value == '1')
						$('#div-tarikhagama').show();
					else{
						$('#div-tarikhagama').hide();
						$('#datepicker').val('');
					}
				});
				$('#noic').keyup(function(){
					$.ajax({
						url: '".base_url()."index.php/community/checkIC/'+this.value,
						success: function(data){
							if(data == 'ada'){
								$('#label-alert').show();
								$('#red-alert').html('No Kad Pengenalan ini sudah didaftarkan.');
							}else{
								$('#label-alert').hide();
								$('#red-alert').html('');
							}
						}
					});
				});
			});
			";

			$this->template->jquery= $jquery1;
			$this->template->stylesheet->add("/assets/backend/plugins/select2/select2.min.css");
			$this->template->stylesheet->add("/assets/backend/plugins/datepicker/datepicker3.css");
			$this->template->javascript->add("/assets/backend/plugins/select2/select2.full.min.js");
			$this->template->javascript->add("/assets/backend/plugins/datepicker/bootstrap-datepicker.js");
			$this->template->content->view('community/air/form',$data); 
		}elseif($this->uri->segment(3)=="view"){
			
			$data['air'] = $this->model->getKIR($this->uri->segment(4));
			$data['kir'] = $this->model->getKIR(base64_encode($data['air']->u_parent));
			
			$this->template->content->view('community/air/view',$data); 
		}else{
		
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('community/air/listing');
		
		}
		$this->template->publish();
		
	}
	function hospital(){
		$jquery = "$(function () {
			
			
			$('#tambah').click(function(){
				window.location='".base_url()."index.php/community/issue/form';
			});
			$('.issue-edit').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/community/issue/form/'+id;
			});
			$('.issue-view').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/community/issue/view/'+id;
			});
			$('.issue-delete').click(function(){
				// if(confirm('Anda Pasti Untuk Hapus?')){
				// 	var id = this.getAttribute('data-id');
				// 	window.location='".base_url()."index.php/community/deletedata/issue/'+id;
				// }else{
				// 	return false;
				// }


				var id = this.getAttribute('data-id');
				$.ajax({
					url:'".base_url()."index.php/community/cekowner/issue/'+id,
					success: function(data){
						if(data == 'owner'){
							if(confirm('Anda Pasti Untuk Hapus?')){
					
								window.location='".base_url()."index.php/community/deletedata/issue/'+id;
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
			$('#tblist').DataTable();
		});
		
		";
		if($this->uri->segment(3)=="form"){
			$data['kampung'] = $this->model->selectkampung();
			$data['pro_isu_type'] = $this->model->selectisutype();
			if($this->uri->segment(4)){
				$data['air'] = $this->model->getIsu($this->uri->segment(4));
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
			$this->template->content->view('community/hospital/form',$data); 
		}elseif($this->uri->segment(3)=="view"){
			
			$data['air'] = $this->model->getIsu($this->uri->segment(4));
			
			$this->template->content->view('community/hospital/view',$data); 
		}else{
			$data['title'] = "Patient's Listing";
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
			$this->template->content->view('community/hospital/listing',$data);
		
		}
		$this->template->publish();
		
	}
	public function contribution(){
		$jquery = "$(function () {
			
			
			$('#tambah').click(function(){
				window.location='".base_url()."index.php/community/contribution/form';
			});
			$('.contri-edit').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/community/contribution/form/'+id;
			});
			$('.contri-view').click(function(){
				var id = this.getAttribute('data-id');
				window.location='".base_url()."index.php/community/contribution/view/'+id;
			});
			$('.contri-delete').click(function(){
				// if(confirm('Anda Pasti Untuk Hapus?')){
				// 	var id = this.getAttribute('data-id');
				// 	window.location='".base_url()."index.php/community/deletedata/contribution/'+id;
				// }else{
				// 	return false;
				// }


				var id = this.getAttribute('data-id');
				$.ajax({
					url:'".base_url()."index.php/community/cekowner/contribution/'+id,
					success: function(data){
						if(data == 'owner'){
							if(confirm('Anda Pasti Untuk Hapus?')){
					
								window.location='".base_url()."index.php/community/deletedata/contribution/'+id;
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
			$('#tblist').DataTable();
		});
		
		";
		if($this->uri->segment(3)=="form"){
			$data['penyumbang'] = $this->model->selectpenyumbang();
			$data['penerima'] = $this->model->selectpenerima();
			if($this->uri->segment(4)){
				$data['con'] = $this->model->getContribution($this->uri->segment(4));
			}
			$jquery = "$(function () {
				$('.select2').select2();
				$('.datepicker').datepicker({
					autoclose: true,
					format: 'yyyy-mm-dd'
				});
			});
			";
			$this->template->stylesheet->add("/assets/backend/plugins/select2/select2.min.css");
			$this->template->stylesheet->add("/assets/backend/plugins/datepicker/datepicker3.css");
			$this->template->javascript->add("/assets/backend/plugins/select2/select2.full.min.js");
			$this->template->javascript->add("/assets/backend/plugins/datepicker/bootstrap-datepicker.js");
			$this->template->jquery= $jquery;
			$this->template->content->view('community/contribution/form',$data); 
		}elseif($this->uri->segment(3)=="view"){
			
			$data['con'] = $this->model->getContributionfull($this->uri->segment(4));
			
			$this->template->content->view('community/contribution/view',$data); 
		}else{
		
			$this->template->stylesheet->add("/assets/backend/plugins/datatables/dataTables.bootstrap.css");
			$this->template->javascript->add("/assets/backend/plugins/datatables/jquery.dataTables.min.js"); 
			$this->template->javascript->add("/assets/backend/plugins/datatables/dataTables.bootstrap.min.js"); 
			$this->template->jquery= $jquery;		
			$this->template->content->view('community/contribution/listing');
		
		}
		$this->template->publish();
		
	}
	
	public function create(){
		
		if($this->uri->segment(3)=="kir"){
			$this->model->insertkir();
		
			$this->session->set_flashdata('success_message','Data Ketua Isi Rumah berjaya didaftarkan.');
			redirect("community/kir");
		}elseif($this->uri->segment(3)=="air"){
			$this->model->insertair();
		
			$this->session->set_flashdata('success_message','Data Ahli Isi Rumah berjaya didaftarkan.');
			redirect("community/air");
		}elseif($this->uri->segment(3)=="issue"){
			$this->model->insertissue();
		
			$this->session->set_flashdata('success_message','Data Isu Baru berjaya didaftarkan.');
			redirect("community/issue");
		}elseif($this->uri->segment(3)=="contribution"){
			$this->model->insertcontribution();
		
			$this->session->set_flashdata('success_message','Data Sumbangan berjaya didaftarkan.');
			redirect("community/contribution");
		}else{
			
		}
		
	}
    function update(){
		if($this->uri->segment(3) == "kir"){
			$this->model->updatekir();
		
			$this->session->set_flashdata('success_message','Ketua Isi Rumah berjaya dikemaskini.');
			redirect("community/kir");
		}elseif($this->uri->segment(3)=="air"){
			$this->model->updateair();
		
			$this->session->set_flashdata('success_message','Ahli Isi Rumah berjaya dikemaskini.');
			redirect("community/air");
		}elseif($this->uri->segment(3)=="issue"){
			$this->model->updateissue();
		
			$this->session->set_flashdata('success_message','Isu berjaya dikemaskini.');
			redirect("community/issue");
		}elseif($this->uri->segment(3)=="contribution"){
			$this->model->updatecontribution();
		
			$this->session->set_flashdata('success_message','Penerima Sumbangan berjaya dikemaskini.');
			redirect("community/contribution");
		}else{
			
		}
		
	}
	function deletedata(){
		if($this->uri->segment(3)=="kir"){
			
			$this->model->deletekir();
			$this->session->set_flashdata('success_message','Ketua Isi Rumah berjaya dihapuskan.');
			redirect("community/kir");
			
		}
		if($this->uri->segment(3)=="air"){
			
			$this->model->deletekir();
			$this->session->set_flashdata('success_message','Ahli Isi Rumah berjaya dihapuskan.');
			redirect("community/air");
			
		}
		if($this->uri->segment(3)=="issue"){
			
			$this->model->deleteissue();
			$this->session->set_flashdata('success_message','Isu berjaya dihapuskan.');
			redirect("community/issue");
			
		}
		if($this->uri->segment(3)=="contribution"){
			
			$this->model->deletecontribution();
			$this->session->set_flashdata('success_message','Sumbangan berjaya dihapuskan.');
			redirect("community/contribution");
			
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
	public function checkIC($ic){
		$result = $this->blapps_lib->getDataResult("pro_penduduk",array(array("u_ic_number",$ic),array("u_delete",0)),"",array("u_id","ASC"));

		if($result)
		echo "ada";
		else echo "tiada";
	}
	function cekowner($type,$id){

		if($type == "kir" || $type=="air"){
			$createdby = $this->blapps_lib->getData("u_createdby","pro_penduduk","u_id",base64_decode($id));
		}
		if($type == "contribution"){
			$createdby = $this->blapps_lib->getData("ps_createdby","pro_sumbangan","ps_id",base64_decode($id));
		}
		if($type == "issue"){
			$createdby = $this->blapps_lib->getData("isu_createdby","pro_isu","isu_id",base64_decode($id));
		}
		

		if(get_cookie("_urole") != 1 && get_cookie("_userID") != $createdby){
			echo "xowner";
		}else{
			echo "owner";
		}
	}
	
}

?>
