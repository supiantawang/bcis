<section class="content-header">
  <h1>
    Tambah Baru
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Pengurusan</a></li>
    <li class="active">Tambah Baru</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Kampung</h3>
            </div>
            <?php echo form_open_multipart("management/create/topic"); ?>
              <div class="box-body">
                
               
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Pos <font color="red">*</font></label>
						  <?php echo form_dropdown("institusi",$institusi,"","class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Nama Kampung <font color="red">*</font></label>
						  <?php echo form_input("namakampung","","class='form-control' required")?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="inputKategori">Sejarah Kampung </label>
						  <?php echo form_textarea("jenis","","class='form-control' required")?>
						</div>
					</div>
				
					<div class="col-md-4">
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
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Sumber Air</label>
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
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Bekalan Elektrik</label>
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
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Pusat Ibadat</label>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="pusatibadah"> 
								<span class="form-check-label">Masjid</span>
							</div>
							
							<div class="form-check">
								  <input class="form-check-input" type="checkbox" name="pusatibadah">
								  <span class="form-check-label">Surau</span>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Sumber Pendapatan </label>
							<?php
							$lookup = $this->blapps_lib->getDataResult("pro_lookup",array(array("lookup_type","sumber-pendapatan")),"",array("lookup_id","ASC"));
							
							foreach($lookup as $rec){
							$cek = "";
							if($this->uri->segment(4)) {
								$ada = $this->blapps_lib->getDataResult("pro_kampung_kemudahan",array(array("pkk_kampung",base64_decode($this->uri->segment(4))),array("pkk_kemudahan",$rec->lookup_id)),"",array("pkk_id","asc"));
								
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
                <button type="button" class="btn btn-default" onclick="history.go(-1)">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>