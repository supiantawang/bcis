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
              <h3 class="box-title">Maklumat Suku Kaum</h3>
            </div>
            <?php echo form_open_multipart("management/create/ethnic"); ?>
              <div class="box-body">
                
               
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="inputKategori">Nama Suku Kaum <font color="red">*</font></label>
						   <?php echo form_input("namasukukaum","","class='form-control' required")?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="inputKategori">Etnik <font color="red">*</font></label>
						  <?php echo form_dropdown("etnik",array('NEGRITO'=>'NEGRITO','SENOI'=>'SENOI','MELAYU-PROTO'=>'MELAYU-PROTO'),"","class='form-control' required")?>
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