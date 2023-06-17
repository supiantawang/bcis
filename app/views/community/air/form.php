<?php
if($this->uri->segment(4)){
	$title 		= "Kemaskini";
	$action 	= "community/update/air/".$this->uri->segment(4);
	$vpos 		= $air->u_pos_id;
	$vkg 		= $air->u_kg_id;
	$vname 		= $air->u_full_name;
	$vinco 		= $air->u_ic_number;
	$vgender 	= $air->u_gender;
	$vreligion 	= $air->u_religion;
	$vreligione	= $air->u_edureligion;
	$vetnik 	= $air->u_tribes;
	$voppur 	= $air->u_employment;
	$veducation	= $air->u_education;
	$vincome 	= $air->u_income;
	$vpenghulu 	= $air->u_penghulu;
	$vstatus 	= $air->u_status;
	$vkir	 	= $air->u_parent;
	$vislamdate	= $air->u_islamdate;

	$alert		= "";
	$disabled	= "";
	if(get_cookie("_urole") != 1 && get_cookie("_userID") != $air->u_createdby){
	
	$alert		= "<small class=\"text-red\"><b>Data boleh dikemaskini oleh pengguna yang mencipta data ini sahaja.</b></small>";
	$disabled	= "disabled";
	}

	if($vreligion == 1){//agama islam sahaja
		$style = "";
		if($vislamdate	== "0000-00-00" || $vislamdate	== "" || $vislamdate	== "NULL")
			$vislamdate = "";
		else
			$vislamdate	= $air->u_islamdate;
	}else{
		$style ="style = 'display: none;'";
		$vislamdate	= "";
	}
}else{
	$title 		= "Tambah Baru";
	$action 	= "community/create/air";
	$vpos 		= "";
	$vkg 		= "";
	$vname 		= "";
	$vinco 		= "";
	$vgender 	= "";
	$vreligion 	= "";
	$vreligione	= "4";
	$vislamdate	= "";
	$vetnik 	= "";
	$voppur 	= "";
	$veducation = "4";
	$vincome 	= "";
	$vpenghulu 	= "3";
	$vstatus 	= "1";
	$vkir	 	= "";
	
	$style 		="style = 'display: none;' ";
	$alert		= "";
	$disabled	= "";
}

