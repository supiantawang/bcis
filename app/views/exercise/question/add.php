<section class="content-header">
  <h1>
    Tambah Baru
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Aktiviti</a></li>
    <li><a href="#">Soalan</a></li>
    <li class="active">Tambah Baru</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Baru Soalan</h3>
            </div>
            <?php echo form_open_multipart("exercise/createquestion"); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Latihan <font color="red">*</font></label>
                  <?php echo form_dropdown("aktiviti",$aktiviti,"","class='form-control' required")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Soalan <font color="red">*</font></label>
                  <?php //echo form_input("namaaktiviti","","class='form-control' required")?>
				  <textarea id="editor1" name="soalan" rows="5" cols="10"></textarea>
                </div>
                
			<div class="row">
			<div class="col-md-4">
                <div class="form-group">
                  <label for="inputKategori">Fail (Imej Sahaja)</label>
                  <input type="file" name="dokumen" accept="image/*">
                </div>
            </div>
			<div class="col-md-4">
                <div class="form-group">
                  <label for="inputKategori">Jenis Soalan <font color="red">*</font></label>
				  <?php echo form_dropdown("jenis",array('1'=>'MCQ','2'=>'True/False'),"","class='form-control' required")?>
                </div>
            </div>
			<div class="col-md-4">
                <div class="form-group">
                  <label for="inputKategori">Turutan </label>
				  <input type="number" name="turutan" class="form-control" value="0">
                </div>
            </div>
			
                
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