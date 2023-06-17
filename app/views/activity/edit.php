<section class="content-header">
  <h1>
    Kemaskini
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Aktiviti</a></li>
    <li class="active">Kemaskini</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-10">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kemaskini Aktiviti</h3>
            </div>
            <?php echo form_open_multipart("activity/update"); ?>
              <div class="box-body">
				<div class="form-group">
                  <label>Institusi <font color="red">*</font></label>
                  <?php echo form_dropdown("institusi",$institusi,$ins_id,"class='form-control' id='institusi' required")?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Topik <font color="red">*</font></label>
				  <div id="div-topik"><?php echo form_dropdown("topik",$topic,$act->topic_id,"class='form-control' required")?></div>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Nama Aktiviti <font color="red">*</font></label>
                  <?php echo form_input("namaaktiviti",$act->act_name,"class='form-control' required") ?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Turutan </label>
				  <input type="number" name="turutan" class="form-control" value="<?php echo $act->act_order_sort ?>">
                </div>
                <div class="form-group">
                  <label for="inputKategori">Kategori <font color="red">*</font></label>
                  <?php echo form_dropdown("kategori",array('1'=>'Mandatori','2'=>'Added Value'),$act->act_category,"class='form-control' required") ?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Masa Untuk Selesai</label>
				  <input type="number" name="masa" class="form-control" value="<?php echo $act->act_min_completion_time ?>">
                </div>
              </div>

              <div class="box-footer">
				<input type="hidden" name="activityid" value="<?php echo base64_encode($act->act_id) ?>">
				<button type="button" class="btn btn-default" onclick="history.go(-1)">Kembali</button>
                <button type="submit" class="btn btn-primary">Kemaskini</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>