<section class="content-header">
  <h1>
    Kemaskini Jawapan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Aktiviti</a></li>
    <li class="active">Kemaskini Jawapan</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kemaskini Jawapan</h3>
            </div>
            <?php echo form_open_multipart("exercise/updateanswer"); ?>
				<div class="box-body">
					<div class="form-group">
					  <label>Soalan</label>
					  <p><?php echo $ans->aque_name ?></p>
					</div>
					<?php if($ans->aque_type == 1): ?>
					<div class="row mcq">
						<div class="col-md-6">
							<div class="form-group">
							  <label>Jawapan A</label>
							  <textarea id="editor1" name="answerA" rows="5" cols="10"><?php echo $ans->acta_answer_a ?></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label>Jawapan B</label>
							  <textarea id="editor2" name="answerB" rows="5" cols="10"><?php echo $ans->acta_answer_b ?></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label>Jawapan C</label>
							  <textarea id="editor3" name="answerC" rows="5" cols="10"><?php echo $ans->acta_answer_c ?></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label>Jawapan D</label>
							  <textarea id="editor4" name="answerD" rows="5" cols="10"><?php echo $ans->acta_answer_d ?></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label>Jawapan Yang Betul MCQ</label>
							  <?php echo form_dropdown("answermcq",array('a'=>'Jawapan A','b'=>'Jawapan B','c'=>'Jawapan C','d'=>'Jawapan D'),$ans->acta_answer_mcq,"class='form-control' id='answermcq'")?>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php if($ans->aque_type == 2): ?>
					<div class="row truefalse">
						<div class="col-md-6">
							<div class="form-group">
							  <label>Jawapan Yang Betul True/False</label>
							  <?php echo form_dropdown("answertf",array('T'=>'True','F'=>'False'),$ans->acta_answer_tf,"id='answertf' class='form-control'")?>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<div class="box-footer">
					<input type="hidden" name="answerid" value="<?php echo base64_encode($ans->acta_id) ?>">
					<input type="hidden" name="type" value="<?php echo $ans->aque_type ?>">
					<button type="button" class="btn btn-default" onclick="history.go(-1)">Kembali</button>
					<button type="submit" class="btn btn-primary">Kemaskini</button>
				</div>          
          <?php echo form_close() ?>
        </div>
		
      </div>
      <!-- /.row -->
    </section>