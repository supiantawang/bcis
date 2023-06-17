<?php
if($this->uri->segment(4)){
	$title 		= "Kemaskini";
	$action 	= "community/update/issue/".$this->uri->segment(4);
	$vkampung	= $air->isu_kg;
	$vjenis		= $air->isu_type;
	$vtarikh	= $air->isu_date;
	$visu 		= $air->isu_title;
	$vketerangan= $air->isu_remarks;
	
}else{
	$title 		= "Tambah Baru";
	$action 	= "community/create/issue";
	$vkampung 	= "";
	$vjenis 	= "";
	$vtarikh 	= "";
	$visu 		= "";
	$vketerangan = "";
	
	
	
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
              <h3 class="box-title">Maklumat Isu Dalam Komuniti</h3>
            </div>
            <?php echo form_open_multipart($action); ?>
              <div class="box-body">
                
               
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Kampung <font color="red">*</font></label>
						  <?php echo form_dropdown("kampung",$kampung,$vkampung,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Jenis Isu <font color="red">*</font></label>
						  <?php echo form_dropdown("jenis",$pro_isu_type,$vjenis,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Tarikh </label>
						  <?php echo form_input("tarikh",$vtarikh,"class='form-control' required")?>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="inputKategori">Isu <font color="red">*</font></label>
						  <?php echo form_input("isu",$visu,"class='form-control' required")?>
						</div>
					</div>
					
					
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="inputKategori">Keterangan</label>
						  <?php echo form_textarea("keterangan",$vketerangan,"class='form-control' ")?>
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