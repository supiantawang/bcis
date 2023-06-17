<?php
if($this->uri->segment(4)){
	$title 		= "Kemaskini";
	$action 	= "management/update/village/".$this->uri->segment(4);
	$vpos 		= $village->kg_pos_id;
	$vname 		= $village->kg_nama;
	$vlat 		= $village->kg_latitud;
	$vlong 		= $village->kg_longitud;
	$vhistory	= $village->kg_sejarah;

}else{
	$title 		= "Tambah Baru";
	$action 	= "management/create/village";
	$vpos 		= "";
	$vname 		= "";
	$vlat 		= "";
	$vlong 		= "";
	$vhistory	= "";
	
}

?>

<section class="content-header">
  <h1>
    <div class="btn btn-sm btn-default" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></div> <?php echo $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Pengurusan</a></li>
    <li class="active"><?php echo $title ?></li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Kampung</h3>
            </div>
            <?php echo form_open_multipart($action); ?>
				<div class="box-body">
                
               
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Pos <font color="red">*</font></label>
						  <?php echo form_dropdown("pos",$pos,$vpos,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Nama Kampung <font color="red">*</font></label>
						  <?php echo form_input("namakampung",$vname,"class='form-control' required")?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Koordinat Latitud</label>
						  <?php echo form_input("latitud",$vlat,"class='form-control'")?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Koordinat Longitud</label>
						  <?php echo form_input("longitud",$vlong,"class='form-control'")?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="inputKategori">Sejarah Kampung </label>
						  <?php echo form_textarea("sejarah",$vhistory,"class='form-control'")?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="exampleInputFile">Kemudahan Awam</label>
							<?php
							$lookup = $this->blapps_lib->getDataResult("pro_lookup",array(array("lookup_type","kemudahan-awam")),"",array("lookup_id","ASC"));
							
							foreach($lookup as $rec){
							$cek = "";
							if($this->uri->segment(4)) {
								$ada = $this->blapps_lib->getDataResult("pro_kampung_kemudahan",array(array("pkk_kampung",base64_decode($this->uri->segment(4))),array("pkk_kemudahan",$rec->lookup_id)),"",array("pkk_id","asc"));
								
								if(count($ada) > 0)  $cek = "checked";
							}
							echo "<div class=\"checkbox\"> <label> <input type=\"checkbox\" name='kemudahan[]' value='$rec->lookup_id' $cek> $rec->lookup_desc </label> </div>";
							}
							?>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="exampleInputFile">Sumber Air</label>
							<?php
							$lookup = $this->blapps_lib->getDataResult("pro_lookup",array(array("lookup_type","sumber-air")),"",array("lookup_id","ASC"));
							
							foreach($lookup as $rec){
							$cek = "";
							if($this->uri->segment(4)) {
								$ada = $this->blapps_lib->getDataResult("pro_kampung_air",array(array("pka_kampung",base64_decode($this->uri->segment(4))),array("pka_sumberair",$rec->lookup_id)),"",array("pka_id","asc"));
								
								if(count($ada) > 0)  $cek = "checked";
							}
							echo "<div class=\"checkbox\"> <label> <input type=\"checkbox\" name='sumberair[]' value='$rec->lookup_id' $cek> $rec->lookup_desc </label> </div>";
							}
							?>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="exampleInputFile">Bekalan Elektrik</label>
							<?php
							$lookup = $this->blapps_lib->getDataResult("pro_lookup",array(array("lookup_type","bekalan-elektrik")),"",array("lookup_id","ASC"));
							
							foreach($lookup as $rec){
							$cek = "";
							if($this->uri->segment(4)) {
								$ada = $this->blapps_lib->getDataResult("pro_kampung_elektrik",array(array("pke_kampung",base64_decode($this->uri->segment(4))),array("pke_elektrik",$rec->lookup_id)),"",array("pke_id","asc"));
								
								if(count($ada) > 0)  $cek = "checked";
							}
							echo "<div class=\"checkbox\"> <label> <input type=\"checkbox\" name='elektrik[]' value='$rec->lookup_id' $cek> $rec->lookup_desc </label> </div>";
							}
							?>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="exampleInputFile">Pusat Ibadat</label>
							<?php
							$lookup = $this->blapps_lib->getDataResult("pro_lookup",array(array("lookup_type","pusat-ibadat")),"",array("lookup_id","ASC"));
							
							foreach($lookup as $rec){
							$cek = "";
							if($this->uri->segment(4)) {
								$ada = $this->blapps_lib->getDataResult("pro_kampung_ibadat",array(array("pki_kampung",base64_decode($this->uri->segment(4))),array("pki_ibadat",$rec->lookup_id)),"",array("pki_id","asc"));
								
								if(count($ada) > 0)  $cek = "checked";
							}
							echo "<div class=\"checkbox\"> <label> <input type=\"checkbox\" name='pusatibadat[]' value='$rec->lookup_id' $cek> $rec->lookup_desc </label> </div>";
							}
							?>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="exampleInputFile">Sumber Pendapatan </label>
							<?php
							$lookup = $this->blapps_lib->getDataResult("pro_lookup",array(array("lookup_type","sumber-pendapatan")),"",array("lookup_id","ASC"));
							
							foreach($lookup as $rec){
							$cek = "";
							if($this->uri->segment(4)) {
								$ada = $this->blapps_lib->getDataResult("pro_kampung_sumber",array(array("pks_kampung",base64_decode($this->uri->segment(4))),array("pks_sumber",$rec->lookup_id)),"",array("pks_id","asc"));
								
								if(count($ada) > 0)  $cek = "checked";
							}
							echo "<div class=\"checkbox\"> <label> <input type=\"checkbox\" name='sumberpendapatan[]' value='$rec->lookup_id' $cek> $rec->lookup_desc </label> </div>";
							}
							?>
							
						</div>
					</div>
					
				</div>
							
				
              </div>

              <div class="box-footer">
				<div class="col-sm-2 col-md-offset-8">
					<button type="button" class="btn btn-block btn-default" onclick="history.go(-1)">Batal</button>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-block btn-primary">Simpan</button>
				</div>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>