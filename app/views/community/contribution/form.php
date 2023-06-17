<?php
if($this->uri->segment(4)){
	$title 		= "Kemaskini";
	$action 	= "community/update/contribution/".$this->uri->segment(4);
	$vpenyumbang= $con->ps_penyumbang;
	$vpenerima	= $con->ps_penerima;
	$vjumlah	= $con->ps_jumlah;
	$vsdate		= $con->ps_sdate;
	$vedate		= $con->ps_edate;
	$vtype		= $con->ps_jenis;
	$vketerangan= $con->ps_keterangan;
	
	$alert		= "";
	$disabled	= "";
	if(get_cookie("_urole") != 1 && get_cookie("_userID") != $con->ps_createdby){
		$alert		= "<small class=\"text-red\"><b>Data boleh dikemaskini oleh pengguna yang mencipta data ini sahaja.</b></small>";
		$disabled	= "disabled";
	}

}else{
	$title 		= "Tambah Baru";
	$action 	= "community/create/contribution";
	$vpenyumbang= "";
	$vpenerima	= "";
	$vjumlah 	= "";
	$vsdate		= "";
	$vedate		= "";
	$vtype		= "";
	$vketerangan= "";
	
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
    <li><a href="#">Isu</a></li>
    <li class="active"><?php echo $title ?></li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Penerima Bantuan</h3>
            </div>
            <?php echo form_open_multipart($action); ?>
              <div class="box-body">
                
               
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Agensi Penyumbang  <font color="red">*</font></label>
						  <?php echo form_dropdown("penyumbang",$penyumbang,$vpenyumbang,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Nama Penerima <font color="red">*</font></label>
						  <?php echo form_dropdown("penerima",$penerima,$vpenerima,"class='form-control select2' required")?>
						</div>
					</div>
					
					
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						  <label for="inputKategori">Kekerapan Sumbangan <font color="red">*</font></label>
						  <div class="radio">
								<label> <input type="radio" name="jenis" id="jenis1" value="1" required <?php echo ($vtype==1) ? "checked" : "" ?>> Bulanan </label>
							  </div>
							  <div class="radio">
								<label> <input type="radio" name="jenis" id="jenis2" value="2" <?php echo ($vtype==2) ? "checked" : "" ?>> Sekali Sahaja</label>
							  </div>
						</div>
					</div>
		
					<div class="col-md-3">
						<div class="form-group">
						  <label for="inputKategori">Jumlah (RM) <font color="red">*</font></label>
						  <?php 
						 	$data = array(
								'name' 	=> 'jumlah',
								'id' 	=> 'jumlah',
								'class' => 'form-control',
								'type' 	=> 'number',
								'value' => $vjumlah ,
								'required' => 'required'   
							  ); 
						  	echo form_input($data);
						  ?>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="inputKategori">Tarikh Mula</label>
						  <div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
						  		<?php echo form_input("sdate",$vsdate,"class='form-control datepicker' ")?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="inputKategori">Tarikh Akhir</label>
						  <div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
						 		<?php echo form_input("edate",$vedate,"class='form-control datepicker' ")?>
							</div>
						</div>
					</div>
					
					
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						  <label for="inputKategori">Jenis Sumbangan </label>
						  <?php
						  $jenis = $this->blapps_lib->getDataResult("pro_lookup",array(array("lookup_type","jenis-sumbangan")),"",array("lookup_id","ASC"));
						 
						  foreach($jenis as $rec){
							$cek = "";
							if($this->uri->segment(4)) {
								$ada = $this->blapps_lib->getDataResult("pro_sumbangan_jenis",array(array("psj_sumbangan",base64_decode($this->uri->segment(4))),array("psj_jenis",$rec->lookup_id)),"",array("psj_id","asc"));
								
								if(count($ada) > 0)  $cek = "checked";
							}
							echo "<div class=\"checkbox\"> <label> <input type=\"checkbox\" name='jenissumbangan[]' value='$rec->lookup_id' $cek> $rec->lookup_desc </label> </div>";
						  }
						  ?>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
						  <label for="inputKategori">Keterangan </label>						  
						  <?php echo form_textarea("keterangan",$vketerangan,"class='form-control'");?>
						</div>
					</div>
					
					
					
				</div>
				
							
				
              </div>

              <div class="box-footer">
				<div class="col-md-2 col-md-offset-8">
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