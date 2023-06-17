<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community_model extends CI_Model{
    
	function selectpos(){
		
		$result = $this->db->get("pro_pos");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->pos_id] = $dt->pos_name;
	    }
	    return $data;
	}
	function selectisutype(){
		
		$result = $this->db->get("pro_isu_type");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->type_id] = $dt->type_desc;
	    }
	    return $data;
	}
	function selectpenyumbang(){
		
		$result = $this->db->where("lookup_type","agensi-sumbangan");
		$result = $this->db->get("pro_lookup");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->lookup_id] = $dt->lookup_desc;
	    }
	    return $data;
	}
	function selectpenerima(){
		
		$result = $this->db->where("u_delete",0);
		$result = $this->db->order_by("u_full_name","asc");
		$result = $this->db->get("pro_penduduk");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->u_id] = $dt->u_full_name . " - " .$dt->u_ic_number;
	    }
	    return $data;
	}
	function selectkampung(){
		$this->db->join("pro_pos pos","pos.pos_id = kg.kg_pos_id");
		$this->db->join("pro_daerah dae","dae.daerah_id = pos.pos_daerah");
		$this->db->order_by("dae.daerah_name","ASC");
		$result = $this->db->get("pro_kampung kg");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->kg_id] = $dt->daerah_name . " - " . $dt->pos_name . " - " . $dt->kg_nama;
	    }
	    return $data;
	}
	function selectagama(){
		
		$result = $this->db->get("pro_agama");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->agama_id] = $dt->agama_desc;
	    }
	    return $data;
	}
	function selectincome(){
		
		$result = $this->db->get("pro_pendapatan");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->pendapatan_id] = $dt->pendapatan_desc;
	    }
	    return $data;
	}
	function selectsukukaum(){
		
		$result = $this->db->where("sukukaum_status",1);
		$result = $this->db->get("pro_sukukaum");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->sukukaum_id] = $dt->sukukaum_name;
	    }
	    return $data;
	}
	function selectkir(){
		
		$result = $this->db->where("u_parent",0);
		$result = $this->db->order_by("u_full_name","ASC");
		$result = $this->db->get("pro_penduduk");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->u_id] = $dt->u_full_name ." [". $dt->u_ic_number ."]";
	    }
	    return $data;
	}
	function selecteducation(){
		
		$result = $this->db->get("pro_tahappendidikan");
		//$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->pendidikan_id] = $dt->pendidikan_desc;
	    }
	    return $data;
	}
	function selectpendidikanagama(){
		
		$result = $this->db->get("pro_pendidikan");
		//$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->pendidikan_id] = $dt->pendidikan_desc;
	    }
	    return $data;
	}
	function selectInterviewer(){
		$this->db->where("u_role",5);
		$this->db->or_where("(u_role = 4 AND u_interviewer =1)");
		$result = $this->db->order_by("u_id","ASC")
                     ->get("ek_admin");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->u_id] = $dt->u_fullname;
	    }
	    return $data;
	}
	function getKIR($id){
		$this->db->where("u_id",base64_decode($id));
		$this->db->from('pro_penduduk');
		$query = $this->db->get();
		return $query->row();
	}
	function getIsu($id){
		$this->db->where("isu_id",base64_decode($id));
		$this->db->from('pro_isu');
		$query = $this->db->get();
		return $query->row();
	}
	function getContribution($id){

		$this->db->where("ps_id",base64_decode($id));
		$this->db->from('pro_sumbangan');
		$query = $this->db->get();
		return $query->row();
	}
	function getContributionfull($id){

		$this->db->join("pro_penduduk b","b.u_id = a.ps_penerima");
		$this->db->where("a.ps_id",base64_decode($id));
		$this->db->from('pro_sumbangan a');
		$query = $this->db->get();
		return $query->row();
	}
	function getUser($id){
		$this->db->where("u_id",base64_decode($id));
		$this->db->from('tb_users');
		$query = $this->db->get();
		return $query->row();
	}
	function getVideo($id){
		$this->db->where("u_id",base64_decode($id));
		$this->db->from('tb_video_evaluation');
		$query = $this->db->get();
		return $query->row();
	}
	function insertkir(){
		$islamdate = "";
		if($this->input->post('tarikhislam') != ""){
			$islamdate = date("Y-m-d",strtotime($this->input->post('tarikhislam')));
		}
		$data = array(
				//'u_pos_id'		=>$this->input->post('pos'),
				'u_kg_id'		=>$this->input->post('kampung'),
				'u_latitud'		=>$this->input->post('latitud'),
				'u_longitud'	=>$this->input->post('longitud'),
				'u_ic_number'	=>$this->input->post('noic'),
				'u_full_name'	=>$this->input->post('nama'),
				'u_gender'		=>$this->input->post('jantina'),
				'u_religion'	=>$this->input->post('agama'),
				'u_religious'	=>$this->input->post('penghayatan'),
				'u_islamdate'	=>$islamdate,
				'u_tribes'		=>$this->input->post('sukukaum'),
				'u_education'	=>$this->input->post('tahappendidikan'),
				'u_edureligion'	=>$this->input->post('pendidikanagama'),
				'u_employment'	=>$this->input->post('pekerjaan'),
				'u_income'		=>$this->input->post('pendapatan'),
				'u_penghulu'	=>$this->input->post('penghulu'),
				'u_sta_tempat_ibadat'=>$this->input->post('tempatibadat'),
				'u_status'		=>1,
				'u_parent'		=>0,
				'u_createdby'	=>get_cookie('_userID'),				
				'u_created'		=>date("Y-m-d H:i:s"),				
				'u_modifiedby'	=>get_cookie('_userID'),				
				'u_modified'	=>date("Y-m-d H:i:s"),				
					
			);
		$this->db->insert("pro_penduduk",$data);
		$newID = $this->db->insert_id();
		
		foreach($this->input->post('pendidikan') as $row){
			$this->db->insert("pro_penduduk_pendidikan",array('ppp_penduduk'=>$newID,'ppp_pendidikan'=>$row));
		}
		foreach($this->input->post('sumberpendapatan') as $row){
			$this->db->insert("pro_penduduk_pendapatan",array('ppi_penduduk'=>$newID,'ppi_pendapatan'=>$row));
		}
		foreach($this->input->post('bakat') as $row){
			$this->db->insert("pro_penduduk_bakat",array('ppb_penduduk'=>$newID,'ppb_bakat'=>$row));
		}
		foreach($this->input->post('religionleader') as $row){
			$this->db->insert("pro_penduduk_leadagama",array('ppl_penduduk'=>$newID,'ppl_leadagama'=>$row));
		}

		$this->blapps_lib->addEvent("Tambah Data Baru Ketua Isi Rumah ".$this->input->post('nama')." No Kad Pengenalan ".$this->input->post('noic'));
	}
	function updatekir(){
		
		$data = array(
				//'u_pos_id'		=>$this->input->post('pos'),
				'u_kg_id'		=>$this->input->post('kampung'),
				'u_latitud'		=>$this->input->post('latitud'),
				'u_longitud'	=>$this->input->post('longitud'),
				'u_ic_number'	=>$this->input->post('noic'),
				'u_full_name'	=>$this->input->post('nama'),
				'u_gender'		=>$this->input->post('jantina'),
				'u_religion'	=>$this->input->post('agama'),
				'u_religious'	=>$this->input->post('penghayatan'),
				'u_islamdate'	=>$this->input->post('tarikhislam'),
				'u_tribes'		=>$this->input->post('sukukaum'),
				'u_education'	=>$this->input->post('tahappendidikan'),
				'u_edureligion'	=>$this->input->post('pendidikanagama'),
				'u_employment'	=>$this->input->post('pekerjaan'),
				'u_income'		=>$this->input->post('pendapatan'),
				'u_penghulu'	=>$this->input->post('penghulu'),
				'u_sta_tempat_ibadat'=>$this->input->post('tempatibadat'),
				'u_status'		=>$this->input->post('status'),	
				'u_modifiedby'	=>get_cookie('_userID'),				
				'u_modified'	=>date("Y-m-d H:i:s"),				
				
			);
		$newID = base64_decode($this->uri->segment(4));
		$this->db->where("u_id",$newID);
		$this->db->update("pro_penduduk",$data);
		
		$this->db->where("ppp_penduduk",$newID);
		$this->db->delete("pro_penduduk_pendidikan");
		
		$this->db->where("ppi_penduduk",$newID);
		$this->db->delete("pro_penduduk_pendapatan");
		
		$this->db->where("ppb_penduduk",$newID);
		$this->db->delete("pro_penduduk_bakat");
		
		$this->db->where("ppl_penduduk",$newID);
		$this->db->delete("pro_penduduk_leadagama");
		
		foreach($this->input->post('pendidikan') as $row){
			$this->db->insert("pro_penduduk_pendidikan",array('ppp_penduduk'=>$newID,'ppp_pendidikan'=>$row));
		}
		foreach($this->input->post('sumberpendapatan') as $row){
			$this->db->insert("pro_penduduk_pendapatan",array('ppi_penduduk'=>$newID,'ppi_pendapatan'=>$row));
		}
		foreach($this->input->post('bakat') as $row){
			$this->db->insert("pro_penduduk_bakat",array('ppb_penduduk'=>$newID,'ppb_bakat'=>$row));
		}
		foreach($this->input->post('religionleader') as $row){
			$this->db->insert("pro_penduduk_leadagama",array('ppl_penduduk'=>$newID,'ppl_leadagama'=>$row));
		}
		
		$this->blapps_lib->addEvent("Kemaskini Ketua Isi Rumah ".$this->input->post('nama')." No Kad Pengenalan ".$this->input->post('noic'));
	}
	function deleteissue(){
		$id = base64_decode($this->uri->segment(4));
		$data = array(
				'isu_modifiedby'	=>get_cookie('_userID'),				
				'isu_modified'	=>date("Y-m-d H:i:s"),				
				'isu_delete'		=>1,	
			);
		$this->db->where("isu_id",$id);
		$this->db->update("pro_isu",$data);

		$this->blapps_lib->addEvent("Hapus Isu ID ".$id);
	}
	function deletecontribution(){
		$id = base64_decode($this->uri->segment(4));
		$data = array(
				'ps_modifiedby'	=>get_cookie('_userID'),				
				'ps_modified'	=>date("Y-m-d H:i:s"),				
				'ps_isdeleted'	=>1,	
			);
		$this->db->where("ps_id",$id);
		$this->db->update("pro_sumbangan",$data);

		$this->blapps_lib->addEvent("Hapus Penerima Sumbangan ID ".$id);
	}
	function deletekir(){
		$id = base64_decode($this->uri->segment(4));
		$data = array(
				'u_modifiedby'	=>get_cookie('_userID'),				
				'u_modified'	=>date("Y-m-d H:i:s"),				
				'u_delete'		=>1,	
			);
		$this->db->where("u_id",$id);
		$this->db->update("pro_penduduk",$data);

		$this->blapps_lib->addEvent("Hapus Data Ketua Isi Rumah ID ".$id);
	}
	function updateair(){
		
		$kir = $this->input->post('kir');
		$statuskir = $this->input->post('statuskir');
		
		if($statuskir == 1){ //air tukar status ke kir
			$kir = 0;
			$oldkir = $this->input->post('kir');
		}else{
			$kir = $this->input->post('kir');
			$oldkir = 0;
		}
		
		$kg = $this->blapps_lib->getData("u_kg_id","pro_penduduk","u_id",$this->input->post('kir'));
		$pos = $this->blapps_lib->getData("u_pos_id","pro_penduduk","u_id",$this->input->post('kir'));
		$data = array(
				'u_pos_id'		=>$pos,
				'u_kg_id'		=>$kg,
				'u_ic_number'	=>$this->input->post('noic'),
				'u_full_name'	=>$this->input->post('nama'),
				'u_gender'		=>$this->input->post('jantina'),
				'u_religion'	=>$this->input->post('agama'),
				'u_islamdate'	=>$this->input->post('tarikhislam'),
				'u_tribes'		=>$this->input->post('sukukaum'),
				'u_education'	=>$this->input->post('pendidikan'),
				'u_edureligion'	=>$this->input->post('pendidikanagama'),
				'u_employment'	=>$this->input->post('pekerjaan'),
				'u_income'		=>$this->input->post('pendapatan'),
				'u_penghulu'	=>$this->input->post('penghulu'),
				'u_modifiedby'	=>get_cookie('_userID'),				
				'u_modified'	=>date("Y-m-d H:i:s"),				
				'u_status'		=>$this->input->post('status'),	
				'u_parent'		=>$kir,	
				'u_parent_old'	=>$oldkir,	
			);

		$newID = base64_decode($this->uri->segment(4));
		$this->db->where("u_id",$newID);
		$this->db->update("pro_penduduk",$data);
		
		$this->db->where("ppp_penduduk",$newID);
		$this->db->delete("pro_penduduk_pendidikan");
		
		$this->db->where("ppi_penduduk",$newID);
		$this->db->delete("pro_penduduk_pendapatan");
		
		$this->db->where("ppb_penduduk",$newID);
		$this->db->delete("pro_penduduk_bakat");
		
		$this->db->where("ppl_penduduk",$newID);
		$this->db->delete("pro_penduduk_leadagama");
		
		foreach($this->input->post('pendidikan') as $row){
			$this->db->insert("pro_penduduk_pendidikan",array('ppp_penduduk'=>$newID,'ppp_pendidikan'=>$row));
		}
		foreach($this->input->post('sumberpendapatan') as $row){
			$this->db->insert("pro_penduduk_pendapatan",array('ppi_penduduk'=>$newID,'ppi_pendapatan'=>$row));
		}
		foreach($this->input->post('bakat') as $row){
			$this->db->insert("pro_penduduk_bakat",array('ppb_penduduk'=>$newID,'ppb_bakat'=>$row));
		}
		foreach($this->input->post('religionleader') as $row){
			$this->db->insert("pro_penduduk_leadagama",array('ppl_penduduk'=>$newID,'ppl_leadagama'=>$row));
		}

		$this->blapps_lib->addEvent("Kemaskini Data Baru Ahli Isi Rumah ".$this->input->post('nama')." No Kad Pengenalan ".$this->input->post('noic'));
	}
	function deleteair(){
		$data = array(
				'u_modifiedby'	=>get_cookie('_userID'),				
				'u_modified'	=>date("Y-m-d H:i:s"),				
				'u_delete'		=>1,	
			);
		$this->db->where("u_id",base64_decode($this->uri->segment(4)));
		$this->db->update("pro_penduduk",$data);

		$this->blapps_lib->addEvent("Hapus Data Ahli Isi Rumah ".base64_decode($this->uri->segment(4)));
	}
	
	function insertair(){
		$kg = $this->blapps_lib->getData("u_kg_id","pro_penduduk","u_id",$this->input->post('kir'));
		$islamdate = "";
		if($this->input->post('tarikhislam') != ""){
			$islamdate = date("Y-m-d",strtotime($this->input->post('tarikhislam')));
		}
		$data = array(
				'u_kg_id'		=>$kg,
				'u_ic_number'	=>$this->input->post('noic'),
				'u_full_name'	=>$this->input->post('nama'),
				'u_gender'		=>$this->input->post('jantina'),
				'u_religion'	=>$this->input->post('agama'),
				'u_islamdate'	=>$islamdate,
				'u_tribes'		=>$this->input->post('sukukaum'),
				'u_education'	=>$this->input->post('pendidikan'),
				'u_edureligion'	=>$this->input->post('pendidikanagama'),
				'u_employment'	=>$this->input->post('pekerjaan'),
				'u_income'		=>$this->input->post('pendapatan'),
				'u_penghulu'	=>$this->input->post('penghulu'),
				'u_createdby'	=>get_cookie('_userID'),				
				'u_created'		=>date("Y-m-d H:i:s"),				
				'u_modifiedby'	=>get_cookie('_userID'),				
				'u_modified'	=>date("Y-m-d H:i:s"),				
				'u_status'		=>1,	
				'u_parent'		=>$this->input->post('kir'),	
			);
		$this->db->insert("pro_penduduk",$data);
		$newID = $this->db->insert_id();
		
		foreach($this->input->post('pendidikan') as $row){
			$this->db->insert("pro_penduduk_pendidikan",array('ppp_penduduk'=>$newID,'ppp_pendidikan'=>$row));
		}
		foreach($this->input->post('sumberpendapatan') as $row){
			$this->db->insert("pro_penduduk_pendapatan",array('ppi_penduduk'=>$newID,'ppi_pendapatan'=>$row));
		}
		foreach($this->input->post('bakat') as $row){
			$this->db->insert("pro_penduduk_bakat",array('ppb_penduduk'=>$newID,'ppb_bakat'=>$row));
		}
		foreach($this->input->post('religionleader') as $row){
			$this->db->insert("pro_penduduk_leadagama",array('ppl_penduduk'=>$newID,'ppl_leadagama'=>$row));
		}
		$this->blapps_lib->addEvent("Tambah Data Baru Ahli Isi Rumah ".$this->input->post('nama')." No Kad Pengenalan ".$this->input->post('noic'));
	}
	function insertcontribution(){

		$data = array(
				'ps_penerima'	=>$this->input->post('penerima'),
				'ps_penyumbang'	=>$this->input->post('penyumbang'),
				'ps_jenis'		=>$this->input->post('jenis'),
				'ps_jumlah'		=>$this->input->post('jumlah'),
				'ps_sdate'		=>$this->input->post('sdate'),
				'ps_edate'		=>$this->input->post('edate'),
				'ps_keterangan'	=>$this->input->post('keterangan'),
				'ps_createdby'	=>get_cookie('_userID'),				
				'ps_created'	=>date("Y-m-d H:i:s"),				
				'ps_modifiedby'	=>get_cookie('_userID'),				
				'ps_modified'	=>date("Y-m-d H:i:s"),				
			);
		$this->db->insert("pro_sumbangan",$data);
		$newID = $this->db->insert_id();

		foreach($this->input->post('jenissumbangan') as $row){
			$this->db->insert("pro_sumbangan_jenis",array('psj_sumbangan'=>$newID,'psj_jenis'=>$row));
		}
		$this->blapps_lib->addEvent("Tambah Data Baru Penerima Sumbangan ");
		
	}
	function updatecontribution(){
		$id = base64_decode($this->uri->segment(4));
		$data = array(
			'ps_penerima'	=>$this->input->post('penerima'),
			'ps_penyumbang'	=>$this->input->post('penyumbang'),
			'ps_jenis'		=>$this->input->post('jenis'),
			'ps_jumlah'		=>$this->input->post('jumlah'),
			'ps_sdate'		=>$this->input->post('sdate'),
			'ps_edate'		=>$this->input->post('edate'),
			'ps_keterangan'	=>$this->input->post('keterangan'),
			'ps_modifiedby'	=>get_cookie('_userID'),				
			'ps_modified'	=>date("Y-m-d H:i:s"),				
		);
		$this->db->where("ps_id",$id);
		$this->db->update("pro_sumbangan",$data);

		$this->db->where("psj_sumbangan",$id);
		$this->db->delete("pro_sumbangan_jenis");
		foreach($this->input->post('jenissumbangan') as $row){
			$this->db->insert("pro_sumbangan_jenis",array('psj_sumbangan'=>$id,'psj_jenis'=>$row));
		}

		$this->blapps_lib->addEvent("Kemaskini Data Penerima Sumbangan ".$id);
		
	}

	function insertissue(){

		$data = array(
				'isu_type'		=>$this->input->post('jenis'),
				//'isu_pos'		=>$this->input->post('nama'),
				'isu_kg'		=>$this->input->post('kampung'),
				'isu_title'		=>$this->input->post('isu'),
				'isu_remarks'	=>$this->input->post('keterangan'),
				'isu_date'		=>$this->input->post('tarikh'),
				'isu_createdby'	=>get_cookie('_userID'),				
				'isu_created'	=>date("Y-m-d H:i:s"),				
				'isu_modifiedby'=>get_cookie('_userID'),				
				'isu_modified'	=>date("Y-m-d H:i:s"),				
			);
		$this->db->insert("pro_isu",$data);
		$this->blapps_lib->addEvent("Tambah Data Baru Isu ");
		
	}
	function updateissue(){

		$data = array(
				'isu_type'		=>$this->input->post('jenis'),
				'isu_kg'		=>$this->input->post('kampung'),
				'isu_title'		=>$this->input->post('isu'),
				'isu_remarks'	=>$this->input->post('keterangan'),
				'isu_date'		=>$this->input->post('tarikh'),
				'isu_modifiedby'=>get_cookie('_userID'),				
				'isu_modified'	=>date("Y-m-d H:i:s"),				
			);
			$this->db->where("isu_id",base64_decode($this->uri->segment(4)));
		$this->db->update("pro_isu",$data);

		$this->blapps_lib->addEvent("Kemaskini Data Isu ".base64_decode($this->uri->segment(4)));
		
	}
	
	
	









	function updateExercise(){
		$data = array(
				'LessonID'		=>$this->input->post('tajuk'),
				'Question'		=>$this->input->post('soalan'),
				'ChoiceA'		=>$this->input->post('jawapanA'),
				'ChoiceB'		=>$this->input->post('jawapanB'),
				'ChoiceC'		=>$this->input->post('jawapanC'),
				'ChoiceD'		=>$this->input->post('jawapanD'),
				'Answer'		=>$this->input->post('jawapan'),
			);
		$this->db->where("ExerciseID",base64_decode($this->input->post('exerciseid')));
		$this->db->update("exercise",$data);
	}
	
	function removeExercise(){	

		$this->db->where("ExerciseID",base64_decode($this->uri->segment(3)));
		$this->db->delete("exercise");
		
	}
	
	function gettempatkursus($id){
		$this->db->where("sub_id",$id);
		$this->db->from('ek_subinstitution');
		$query = $this->db->get();
		return $query->row()->sub_name;
	}
	/* function getsession(){
		$institusi = 2;
		
		$this->db->where("u_status_active",0);
		$this->db->where("u_course_place",$institusi);
		$this->db->from('tb_users');
		$query = $this->db->get();
		return $query->num_rows();
	} */
	function getlimit(){
		$this->db->where("settting_name","limit_use_for_each_session");
		$this->db->from('tb_setting_rules');
		$query = $this->db->get();
		return $query->row()->settting_value;
	}
	function updatestudent(){
		$data = array(
				'u_status_active'		=>1,
				'u_status'				=>2, //telah disahkan
				'u_course_place'		=>$this->input->post('tempatkursus'),
				'u_payment_receipt_no'	=>$this->input->post('resit'),
				'u_activated_by'		=>get_cookie('_userID'),
				'u_activated_on'		=>date("Y-m-d H:i:s"),
				'u_session'				=>$this->input->post('sesi'),
				'u_session_sequence'	=>$this->input->post('giliran'),
				'u_interviewer'			=>$this->input->post('interviewer'),
			);
		$this->db->where("u_id",base64_decode($this->uri->segment(3)));
		$this->db->update("tb_users",$data);
	}
	function updatestudentstatus(){
		$ic = $this->blapps_lib->getData("u_noic","ek_admin","u_id",get_cookie("_userID"));
		$data = array(
				'u_status'				=>3, //telah selesai topik/telah dinilai
				'u_interviewer'			=>$this->input->post('interviewer'),
			);
		$this->db->where("u_id",base64_decode($this->input->post('userid')));
		$this->db->update("tb_users",$data);
		
		$data1 = array(
				'vide_status'		=>$this->input->post('penilaian'),
				'vide_notes'		=>$this->input->post('remarks'),
				'u_noic'			=>$ic,
				'vide_date'			=>date("Y-m-d"),
			);
		$this->db->where("u_id",base64_decode($this->input->post('userid')));
		$this->db->update("tb_video_evaluation",$data1);
		
		
	}
	
	function createprofile(){
		
		
		$data = array(

				'u_full_name'	=>$this->input->post('namapenuh'),
				'u_ic_number'	=>$this->input->post('noic'),
				'u_occupation'	=>$this->input->post('pekerjaan'),
				'u_work_place'	=>$this->input->post('tempatkerja'),
				'u_gender'		=>$this->input->post('jantina'),
				'u_phone_number'=>$this->input->post('notel'),
				'u_address'		=>$this->input->post('alamat'),
				'u_course_place'=>$this->input->post('daerah'),
				'u_interview_remarks'=>$this->input->post('negeri'),
				'u_payment_receipt_no'=>$this->input->post('sukukaum'),
				'u_registered_on'=>$this->input->post('sukukaum'),
				'u_activated_by'=>get_cookie('_userID'),
				'u_activated_on'=>date("Y-m-d H:i:s"),
				'u_status'		=>2,
			);
		$this->db->insert("tb_users",$data);
		
		
	}
	
	
}



?>