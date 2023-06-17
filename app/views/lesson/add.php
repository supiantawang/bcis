<section class="content-header">
  <h1>
    Tambah Baru
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Bahan Pengajaran</a></li>
    <li class="active">Tambah Baru</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Bahan Pengajaran</h3>
            </div>
            <?php echo form_open_multipart("lesson/create"); ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Institusi <font color="red">*</font></label>
                  <?php echo form_dropdown("institusi",$institusi,"","class='form-control' id='institusi' required")?>
                </div>
                <div class="form-group">
                  <label>Topik <font color="red">*</font></label>
                  <div id="div-topik"><?php echo form_dropdown("topik",array(''=>'- Sila Pilih -'),"","class='form-control' required")?></div>
                </div>
                <div class="form-group">
                  <label>Nama Bahan Pengajaran <font color="red">*</font></label>
                  <?php echo form_input("tajuk","","class='form-control' required")?>
                </div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Jenis</label>
						  <?php echo form_dropdown("jenis",array('1'=>'Nota','2'=>'Video'),"","class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputFile">Muat Naik Fail</label>
						  <input type="file" name="dokumen" id="exampleInputFile" accept="image/*,application/pdf,video/mp4">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputFile">Link Fail (Youtube)</label>
						  <?php echo form_input("link","","class='form-control'")?>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label>Susunan</label>
						  <input type="number" name="susunan" class="form-control" value="0">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label>Masa Minimum Selesai (Minit)</label>
						  <input type="number" name="masaselesai" class="form-control" value="0">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label>Kategori</label>
						  <div class="radio">
						  <label><input type="radio" name="kategori" value="1" checked>  Mandatori </label> 
						   <label><input type="radio" name="kategori" value="2">  Added Value</label>
						  </div>
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