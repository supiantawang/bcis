<section class="content-header">
  <h1>
    Tambah Baru
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Aktiviti</a></li>
    <li class="active">Tambah Baru</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Baru Aktiviti</h3>
            </div>
            <?php echo form_open_multipart("activity/create"); ?>
              <div class="box-body">
				<div class="form-group">
                  <label>Institusi <font color="red">*</font></label>
                  <?php echo form_dropdown("institusi",$institusi,"","class='form-control' id='institusi' required")?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Topik <font color="red">*</font></label>
				  <div id="div-topik"><?php echo form_dropdown("topik",array(''=>'- Sila Pilih -'),"","class='form-control' required")?></div>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Nama Aktiviti <font color="red">*</font></label>
                  <?php echo form_input("namaaktiviti","","class='form-control' required")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Turutan </label>
                  <?php //echo form_input("turutan","","class='form-control'")?>
				  <input type="number" name="turutan" class="form-control" value="0">
                </div>
                <div class="form-group">
                  <label for="inputKategori">Kategori <font color="red">*</font></label>
                  <?php echo form_dropdown("kategori",array('1'=>'Mandatori','2'=>'Added Value'),"","class='form-control' required")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Masa Untuk Selesai</label>
                  <?php //echo form_input("masa","","class='form-control' required")?>
				  <input type="number" name="masa" class="form-control" value="0">
                </div>
                
              </div>

              <div class="box-footer">
				<button type="button" class="btn btn-default" onclick="history.go(-1)">Kembali</button>
                <button type="submit" class="btn btn-primary">Hantar</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>