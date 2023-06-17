<?php
if($this->uri->segment(4)){
	$title 		= "Kemaskini";
	$action 	= "management/update/pos/".$this->uri->segment(4);
	$vpos 		= $pos->pos_id;
	$vname 		= $pos->pos_name;
	$vdaerah	= $pos->pos_daerah;
	$vlatitude	= $pos->pos_latitude;
	$vlongitude	= $pos->pos_longitude;
	$vkeluasan	= $pos->pos_keluasan;
	$vbil		= $pos->pos_bil_penduduk;
	$vbilkg		= $pos->pos_bil_kampung;

}else{
	$title 		= "Tambah Baru";
	$action 	= "management/create/pos";
	$vpos 		= "";
	$vname 		= "";
	$vdaerah	= "";
	$vlatitude	= "";
	$vlongitude	= "";
	$vkeluasan	= "";
	$vbil		= "";
	$vbilkg		= "";

}

?>

<section class="content-header">
  <h1>
    <?php echo $title ?> Pos
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Pengurusan</a></li>
    <li><a href="#">Pos</a></li>
    <li class="active"><?php echo $title ?> Pos</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Pos</h3>
            </div>
            <?php echo form_open_multipart($action); ?>
              <div class="box-body">
                
               
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="inputKategori">Nama Pos <font color="red">*</font></label>
						  <?php echo form_input("namapos",$vname,"class='form-control' required")?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputFile">Daerah <font color="red">*</font></label>
						 <?php echo form_dropdown("lokasi",$lokasi,$vdaerah,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputFile">GPS Latitude</label>
						 <?php echo form_input("latitude",$vlatitude,"class='form-control' ")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputFile">GPS Longitude</label>
						 <?php echo form_input("longitude",$vlongitude,"class='form-control' ")?>
						</div>
					</div>
					
				</div>				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputFile">Keluasan</label>
							<?php echo form_input("keluasan",$vkeluasan,"class='form-control'")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputFile">Jumlah Kampung</label>
						 <?php echo form_input("bilkampung",$vbilkg,"class='form-control' ")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputFile">Jumlah Penduduk</label>
						 <?php echo form_input("bilpenduduk",$vbil,"class='form-control' ")?>
						</div>
					</div>
					
					
				</div>				
				
              </div>

              <div class="box-footer">
                <button type="button" class="btn btn-default" onclick="history.go(-1)">Batal</button>
                <button type="submit" class="btn btn-primary"><?php echo $title?></button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>