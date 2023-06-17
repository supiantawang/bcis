<section class="content-header">
  <h1>
    Pengesahan Peserta
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Peserta</a></li>
    <li class="active">Pengesahan Peserta</li>
  </ol>
</section>
<section class="content">
	<?php echo form_open_multipart("student/update/".$this->uri->segment(3)); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Peserta</h3>
            </div>
            
              <div class="box-body">
                <div class="responsive">
					<table class="table table-bordered table-striped">
					<tr>
						<th width="20%">Nama Penuh</th>
						<td width="30%"><?php echo $user->u_full_name ?></td>
						<th width="20%">Pekerjaan</th>
						<td><?php echo $user->u_occupation ?></td>
					</tr>
					<tr>
						<th width="20%">No Kad Pengenalan</th>
						<td width="30%"><?php echo $user->u_ic_number ?></td>
						<th width="20%">Tempat Kerja</th>
						<td><?php echo $user->u_work_place ?></td>
					</tr>
					<tr>
						<th width="20%">Jantina</th>
						<td width="30%"><?php echo $user->u_gender ?></td>
						<th width="20%">No Telefon</th>
						<td><?php echo $user->u_phone_number ?></td>
					</tr>
					<tr>
						<th width="20%">Alamat Tempat Tinggal</th>
						<td width="30%"><?php echo $user->u_address ?></td>
						<th width="20%">Tempat Kursus</th>
						<td><?php echo $tempatkursus ?><input type="hidden" name="tempatkursus" value="<?php echo $institusi ?>"></td>
					</tr>
					<tr>
						<th width="20%">Umur</th>
						<td width="30%"><?php echo date_diff(date_create($user->u_birth_date), date_create('now'))->y; ?> TAHUN</td>
						<th width="20%">Email</th>
						<td><?php echo $user->u_email ?></td>
					</tr>
					</table>
					<hr>
					<div class="row">
					<div class="col-md-12">
					
						  <h4>Tindakan</h4>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  <label for="inputKategori">Sesi</label>
								  <?php echo form_input("xresit",$session,"class='form-control' disabled")?>
								  <?php echo form_hidden("sesi",$session)?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  <label for="inputKategori">No Giliran</label>
								  <?php echo form_input("xgiliran",$xsequence,"class='form-control' disabled")?>
								  <?php echo form_hidden("giliran",$sequence)?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  <label for="inputKategori">No Resit Pembayaran</label>
								  <?php echo form_input("resit","","class='form-control' ")?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  <label for="inputKategori">Penemuduga <font color="red">*</font></label>
								  <?php echo form_dropdown("interviewer",$interviewer,"","class='form-control' required")?>
								</div>
							</div>
							
						</div>
						
						
					</div>
					</div>
					<div class="row">
					<div class="col-md-12">
						<label><?php echo form_checkbox("status",1,"","class='status' required") ?> Saya mengesahkan bahawa maklumat peserta di atas adalah benar. <font color="red">*</font></label>
					</div>
					</div>
              </div>

             
            
          </div>
			<div class="box-footer">
				<button type="button" class="btn btn-default" onclick="history.go(-1)">Kembali</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
        </div>
		
		
      </div>
      </div>
     <?php echo form_close() ?>
    </section>