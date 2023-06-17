<section class="content-header">
  <h1>
    <div class="btn btn-sm btn-default" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></div> Maklumat Kampung
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Pengurusan</a></li>
    <li class="active">Maklumat Kampung</li>
  </ol>
</section>
	<section class="content">
	
	
	<div class="row">
        <div class="col-md-12">
		
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Papar Maklumat Kampung</h3>
			</div>
			<div class="box-body">
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Pos</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("pos_name","pro_pos","pos_id",$village->kg_pos_id) ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Nama Kampung</label>
						<div class="col-md-8"><?php echo $village->kg_nama; ?></div>
						</address>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Koordinat Latitud</label>
						<div class="col-md-8"><?php echo $village->kg_latitud ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Koordinat Longitud</label>
						<div class="col-md-8"><?php echo $village->kg_longitud; ?></div>
						</address>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-12 invoice-col">
						<label class="col-md-2">Sejarah Kampung</label>
						<div class="col-md-10"><?php echo $village->kg_sejarah ?></div>
					</div>
					
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Kemudahan Awam</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_lookup","pro_lookup.lookup_id  = pro_kampung_kemudahan.pkk_kemudahan");
						$result = $this->blapps_lib->getDataResult("pro_kampung_kemudahan",array(array("pkk_kampung",base64_decode($this->uri->segment(4))),array("lookup_type","kemudahan-awam")),"",array("pkk_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-check'></i> $row->lookup_desc </span><br>";
						}

						?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Sumber Air</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_lookup","pro_lookup.lookup_id  = pro_kampung_air.pka_sumberair");
						$result = $this->blapps_lib->getDataResult("pro_kampung_air",array(array("pka_kampung",base64_decode($this->uri->segment(4))),array("lookup_type","sumber-air")),"",array("pka_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-check'></i> $row->lookup_desc </span><br>";
						}

						?></div>
					</div>	
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Bekalan Elektrik</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_lookup","pro_lookup.lookup_id  = pro_kampung_elektrik.pke_elektrik");
						$result = $this->blapps_lib->getDataResult("pro_kampung_elektrik",array(array("pke_kampung",base64_decode($this->uri->segment(4))),array("lookup_type","bekalan-elektrik")),"",array("pke_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-check'></i> $row->lookup_desc </span><br>";
						}

						?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Pusat Ibadat</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_lookup","pro_lookup.lookup_id  = pro_kampung_ibadat.pki_ibadat");
						$result = $this->blapps_lib->getDataResult("pro_kampung_ibadat",array(array("pki_kampung",base64_decode($this->uri->segment(4))),array("lookup_type","pusat-ibadat")),"",array("pki_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-check'></i> $row->lookup_desc </span><br>";
						}

						?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Sumber Pendapatan</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_lookup","pro_lookup.lookup_id  = pro_kampung_sumber.pks_sumber");
						$result = $this->blapps_lib->getDataResult("pro_kampung_sumber",array(array("pks_kampung",base64_decode($this->uri->segment(4))),array("lookup_type","sumber-pendapatan")),"",array("pks_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-check'></i> $row->lookup_desc </span><br>";
						}

						?></div>
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
					<div class="col-md-8"><?php echo date("d M Y H:i:sA",strtotime($village->kg_created)) ?> oleh <?php echo ($village->kg_createdby) ? $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$village->kg_createdby) : ""?></div>
					</address>
				</div>
				<div class="col-sm-6 invoice-col">
					<address>
					<label class="col-md-4">Tarikh Kemaskini</label>
					<div class="col-md-8"><?php echo date("d M Y H:i:sA",strtotime($village->kg_modified)) ?> oleh <?php echo ($village->kg_modifiedby) ? $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$village->kg_modifiedby) : ""?></div>
					</address>
				</div>	
				</div>
			</div>
		</div>
		</div>
    </div>
	 </section>