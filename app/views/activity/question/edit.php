<section class="content-header">
  <h1>
    Kemaskini Soalan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Aktiviti</a></li>
    <li class="active">Kemaskini Soalan</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-10">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kemaskini Soalan</h3>
            </div>
            <?php echo form_open_multipart("activity/updatequestion"); ?>
              <div class="box-body">
                <div class="box-body">
					<div class="form-group">
					  <label for="exampleInputPassword1">Aktiviti <font color="red">*</font></label>
					  <?php echo form_dropdown("aktiviti",$aktiviti,$que->act_id,"class='form-control' required")?>
					</div>
					<div class="form-group">
					  <label for="inputKategori">Soalan <font color="red">*</font></label>
					  <textarea id="editor1" name="soalan" rows="5" cols="10"><?php echo $que->aque_name ?></textarea>
					</div>
					
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
							  <label for="inputKategori">Imej</label>
							  <?php 
								if($que->aque_link != ""){
									echo "<img src='".base_url().$que->aque_link."' class='img-responsive'>
									<span class='btn btn-block btn-xs btn-danger' onclick=\"deleteThisImage('".base64_encode($que->aque_id)."')\">Hapuskan</span>
									";
								}else{
									echo "<input type=\"file\" name=\"dokumen\" accept=\"image/*\">";
								}
							  
							  ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
							  <label for="inputKategori">Jenis Soalan <font color="red">*</font></label>
							  <?php echo form_dropdown("jenis",array('1'=>'MCQ','2'=>'True/False'),$que->aque_type,"class='form-control' required")?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
							  <label for="inputKategori">Turutan </label>
							  <input type="number" name="turutan" class="form-control" value="<?php echo $que->aque_order_sort ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
							  <label for="inputKategori">Status</label>
							  <?php echo form_dropdown("status",array('0'=>'Tidak Aktif','1'=>'Aktif'),$que->aque_active,"class='form-control'")?>
							</div>
						</div>
					</div>

					<div class="box-footer">
						<input type="hidden" name="questionid" value="<?php echo base64_encode($que->aque_id) ?>">
						<button type="button" class="btn btn-default" onclick="history.go(-1)">Kembali</button>
						<button type="submit" class="btn btn-primary">Kemaskini</button>
					</div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>