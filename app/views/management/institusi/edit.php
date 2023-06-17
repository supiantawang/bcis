<section class="content-header">
  <h1>
    Kemaskini
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Pengurusan</a></li>
    <li class="active">Kemaskini</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kemaskini Institusi</h3>
            </div>
            <?php echo form_open_multipart("management/update/institution"); ?>
              <div class="box-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						  <label for="inputKategori">Kod Institusi</label>
						  <?php echo form_input("kod",$institusi->ins_code,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
						  <label for="exampleInputFile">Nama Institusi</label>
						 <?php echo form_input("nama",$institusi->ins_name,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputFile">Logo</label>
						 <?php 
								if($institusi->ins_link != ""){
									echo "<img src='".base_url().$institusi->ins_link."' class='img-responsive'>
									<span class='btn btn-block btn-xs btn-danger' onclick=\"deleteThisImage('".base64_encode($institusi->ins_id)."')\">Hapuskan</span>";
								}else{
									echo "<input type=\"file\" name=\"dokumen\" accept=\"image/*\">";
								}
								
							  
							  ?>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputFile">Status</label>
						 <?php echo form_dropdown("active",array('0'=>'Tidak Aktif','1'=>'Aktif'),$institusi->ins_active,"class='form-control' required")?>
						</div>
					</div>
					
				</div>	
				
				
              </div>

              <div class="box-footer">
				<?php echo form_hidden("id",base64_encode($institusi->ins_id))?>
                <button type="button" class="btn btn-default" onclick="history.go(-1)">Batal</button>
                <button type="submit" class="btn btn-primary">Kemaskini</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>