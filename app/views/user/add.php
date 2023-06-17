<section class="content-header">
  <h1>
    Tambah Baru
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Pengguna</a></li>
    <li class="active">Tambah Baru</li>
  </ol>
</section>
<section class="content">
	<?php echo form_open_multipart("user/create"); ?>
      <div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Pengguna</h3>
            </div>
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Penuh <font color="red">*</font></label>
                  <?php echo form_input("namapenuh","","class='form-control' style='text-transform: uppercase' required")?>
                </div>
                

				<div class="form-group">
                  <label for="inputKategori">No Telefon</label>
                  <?php echo form_input("notel","","class='form-control'")?>
                </div>
				<div class="form-group">
                  <label for="inputKategori">Email</label>
                  <?php echo form_input("email","","class='form-control'")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Jawatan </label>
                  <?php echo form_input("jawatan","","class='form-control'")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Tempat Kerja</label>
                  <?php echo form_input("tempatkerja","","class='form-control' ")?>
                </div>
                
              </div>

             
            
          </div>
          
        </div>
		<div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Akaun</h3>
            </div>
            
              <div class="box-body">
                <div class="form-group">
                  <label for="inputKategori">No Kad Pengenalan <font color="red">*</font></label>
                  <?php echo form_input("noic","","class='form-control' required")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Kata Laluan <font color="red">*</font></label>
                  <?php echo form_password("password","","class='form-control' required")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Peranan</label>
				  <?php echo form_dropdown("peranan",$role,4,"class='form-control'")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Daerah</label>
                  <?php echo form_dropdown("institusi",$institution,"","class='form-control'")?>
                </div>
				
				
                
              </div>

              <div class="box-footer">
				<button type="button" class="btn btn-default" onclick="history.go(-1)">Kembali</button>
                <button type="submit" class="btn btn-primary">Hantar</button>
              </div>
            
          </div>
          
        </div>
		
		
      </div>
     <?php echo form_close() ?>
    </section>