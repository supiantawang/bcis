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
              <h3 class="box-title"> Topik Mengikut Institusi</h3>
            </div>
            <?php echo form_open_multipart("management/update/topic"); ?>
              <div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="inputKategori">Institusi <font color="red">*</font></label>
						  <?php echo form_dropdown("institusi",$institusi,$topic->ins_id,"class='form-control' required")?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="inputKategori">Topic <font color="red">*</font></label>
						  <?php echo form_dropdown("topic",$topics,$topic->topic_id,"class='form-control' required")?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Jenis <font color="red">*</font></label>
						  <?php echo form_dropdown("jenis",array('1'=>'Mandatori','2'=>'Added Value'),$topic->topic_type,"class='form-control' required")?>
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputFile">Turutan <font color="red">*</font></label>
						  <input type="number" name="turutan" value="<?php echo $topic->topic_sort ?>" class="form-control" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Sesi Batch <font color="red">*</font></label>
							<input type="number" name="batch" value="<?php echo $topic->session_batch ?>" class="form-control" required>
						</div>
					</div>
					
				</div>			
				
              </div>

              <div class="box-footer">
				<?php echo form_hidden("id",base64_encode($topic->topic_institution_id))?>
                <button type="button" class="btn btn-default" onclick="history.go(-1)">Batal</button>
                <button type="submit" class="btn btn-primary">Kemaskini</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>