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
              <h3 class="box-title">Kemaskini Daerah</h3>
            </div>
            <?php echo form_open_multipart("management/update/district"); ?>
              <div class="box-body">
				<div class="row">
					
					<div class="col-md-9">
						<div class="form-group">
						  <label for="exampleInputFile">Nama Daerah</label>
						 <?php echo form_input("nama",$district->daerah_name,"class='form-control' required")?>
						</div>
					</div>
					
					
				</div>	
				
				
              </div>

              <div class="box-footer">
				<?php echo form_hidden("id",base64_encode($district->daerah_id))?>
                <button type="button" class="btn btn-default" onclick="history.go(-1)">Batal</button>
                <button type="submit" class="btn btn-primary">Kemaskini</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>