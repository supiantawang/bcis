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
              <h3 class="box-title"> Maklumat Suku Kaum</h3>
            </div>
            <?php echo form_open_multipart("management/update/ethnic"); ?>
              <div class="box-body">
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Nama Suku Kaum <font color="red">*</font></label>
						  <?php echo form_input("namasukukaum",$ethnic->sukukaum_name,"class='form-control' required")?>
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputFile">Etnik <font color="red">*</font></label>
						  <?php echo form_dropdown("etnik",array('NEGRITO'=>'NEGRITO','SENOI'=>'SENOI','MELAYU-PROTO'=>'MELAYU-PROTO'),$ethnic->sukukaum_etnik,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputFile">Status <font color="red">*</font></label>
						  <?php echo form_dropdown("status",array('0'=>'Tidak Aktif','1'=>'Aktif'),$ethnic->sukukaum_status,"class='form-control' required")?>
						</div>
					</div>
					
					
				</div>			
				
              </div>

              <div class="box-footer">
				<?php echo form_hidden("id",base64_encode($ethnic->sukukaum_id))?>
                <button type="button" class="btn btn-default" onclick="history.go(-1)">Batal</button>
                <button type="submit" class="btn btn-primary">Kemaskini</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>