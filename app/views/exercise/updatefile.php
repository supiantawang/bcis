<section class="content-header">
  <h1>
    Tukar Fail
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Pelajaran</a></li>
    <li class="active">Tukar Fail</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tukar Fail Pelajaran</h3>
            </div>
            <?php echo form_open_multipart("lesson/doupdatefile"); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Bab </label>
                  <?php echo form_input("bab",$lesson->LessonChapter,"class='form-control' disabled")?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tajuk</label>
                  <?php echo form_input("tajuk",$lesson->LessonTitle,"class='form-control' disabled")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Kategori</label>
                  <?php echo form_dropdown("kategori",array('dokumen'=>'Dokumen','video'=>'Video'),$lesson->Category,"class='form-control' disabled")?>
				  <input type="hidden" name="lessonid" value="<?php echo base64_encode($lesson->LessonID) ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Muat Naik Fail</label>
                  <input type="file" name="dokumen" id="exampleInputFile" accept="application/pdf,video/mp4" required>
                </div>
              </div>

              <div class="box-footer">
                <button type="button" class="btn btn-default" onclick="history.go(-1)">Batal</button>
                <button type="submit" class="btn btn-primary">Kemaskini</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>