?>
<section class="content-header">
  <h1>
    <div class="btn btn-sm btn-default" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></div> <?php echo $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Profil Orang Asli</a></li>
    <li><a href="#">Ahli Isi Rumah</a></li>
    <li class="active"><?php echo $title ?></li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Ahli Isi Rumah</h3>
            </div>
            <?php echo form_open_multipart($action); ?>
              <div class="box-body">
                
               
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Ketua Isi Rumah (KIR) <font color="red">*</font></label>
						  <?php echo form_dropdown("kir",$kir,$vkir,"class='form-control select2' required")?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tukar Status Kepada KIR</label>
							  <div class="radio">
								<label> <input type="radio" name="statuskir" id="statuskir1" value="1"> Ya </label>
							  </div>
							  <div class="radio">
								<label> <input type="radio" name="statuskir" id="statuskir2" value="2" checked> Tidak</label>
							  </div>
							 
							  
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">No Kad Pengenalan <font color="red">*</font><small>(masukkan nombor tanpa "-")</small></label>
						  <?php echo form_input("noic",$vinco,"class='form-control' maxlength='12'  id='noic' required")?>
						  <label id="label-alert"><small class="text-red"><div  id="red-alert"></div></small></label>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
						  <label for="inputKategori">Nama <font color="red">*</font></label>
						  <?php echo form_input("nama",$vname,"class='form-control' required")?>
						</div>
					</div>
					
					
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Jantina <font color="red">*</font></label>
						  <?php echo form_dropdown("jantina",array('M'=>'LELAKI','F'=>'PEREMPUAN'),$vgender,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Suku Kaum <font color="red">*</font></label>
							<?php echo form_dropdown("sukukaum",$sukukaum,$vetnik,"class='form-control' required")?>
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Agama <font color="red">*</font></label>
							<?php echo form_dropdown("agama",$agama,$vreligion,"class='form-control' id='agama' required")?>
						</div>

						<div id='div-tarikhagama' <?php echo $style ?>>
						<div class="form-group">
							<label for="exampleInputFile">Tarikh pengislaman</label>
								<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
									<?php echo form_input("tarikhislam",$vislamdate,"class='form-control pull-right' id='datepicker'  autocomplete='off'")?>
								</div>
						</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Penghayatan Agama</label>
							<?php echo form_dropdown("penghayatan",array('RENDAH'=>'RENDAH','SEDERHANA'=>'SEDERHANA','TINGGI'=>'TINGGI'),$vetnik,"class='form-control'")?>
						</div>
					</div>
				</div>				
				<div class="row">
				<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Pendidikan Formal</label>
						  <?php echo form_dropdown("pendidikan",$education,$veducation,"class='form-control'")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="inputKategori">Pendidikan Agama</label>
							<?php echo form_dropdown("pendidikanagama",$pendidikanagama,$vreligione,"class='form-control'")?>
						</div>
					</div>
				</div>				
				<div class="row">
				<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Sumber Pendapatan </label>						  
						  <?php
						  $sumber = $this->blapps_lib->getDataResult("pro_pendapatan",array(),"",array("pendapatan_id","ASC"));
						 
						  foreach($sumber as $rec){
							$cek = "";
							if($this->uri->segment(4)) {
								$ada = $this->blapps_lib->getDataResult("pro_penduduk_pendapatan",array(array("ppi_penduduk",base64_decode($this->uri->segment(4))),array("ppi_pendapatan",$rec->pendapatan_id)),"",array("ppi_id","asc"));
								
								if(count($ada) > 0)  $cek = "checked";
							}
							echo "<div class=\"checkbox\"> <label> <input type=\"checkbox\" name='sumberpendapatan[]' value='$rec->pendapatan_id' $cek> $rec->pendapatan_desc </label> </div>";
						  }
						  ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Pekerjaan </label>
						  <?php echo form_input("pekerjaan",$voppur,"class='form-control'")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Anggaran Pendapatan (RM)</label>
							<?php echo form_input("pendapatan",$vincome,"class='form-control' placeholder='0.00'")?>
						</div>
					</div>
					
				</div>				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Kepimpinan</label>
							  <div class="radio">
								<label> <input type="radio" name="penghulu" id="penghulu1" value="1" <?php echo  ($vpenghulu == 1) ? "checked" : ""; ?>> Penghulu/ Batin </label>
							  </div>
							  <div class="radio">
								<label> <input type="radio" name="penghulu" id="penghulu3" value="2" <?php echo  ($vpenghulu == 2) ? "checked" : ""; ?>> JPKKOA </label>
							  </div>
							  <div class="radio">
								<label> <input type="radio" name="penghulu" id="penghulu2" value="0" <?php echo  ($vpenghulu == 0) ? "checked" : ""; ?>> Lain-lain </label>
							  </div>
							  <div class="radio">
								<label> <input type="radio" name="penghulu" id="penghulu4" value="3" <?php echo  ($vpenghulu == 3) ? "checked" : ""; ?>> Tiada </label>
							  </div>
							  
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kepimpinan Agama</label>
							<?php
							$leadagama = $this->blapps_lib->getDataResult("pro_leadagama",array(),"",array("leadagama_id","ASC"));
							foreach($leadagama as $rec){
								$cek = "";
								if($this->uri->segment(4)) {
									$ada = $this->blapps_lib->getDataResult("pro_penduduk_leadagama",array(array("ppl_penduduk",base64_decode($this->uri->segment(4))),array("ppl_leadagama",$rec->leadagama_id)),"",array("ppl_id","asc"));
									
									if(count($ada) > 0)  $cek = "checked";
								}
								echo "<div class=\"checkbox\"> <label> <input type=\"checkbox\" name='religionleader[]' value='$rec->leadagama_id' $cek> $rec->leadagama_desc </label> </div>";
							}
							?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Status di Kampung</label>
							  <div class="radio">
								<label> <input type="radio" name="status" id="penghulu1" value="1" <?php echo  ($vstatus == 1) ? "checked" : ""; ?>> Aktif </label>
							  </div>
							  <div class="radio">
								<label> <input type="radio" name="status" id="penghulu2" value="2" <?php echo  ($vstatus == 2) ? "checked" : ""; ?>> Pindah</label>
							  </div>
							  <div class="radio">
								<label> <input type="radio" name="status" id="penghulu3" value="3" <?php echo  ($vstatus == 3) ? "checked" : ""; ?>> Mati</label>
							  </div>
							  
						</div>
					</div>
				</div>				
							
				
              </div>

              <div class="box-footer">
				<div class="col-sm-2 col-md-offset-8">
					<button type="button" class="btn btn-block btn-default" onclick="history.go(-1)">Batal</button>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-block btn-primary" <?php echo $disabled?>>Simpan</button>
					<?php echo $alert?>
				</div>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>