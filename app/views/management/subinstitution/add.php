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
              <h3 class="box-title">Tambah SubInstitusi</h3>
            </div>
            <?php echo form_open_multipart("management/create/subinstitution"); ?>
              <div class="box-body">
                
               
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="inputKategori">Institusi <font color="red">*</font></label>
						  <?php echo form_dropdown("institusi",$institusi,"","class='form-control' required")?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputFile">Kod Sub Institusi <font color="red">*</font></label>
						 <?php echo form_input("kod","","class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
						  <label for="exampleInputFile">Nama Sub Institusi <font color="red">*</font></label>
						 <?php echo form_input("nama","","class='form-control' required")?>
						</div>
					</div>
					
				</div>				
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
						  <label for="exampleInputFile">Alamat</label>
						 <?php //echo form_input("alamat","","class='form-control' ")?>
						 <textarea id="alamat" name="alamat" rows="5" cols="10" class="form-control"></textarea>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputFile">No Telefon</label>
						 <?php echo form_input("phoneno","","class='form-control' ")?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="exampleInputFile">Keterangan</label>
							<?php //echo form_input("description","","class='form-control' ")?>
							<textarea id="description" name="description" rows="5" cols="10" class="form-control"></textarea>
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