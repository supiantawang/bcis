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
              <h3 class="box-title">Tambah Baru Jawapan</h3>
            </div>
            <?php echo form_open_multipart("exercise/createanswer"); ?>
            <div class="box-body">
                <div class="form-group">
                  <label>Soalan <font color="red">*</font></label>
                  <?php echo form_dropdown("soalan",$question,"","class='form-control' id='soalan' required")?>
                </div>
				<div class="row mcq">
					<div class="col-md-6">
						<div class="form-group">
						  <label>Jawapan A</label>
						  <textarea id="editor1" name="answerA" rows="5" cols="10"></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label>Jawapan B</label>
						  <textarea id="editor2" name="answerB" rows="5" cols="10"></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label>Jawapan C</label>
						  <textarea id="editor3" name="answerC" rows="5" cols="10"></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label>Jawapan D</label>
						  <textarea id="editor4" name="answerD" rows="5" cols="10"></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label>Jawapan Yang Betul MCQ</label>
						  <?php echo form_dropdown("answermcq",array(''=>'Sila Pilih','a'=>'Jawapan A','b'=>'Jawapan B','c'=>'Jawapan C','d'=>'Jawapan D'),"","class='form-control' id='answermcq'")?>
						</div>
					</div>
				</div>
				
				<div class="row truefalse">
					<div class="col-md-6">
						<div class="form-group">
						  <label>Jawapan Yang Betul True/False</label>
						  <?php echo form_dropdown("answertf",array(''=>'Sila Pilih','T'=>'True','F'=>'False'),"","id='answertf' class='form-control'")?>
						</div>
					</div>
				</div>
            </div>

              <div class="box-footer">
				<input type="hidden" name="type" id="type" value="">
				<button type="button" class="btn btn-default" onclick="history.go(-1)">Kembali</button>
                <button type="submit" class="btn btn-primary">Hantar</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>