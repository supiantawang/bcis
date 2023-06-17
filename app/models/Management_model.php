<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Management_model extends CI_Model{
    // institution
    function insertinstitution($path){
		$data = array(
				'ins_code'		=>$this->input->post('kod'),
				'ins_name'		=>$this->input->post('nama'),				
				'ins_link'		=>$path,				
				'ins_active'	=>1,				
			);
		$this->db->insert("ek_institution",$data);
	}
	function getdistrict(){
		$this->db->where("daerah_id",base64_decode($this->uri->segment(4)));
		$this->db->from('pro_daerah');
		$query = $this->db->get();
		return $query->row();
	}

	function updatedistrict(){
		
		$data = array(
				'daerah_name'		=>$this->input->post('nama'),				
				
			);
		
		$this->db->where("daerah_id",base64_decode($this->input->post('id')));
		$this->db->update("pro_daerah",$data);
	}
	function removevillage(){
		$newID = base64_decode($this->uri->segment(4));
		$this->db->where("kg_id",$newID);
		$this->db->delete("pro_kampung");
		
		$this->db->where("pkk_kampung",$newID);
		$this->db->delete("pro_kampung_kemudahan");
		
		$this->db->where("pki_kampung",$newID);
		$this->db->delete("pro_kampung_ibadat");
		
		$this->db->where("pks_kampung",$newID);
		$this->db->delete("pro_kampung_sumber");

		$this->db->where("pka_kampung",$newID);
		$this->db->delete("pro_kampung_air");

		$this->db->where("pke_kampung",$newID);
		$this->db->delete("pro_kampung_elektrik");

		
	}
	function removeethnic(){
		$newID = base64_decode($this->uri->segment(4));
		$this->db->where("sukukaum_id",$newID);
		$this->db->delete("pro_sukukaum");
		
		
	}
	function removepos(){
		$id = base64_decode($this->uri->segment(4));
		$this->db->where("pos_id",$id);
		$this->db->delete("pro_pos");
		
		$this->blapps_lib->addEvent("Hapus Data Pos ID = $id  ");
	}
	function removedistrict(){

		$this->db->where("daerah_id",base64_decode($this->uri->segment(4)));
		$this->db->delete("pro_daerah");
		
	}
	function removeorganizer(){

		$this->db->where("agensi_id",base64_decode($this->uri->segment(4)));
		$this->db->update("pro_agensi",array('agensi_isdeleted'=>1));
		
	}
	function insertpos(){
		$data = array(
				'pos_name'			=>strtoupper($this->input->post('namapos')),
				'pos_daerah'		=>$this->input->post('lokasi'),				
				'pos_latitude'		=>$this->input->post('latitude'),				
				'pos_longitude'		=>$this->input->post('longitude'),				
				'pos_keluasan'		=>$this->input->post('keluasan'),				
				'pos_bil_penduduk'	=>$this->input->post('bilpenduduk'),				
				'pos_bil_kampung'	=>$this->input->post('bilkampung'),				
				'pos_createdby'		=>get_cookie('_userID'),				
				'pos_createdat'		=>date("Y-m-d H:i:s"),				
				'pos_modifiedby'	=>get_cookie('_userID'),				
				'pos_modifiedat'	=>date("Y-m-d H:i:s"),				
				'pos_status'		=>1,				
			);
		$this->db->insert("pro_pos",$data);
		
		$id = $this->db->insert_id();
		$this->blapps_lib->addEvent("Tambah Data Baru Pos ID = $id ".strtoupper($this->input->post('namapos'))." ");
	}
	function updatepos(){
		$id = base64_decode($this->uri->segment(4));
		$data = array(
				'pos_name'			=>strtoupper($this->input->post('namapos')),
				'pos_daerah'		=>$this->input->post('lokasi'),				
				'pos_latitude'		=>$this->input->post('latitude'),				
				'pos_longitude'		=>$this->input->post('longitude'),				
				'pos_keluasan'		=>$this->input->post('keluasan'),				
				'pos_bil_penduduk'	=>$this->input->post('bilpenduduk'),				
				'pos_bil_kampung'	=>$this->input->post('bilkampung'),				
				'pos_modifiedby'	=>get_cookie('_userID'),				
				'pos_modifiedat'	=>date("Y-m-d H:i:s"),				
			);
		$this->db->where("pos_id",$id);
		$this->db->update("pro_pos",$data);

		$this->blapps_lib->addEvent("Kemaskini Data Pos ID = $id ".strtoupper($this->input->post('namapos'))." ");
	}
	function getSubInstitusi(){
		$this->db->where("sub_id",base64_decode($this->uri->segment(4)));
		$this->db->from('ek_subinstitution');
		$query = $this->db->get();
		return $query->row();
	}
	function updateSubinstitution(){
		$data = array(
				'id_institution'=>$this->input->post('institusi'),
				'sub_code'		=>$this->input->post('kod'),				
				'sub_name'		=>$this->input->post('nama'),				
				'sub_address'	=>$this->input->post('alamat'),				
				'sub_phoneno'	=>$this->input->post('phoneno'),				
				'sub_description'=>$this->input->post('description'),				
				'sub_modifiedby'=>get_cookie('_userID'),				
				'sub_modifiedat'=>date("Y-m-d H:i:s"),				
				'sub_status'	=>$this->input->post('status'),				
			);
		$this->db->where("sub_id",base64_decode($this->input->post('id')));
		$this->db->update("ek_subinstitution",$data);
	}
	function removeSubInstitution(){
		$this->db->where("sub_id",base64_decode($this->uri->segment(4)));
		$this->db->delete("ek_subinstitution");
	}
	// Topic
	function insertMaintopic($path){
		$data = array(
				'topic_name'		=>$this->input->post('topic'),
				'topic_desc'		=>$this->input->post('description'),				
				'topic_link'		=>$path,				
			);
		$this->db->insert("tb_topic",$data);
	}
	function insertVillage(){
		$data = array(
				'kg_pos_id'		=>$this->input->post('pos'),
				'kg_nama'		=>$this->input->post('namakampung'),				
				'kg_latitud'	=>$this->input->post('latitud'),				
				'kg_longitud'	=>$this->input->post('longitud'),				
				'kg_sejarah'	=>$this->input->post('sejarah'),
				'kg_createdby'	=>get_cookie('_userID'),				
				'kg_created'	=>date("Y-m-d H:i:s"),				
				'kg_modifiedby'	=>get_cookie('_userID'),				
				'kg_modified'	=>date("Y-m-d H:i:s"),
			);
		$this->db->insert("pro_kampung",$data);
		$newID = $this->db->insert_id();
		
		foreach($this->input->post('kemudahan') as $row){
			$this->db->insert("pro_kampung_kemudahan",array('pkk_kampung'=>$newID,'pkk_kemudahan'=>$row));
		}
		foreach($this->input->post('pusatibadat') as $row){
			$this->db->insert("pro_kampung_ibadat",array('pki_kampung'=>$newID,'pki_ibadat'=>$row));
		}
		foreach($this->input->post('sumberpendapatan') as $row){
			$this->db->insert("pro_kampung_sumber",array('pks_kampung'=>$newID,'pks_sumber'=>$row));
		}
		foreach($this->input->post('sumberair') as $row){
			$this->db->insert("pro_kampung_air",array('pka_kampung'=>$newID,'pka_sumberair'=>$row));
		}
		foreach($this->input->post('elektrik') as $row){
			$this->db->insert("pro_kampung_elektrik",array('pke_kampung'=>$newID,'pke_elektrik'=>$row));
		}
		
	}
	function updatevillage(){
		$data = array(
				'kg_pos_id'		=>$this->input->post('pos'),
				'kg_nama'		=>$this->input->post('namakampung'),
				'kg_latitud'	=>$this->input->post('latitud'),				
				'kg_longitud'	=>$this->input->post('longitud'),				
				'kg_sejarah'	=>$this->input->post('sejarah'),
				'kg_modifiedby'	=>get_cookie('_userID'),				
				'kg_modified'	=>date("Y-m-d H:i:s"),				
			);
		
		$newID = base64_decode($this->uri->segment(4));
		$this->db->where("kg_id",$newID);
		$this->db->update("pro_kampung",$data);
		
		
		$this->db->where("pkk_kampung",$newID);
		$this->db->delete("pro_kampung_kemudahan");
		
		$this->db->where("pki_kampung",$newID);
		$this->db->delete("pro_kampung_ibadat");
		
		$this->db->where("pks_kampung",$newID);
		$this->db->delete("pro_kampung_sumber");
		
		$this->db->where("pka_kampung",$newID);
		$this->db->delete("pro_kampung_air");
		
		$this->db->where("pke_kampung",$newID);
		$this->db->delete("pro_kampung_elektrik");
		
		foreach($this->input->post('kemudahan') as $row){
			$this->db->insert("pro_kampung_kemudahan",array('pkk_kampung'=>$newID,'pkk_kemudahan'=>$row));
		}
		foreach($this->input->post('pusatibadat') as $row){
			$this->db->insert("pro_kampung_ibadat",array('pki_kampung'=>$newID,'pki_ibadat'=>$row));
		}
		foreach($this->input->post('sumberpendapatan') as $row){
			$this->db->insert("pro_kampung_sumber",array('pks_kampung'=>$newID,'pks_sumber'=>$row));
		}
		foreach($this->input->post('sumberair') as $row){
			$this->db->insert("pro_kampung_air",array('pka_kampung'=>$newID,'pka_sumberair'=>$row));
		}
		foreach($this->input->post('elektrik') as $row){
			$this->db->insert("pro_kampung_elektrik",array('pke_kampung'=>$newID,'pke_elektrik'=>$row));
		}
		
		
	}
	function getVillage(){
		$this->db->where("kg_id",base64_decode($this->uri->segment(4)));
		$this->db->from('pro_kampung');
		$query = $this->db->get();
		return $query->row();
	}
	function getContribution(){
		$this->db->where("lookup_id",base64_decode($this->uri->segment(4)));
		$this->db->from('pro_lookup');
		$query = $this->db->get();
		return $query->row();
	}
	function getorganizer(){
		$this->db->where("agensi_id",base64_decode($this->uri->segment(4)));
		$this->db->from('pro_agensi');
		$query = $this->db->get();
		return $query->row();
	}
	
	
	function getMainTopic(){
		$this->db->where("topic_id",base64_decode($this->uri->segment(4)));
		$this->db->from('tb_topic');
		$query = $this->db->get();
		return $query->row();
	}
	function updateMainTopic($path){
		if($path == ""){
		$data = array(
				'topic_name'		=>$this->input->post('topic'),
				'topic_desc'		=>$this->input->post('description'),	
			);
		}else{
			$data = array(
				'topic_name'		=>$this->input->post('topic'),
				'topic_desc'		=>$this->input->post('description'),	
				'topic_link'		=>$path,
			);
		}
		$this->db->where("topic_id",base64_decode($this->input->post('id')));
		$this->db->update("tb_topic",$data);
	}
	function removeMaintopic(){
		$this->db->where("topic_id",base64_decode($this->uri->segment(4)));
		$this->db->delete("tb_topic");
	}
	function selectpos(){
		$result = $this->db->order_by("pos_name","ASC")
                     ->get("pro_pos");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->pos_id] =  $dt->pos_name;
	    }
	    return $data;
	}
	function selectTopic(){
		$result = $this->db->order_by("topic_id","ASC")
                     ->get("tb_topic");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->topic_id] =  $dt->topic_name;
	    }
	    return $data;
	}
	function insertEthnic(){
		$data = array(
				'sukukaum_name'		=>$this->input->post('namasukukaum'),
				'sukukaum_etnik'		=>$this->input->post('etnik'),							
			);
		$this->db->insert("pro_sukukaum",$data);
	}
	function insertdistrict(){
		$data = array(
				'daerah_name'		=>$this->input->post('nama'),
			);
		$this->db->insert("pro_daerah",$data);
	}
	function insertContribution(){
		$data = array(
				'lookup_desc'		=>$this->input->post('namaagensi'),
				'lookup_type'		=>"agensi-sumbangan",							
			);
		$this->db->insert("pro_lookup",$data);
	}
	function insertorganizer(){
		$data = array(
				'agensi_name'		=>$this->input->post('namaagensi'),
				'agensi_address'	=>$this->input->post('alamat'),							
				'agensi_phone'		=>$this->input->post('notel'),							
				'agensi_type'		=>$this->input->post('kategori'),							
				'agensi_desc'		=>$this->input->post('keterangan')					
			);
		$this->db->insert("pro_agensi",$data);
	}
	function updateorganizer(){
		$data = array(
				'agensi_name'		=>$this->input->post('namaagensi'),
				'agensi_address'	=>$this->input->post('alamat'),							
				'agensi_phone'		=>$this->input->post('notel'),							
				'agensi_type'		=>$this->input->post('kategori'),							
				'agensi_desc'		=>$this->input->post('keterangan')					
			);
		$this->db->where("agensi_id",base64_decode($this->input->post('id')));
		$this->db->update("pro_agensi",$data);
	}
	function getpos(){
		$this->db->where("pos_id",base64_decode($this->uri->segment(4)));
		$this->db->from('pro_pos');
		$query = $this->db->get();
		return $query->row();
	}
	function getEthnic(){
		$this->db->where("sukukaum_id",base64_decode($this->uri->segment(4)));
		$this->db->from('pro_sukukaum');
		$query = $this->db->get();
		return $query->row();
	}
	function updateEthnic(){
		$data = array(
				'sukukaum_status'	=>$this->input->post('status'),				
				'sukukaum_name'	=>$this->input->post('namasukukaum'),				
				'sukukaum_etnik'	=>$this->input->post('etnik'),				
			);
		$this->db->where("sukukaum_id",base64_decode($this->input->post('id')));
		$this->db->update("pro_sukukaum",$data);
	}
	function updateContribution(){
		$data = array(
				'lookup_desc'	=>$this->input->post('namaagensi'),				
			);
		$this->db->where("lookup_id",base64_decode($this->input->post('id')));
		$this->db->update("pro_lookup",$data);
	}
	function removeContribution(){
		$this->db->where("lookup_id",base64_decode($this->uri->segment(4)));
		$this->db->delete("pro_lookup");
	}
	function removeTopic(){
		$this->db->where("topic_institution_id",base64_decode($this->uri->segment(4)));
		$this->db->delete("tb_topic_institution");
	}
	function removeAudio(){
		$this->db->where("topic_id",base64_decode($this->uri->segment(4)));
		$this->db->update("tb_topic",array('topic_link'=>''));
	}
	
	function removeLogo(){
		$this->db->where("ins_id",base64_decode($this->uri->segment(4)));
		$this->db->update("ek_institution",array('ins_link'=>''));
	}
	
	
	
	
	
	
	
	
	function selectkategori(){
		$result = $this->db->order_by("type_desc","ASC")
                     ->get("pro_agensi_type");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->type_id] = $dt->type_desc;
	    }
	    return $data;
	}
	function selectInstitusi(){
		$this->db->where("ins_active",1);
		$result = $this->db->order_by("ins_id","ASC")
                     ->get("ek_institution");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->ins_id] = $dt->ins_code." - ".$dt->ins_name;
	    }
	    return $data;
	}
	function selectlokasi(){
		$this->db->where("daerah_status",1);
		$result = $this->db->order_by("daerah_id","ASC")
                     ->get("pro_daerah");
		$data['']=' - Sila Pilih - ';
	    foreach($result->result() as $dt)
	    {
	        $data[$dt->daerah_id ] = $dt->daerah_name;
	    }
	    return $data;
	}
	
	
	function updateLessonFile($filename){
		$link = $this->blapps_lib->getData("tea_link","tb_teaching","tea_id",base64_decode($this->input->post('lessonid')));
		if($link !="") unlink("./".$link);
		
		$data = array(
				'tea_link'		=>$filename,
				
			);
			
		$this->db->where("tea_id",base64_decode($this->input->post('lessonid')));
		$this->db->update("tb_teaching",$data);
		
	}
	
	
	
}



?>