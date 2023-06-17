<section class="content-header">
  <h1>
    Tambah Baru
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Profil Orang Asli</a></li>
    <li><a href="#">Ahli Isi Rumah</a></li>
    <li class="active">Tambah Baru</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Ahli Isi Rumah</h3>
            </div>
            <?php echo form_open_multipart("community/create/air"); ?>
              <div class="box-body">
                
               
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Ketua Isi Rumah (KIR) <font color="red">*</font></label>
						  <?php echo form_dropdown("kir",$kir,($this->uri->segment(4)) ? $this->uri->segment(4) : "","class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-6">
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
						  <label for="inputKategori">Nama <font color="red">*</font></label>
						  <?php echo form_input("nama","","class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">No Kad Pengenalan <small>(massukkan nombor tanpa "-")</small></label>
						  <?php echo form_input("noic","","class='form-control' maxlength='12'")?>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Jantina <font color="red">*</font></label>
						  <?php echo form_dropdown("jantina",array('M'=>'LELAKI','F'=>'PEREMPUAN'),"","class='form-control' required")?>
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Agama <font color="red">*</font></label>
							<?php echo form_dropdown("agama",$agama,"","class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Suku Kaum <font color="red">*</font></label>
							<?php echo form_dropdown("sukukaum",$sukukaum,"","class='form-control' required")?>
						</div>
					</div>
					
				</div>				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Tahap Pendidikan </label>
						  <?php echo form_dropdown("pendidikan",$education,"","class='form-control'")?>
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Pekerjaan </label>
						  <?php echo form_input("pekerjaan","","class='form-control'")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Anggaran Pendapatan (RM)</label>
							<?php echo form_input("pendapatan","","class='form-control' placeholder='0.00'")?>
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