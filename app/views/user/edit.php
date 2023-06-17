<section class="content-header">
  <h1>
    Kemaskini Pengguna
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Pengguna</a></li>
    <li class="active">Kemaskini Pengguna</li>
  </ol>
</section>
<section class="content">
	<?php echo form_open_multipart("user/update"); ?>
      <div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Pengguna</h3>
            </div>
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Penuh <font color="red">*</font></label>
                  <?php echo form_input("namapenuh",$user->u_fullname,"class='form-control' style='text-transform: uppercase' required")?>
                </div>
                

				<div class="form-group">
                  <label for="inputKategori">No Telefon</label>
                  <?php echo form_input("notel",$user->u_contact,"class='form-control'")?>
                </div>
				<div class="form-group">
                  <label for="inputKategori">Email</label>
                  <?php echo form_input("email",$user->u_email,"class='form-control'")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Jawatan </label>
                  <?php echo form_input("jawatan",$user->u_position,"class='form-control'")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Tempat Kerja</label>
                  <?php echo form_input("tempatkerja",$user->u_tempatkerja,"class='form-control' ")?>
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
                  <?php echo form_input("noic",$user->u_loginname,"class='form-control' required")?>
                </div>
                
                <div class="form-group">
                  <label for="inputKategori">Peranan</label>
                  <?php 
					
					/* $roles = $this->blapps_lib->getDataResult("lkprole",array(),"",array("","ASC"));
					foreach($roles as $row){
						
						echo "<div class='checkbox'><label><input type='checkbox' value='$row->role_id' name='peranan'> $row->role_desc </label></div>";
					} */
				  ?>
				  <?php echo form_dropdown("peranan",$role,4,"class='form-control'")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Daerah</label>
                  <?php echo form_dropdown("institusi",$institution,$user->u_location,"class='form-control'")?>
                  <input type="hidden" name="userid" value="<?php echo base64_encode($user->u_id) ?>">
                </div>
				<div class="form-group">
                  <label for="inputKategori">Status</label>
                  <?php echo form_dropdown("status",array('1'=>'Aktif','0'=>'Tidak Aktif'),$user->u_status,"class='form-control'")?>
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