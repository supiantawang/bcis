<?php
if($this->uri->segment(4)){
	$title 		= "Kemaskini";
	$action 	= "community/update/kir/".$this->uri->segment(4);
	$vpos 		= $kir->u_pos_id;
	$vkg 		= $kir->u_kg_id;
	$vlat 		= $kir->u_latitud;
	$vlong 		= $kir->u_longitud;
	$vname 		= $kir->u_full_name;
	$vinco 		= $kir->u_ic_number;
	$vgender 	= $kir->u_gender;
	$vreligion 	= $kir->u_religion;
	$vetnik 	= $kir->u_tribes;
	$veducation	= $kir->u_education;
	$vreligione	= $kir->u_edureligion;
	$voppur 	= $kir->u_employment;
	$vincome 	= $kir->u_income;
	$vpenghulu 	= $kir->u_penghulu;
	$vreligionl	= $kir->u_penghulu;
	$vstatus 	= $kir->u_status;
	$vislamdate	= $kir->u_islamdate;
	$vibadat	= $kir->u_sta_tempat_ibadat;

	$alert		= "";
	$disabled	= "";
	if(get_cookie("_urole") != 1 && get_cookie("_userID") != $kir->u_createdby){
		$alert		= "<small class=\"text-red\"><b>Data boleh dikemaskini oleh pengguna yang mencipta data ini sahaja.</b></small>";
		$disabled	= "disabled";
	}

	if($vreligion == 1){//agama islam sahaja
		$style = "";
		if($vislamdate	== "0000-00-00" || $vislamdate	== "" || $vislamdate	== "NULL")
			$vislamdate = "";
		else
			$vislamdate	= $kir->u_islamdate;
	}else{
		$style ="style = 'display: none;'";
		$vislamdate	= "";
	}
}else{
	$title 		= "Tambah Baru";
	$action 	= "community/create/kir";
	$vpos 		= "";
	$vkg 		= "";
	$vlat 		= "";
	$vlong 		= "";
	$vname 		= "";
	$vinco 		= "";
	$vgender 	= "";
	$vreligion 	= "";
	$vislamdate	= "";
	$vetnik 	= "";
	$veducation	= "4";
	$vreligione	= "4";
	$voppur 	= "";
	$vincome 	= "";
	$vpenghulu 	= "3";
	$vreligionl = "";
	$vstatus 	= "1";
	$vibadat	= "";
	
	$style 		="style = 'display: none;' ";
	$alert		= "";
	$disabled	= "";
	
}

?>


<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card box-primary">
            <div class="card-header with-border">
              <h3 class="card-title">Maklumat Ketua Isi Rumah</h3>
            </div>
            <?php echo form_open_multipart($action); ?>
              <div class="card-body">
                
               
				<div class="row">
					<!-- <div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Pos <font color="red">*</font> <i class="fa fa-info-circle" data-toggle='tooltip' data-placement='top' title='Jika tiada, sila tambah maklumat di menu Pengurusan > Pos'></i></label>
						  <?php echo form_dropdown("pos",$pos,$vpos,"class='form-control' required")?>
						</div>
					</div> -->
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Kampung <font color="red">*</font> </label>
						  <?php echo form_dropdown("kampung",$kampung,$vkg,"class='form-control select2' required")?>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="inputKategori">Koordinat Latitud</label>
						  <?php echo form_input("latitud",$vlat,"class='form-control'")?>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="inputKategori">Koordinat Longitud</label>
						  <?php echo form_input("longitud",$vlong,"class='form-control'")?>
						</div>
					</div>
					
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">No Kad Pengenalan  <font color="red">*</font><small>(masukkan nombor tanpa "-")</small></label>
						  <?php echo form_input("noic",$vinco,"class='form-control' maxlength='12' id='noic' required")?>
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
									<?php echo form_input("tarikhislam",$vislamdate,"class='form-control pull-right' autocomplete='off' id='datepicker'")?>
								</div>
						</div>
						</div>
						
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Penghayatan Agama</label>
							<?php echo form_dropdown("penghayatan",array('RENDAH'=>'RENDAH','SEDERHANA'=>'SEDERHANA','TINGGI'=>'TINGGI','TIADA PENGHAYATAN AGAMA'=>'TIADA PENGHAYATAN AGAMA'),$vetnik,"class='form-control'")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Pendidikan Formal</label>
						  <?php echo form_dropdown("tahappendidikan",$education,$veducation,"class='form-control'")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="inputKategori">Pendidikan Agama</label>
							<?php echo form_dropdown("pendidikanagama",$pendidikanagama,$vreligione,"class='form-control'")?>
							<?php
							/* $sumber = $this->blapps_lib->getDataResult("pro_pendidikan",array(),"",array("pendidikan_id","ASC"));
							foreach($sumber as $rec){
								$cek = "";
								if($this->uri->segment(4)) {
									$ada = $this->blapps_lib->getDataResult("pro_penduduk_pendidikan",array(array("ppp_penduduk",base64_decode($this->uri->segment(4))),array("ppp_pendidikan",$rec->pendidikan_id)),"",array("ppp_id","asc"));
									
									if(count($ada) > 0) 
										$cek = "checked";
								}
								echo "<div class=\"checkbox\"> <label> <input type=\"checkbox\" name='pendidikan[]' value='$rec->pendidikan_id' $cek> $rec->pendidikan_desc</label> </div>";
							} */
							?>
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
					
					<div class="col-md-2">
						<div class="form-group">
							<label>Kepimpinan </label>
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
					<div class="col-md-2">
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
					<div class="col-md-2">
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
					<div class="col-md-3">
						<div class="form-group">
							<label>Kemudahan Tempat Ibadat</label>
							<?php
							$sumber = $this->blapps_lib->getDataResult("pro_lookup",array(array("lookup_type","kemudahan-ibadat")),"",array("lookup_id","ASC"));
							foreach($sumber as $rec){
								$cek = "";
								
								if($rec->lookup_id == 46){
									$cek = "checked";
								}
								if( $rec->lookup_id == $vibadat){
									$cek = "checked";
								}
								echo "<div class=\"radio\"> <label> <input type=\"radio\" name='tempatibadat' value='$rec->lookup_id' $cek> $rec->lookup_desc </label> </div>";
							}
							?>
							  
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Ikon/bakat</label>
							<?php
							$sumber = $this->blapps_lib->getDataResult("pro_bakat",array(),"",array("bakat_id","ASC"));
							foreach($sumber as $rec){
								$cek = "";
								if($this->uri->segment(4)) {
									$ada = $this->blapps_lib->getDataResult("pro_penduduk_bakat",array(array("ppb_penduduk",base64_decode($this->uri->segment(4))),array("ppb_bakat",$rec->bakat_id)),"",array("ppb_id","asc"));
									
									if(count($ada) > 0)  $cek = "checked";
								}
								echo "<div class=\"checkbox\"> <label> <input type=\"checkbox\" name='bakat[]' value='$rec->bakat_id' $cek> $rec->bakat_desc </label> </div>";
							}
							?>
							  
						</div>
					</div>
				</div>				
							
				
              </div>

              <div class="card-footer">
					<button type="button" class="btn btn-block1 btn-default" onclick="history.go(-1)">Batal</button>
					<button type="submit" class="btn btn-block1 btn-primary" <?php echo $disabled?>>Simpan</button>
					<?php echo $alert?>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>
