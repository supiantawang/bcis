<section class="content-header">
  <h1>
    Tambah Profil
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Profile Orang Asli</a></li>
    <li class="active">Tambah Profil</li>
  </ol>
</section>
<section class="content">
	<?php echo form_open_multipart("student/create") ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Orang Asli</h3>
            </div>
            
              <div class="box-body">
                <div class="responsive">
					<table class="table table-bordered table-striped">
					<tr>
						<th width="20%">Nama Penuh</th>
						<td width="30%"><?php echo form_input("namapenuh","","class='form-control' required")?></td>
						<th width="20%">Pekerjaan</th>
						<td><?php echo form_input("pekerjaan","","class='form-control'")?></td>
					</tr>
					<tr>
						<th width="20%">No Kad Pengenalan</th>
						<td width="30%"><?php echo form_input("noic","","class='form-control' ")?></td>
						<th width="20%">Tempat Kerja</th>
						<td><?php echo form_input("tempatkerja","","class='form-control' ")?></td>
					</tr>
					<tr>
						<th width="20%">Jantina</th>
						<td width="30%"><?php echo form_dropdown("jantina",array('M'=>'Lelaki','F'=>'Perempuan'),"","class='form-control' ")?></td>
						<th width="20%">No Telefon</th>
						<td><?php echo form_input("notel","","class='form-control' ")?></td>
					</tr>
					<tr>
						<th width="20%">Alamat Tempat Tinggal</th>
						<td width="30%"><?php echo form_input("alamat","","class='form-control' ")?></td>
						<th width="20%">Daerah</th>
						<td><?php echo form_input("daerah","","class='form-control' ")?></td>
					</tr>
					<tr>
						<th>Negeri</th>
						<td><?php echo form_dropdown("negeri",array('J'=>'Johor','K'=>'Kedah','D'=>'Kelantan','M'=>'Melaka','N'=>'Negeri Sembilan','C'=>'Pahang','P'=>'Perak','R'=>'Perlis','S'=>'Sabah','Q'=>'Sarawak','Q'=>'Sarawak','B'=>'Selangor','T'=>'Terengganu','W'=>'WP Kuala Lumpur','L'=>'WP Labuan','F'=>'WP Putrajaya'),"D","class='form-control' ")?></td>
						<th>Suku Kaum</th>
						<td><?php echo form_dropdown("sukukaum",array('Kensiu'=>'Kensiu','Kintak'=>'Kintak','Lanoh'=>'Lanoh','Jahai'=>'Jahai','Mendriq'=>'Mendriq','Bateq'=>'Bateq','Temiar'=>'Temiar'),"","class='form-control' ")?></td>
					</tr>

					</table>
					<hr>
					
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