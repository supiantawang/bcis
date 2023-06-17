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
              <h3 class="box-title">Maklumat Agensi Penganjur</h3>
            </div>
            <?php echo form_open_multipart("management/create/organizer"); ?>
              <div class="box-body">
                
               
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Nama Agensi <font color="red">*</font></label>
						   <?php echo form_input("namaagensi","","class='form-control' required")?>
						</div>
					</div>
          <div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Kategori Agensi <font color="red">*</font></label>
						   <?php echo form_dropdown("kategori",$kategori,"","class='form-control' required")?>
						</div>
					</div>
          
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Alamat</label>
						   <?php echo form_input("alamat","","class='form-control'")?>
						</div>
					</div>
          <div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">No Telefon</label>
						   <?php echo form_input("notel","","class='form-control'")?>
						</div>
					</div>
          
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Keterangan</label>
						   <?php echo form_textarea("keterangan","","class='form-control'")?>
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