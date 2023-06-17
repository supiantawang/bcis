<section class="content-header">
  <h1>
    <div class="btn btn-sm btn-default" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></div> Maklumat Isu
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Isu</a></li>
    <li class="active">Maklumat Isu</li>
  </ol>
</section>
	<section class="content">
	<div class="row">
        <div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Papar Kampung</h3>
			</div>
			<div class="box-body">
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Pos</label>
						<div class="col-md-8"><?php 
						$pos = $this->blapps_lib->getData("kg_pos_id","pro_kampung","kg_id ",$air->isu_kg);
						echo $this->blapps_lib->getData("pos_name","pro_pos","pos_id",$pos) ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Nama Kampung</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("kg_nama","pro_kampung","kg_id ",$air->isu_kg) ?></div>
						</address>
					</div>	
				</div>
				
			</div>
		</div>
		</div>
    </div>
	
	<div class="row">
        <div class="col-md-12">
		
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Papar Isu Dalam Komuniti</h3>
			</div>
			<div class="box-body">
				
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Jenis Isu</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("type_desc","pro_isu_type","type_id",$air->isu_type) ?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Tarikh</label>
						<div class="col-md-8"><?php echo $air->isu_date ?></div>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
					
						<label class="col-md-4">Isu </label>
						<div class="col-md-8"><?php echo $air->isu_title ?></div>
					</div>
				
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Keterangan</label>
						<div class="col-md-8"><?php echo $air->isu_remarks ?></div>
					</div>	
				</div>
				
				
			</div>
		</div>
		</div>
	</div>
		
		
	<div class="row">
        <div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Rekod</h3>
			</div>
			<div class="box-body">
			<div class="row invoice-col">
				<div class="col-sm-6 invoice-col">
					<address>
					<label class="col-md-4">Tarikh Cipta</label>
					<div class="col-md-8"><?php echo date("d M Y H:i:sA",strtotime($air->isu_created)) ?> oleh <?php echo $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$air->isu_createdby)?></div>
					</address>
				</div>
				<div class="col-sm-6 invoice-col">
					<address>
					<label class="col-md-4">Tarikh Kemaskini</label>
					<div class="col-md-8"><?php echo date("d M Y H:i:sA",strtotime($air->isu_modified)) ?> oleh <?php echo $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$air->isu_modifiedby)?></div>
					</address>
				</div>	
				</div>
			</div>
		</div>
		</div>
    </div>
	 </section>