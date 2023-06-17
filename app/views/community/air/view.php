<section class="content-header">
  <h1>
    <div class="btn btn-sm btn-default" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></div> Maklumat Ahli Isi Rumah
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Ahli Isi Rumah</a></li>
    <li class="active">Maklumat Ahli Isi Rumah</li>
  </ol>
</section>
	<section class="content">
	<div class="row">
        <div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Papar Ketua Isi Rumah</h3>
			</div>
			<div class="box-body">
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Pos</label>
						<div class="col-md-8"><?php 
						$idpos = $this->blapps_lib->getData("kg_pos_id","pro_kampung","kg_id",$kir->u_kg_id);
						echo ($idpos) ? $this->blapps_lib->getData("pos_name","pro_pos","pos_id",$idpos) : "" ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Nama Kampung</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("kg_nama","pro_kampung","kg_id ",$kir->u_kg_id) ?></div>
						</address>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Nama</label>
						<div class="col-md-8"><?php echo $kir->u_full_name ?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">No Kad Pengenalan</label>
						<div class="col-md-8"><?php echo $kir->u_ic_number ?></div>
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
				<h3 class="box-title">Papar Ahli Isi Rumah</h3>
			</div>
			<div class="box-body">
				
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Nama</label>
						<div class="col-md-8"><?php echo $air->u_full_name ?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">No Kad Pengenalan</label>
						<div class="col-md-8"><?php echo $air->u_ic_number ?></div>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
					
						<label class="col-md-4">Jantina</label>
						<div class="col-md-8"><?php echo ($air->u_gender == "M") ? "LELAKI" : "PEREMPUAN" ?></div>
					</div>
					
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Suku Kaum</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("sukukaum_name","pro_sukukaum","sukukaum_id",$air->u_tribes) ?></div>
					</div>
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Agama</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("agama_desc","pro_agama","agama_id",$air->u_religion);
						
						if($air->u_religion == 1){

							if($air->u_islamdate == "" || $air->u_islamdate == "NULL" || $air->u_islamdate == "0000-00-00" )
								$islam = "Tiada Maklumat";
							else
								$islam = date("d/m/Y",strtotime($air->u_islamdate));
							echo " (Tarikh Pengislaman: ".$islam.")";
						}
						?></div>
					</div>	
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Penghayatan Agama</label>
						<div class="col-md-8"><?php echo $air->u_religious ?></div>
					</div>
						
				</div>
				<div class="row invoice-col">
				<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Pendidikan Formal </label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("pendidikan_desc","pro_tahappendidikan","pendidikan_id",$air->u_education) ?></div>
					</div>	
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Pendidikan Agama</label>
						<div class="col-md-8"><?php echo ($air->u_edureligion != 0) ? $this->blapps_lib->getData("pendidikan_desc","pro_pendidikan","pendidikan_id",$air->u_edureligion) : "" ?></div>
					</div>		
				</div>
				<div class="row invoice-col">
				<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Sumber Pendapatan</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_pendapatan","pro_pendapatan.pendapatan_id  = pro_penduduk_pendapatan.ppi_pendapatan");
						$result = $this->blapps_lib->getDataResult("pro_penduduk_pendapatan",array(array("ppi_penduduk",base64_decode($this->uri->segment(4)))),"",array("ppi_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-check'></i> $row->pendapatan_desc </span><br>";
						}

						?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Pekerjaan</label>
						<div class="col-md-8"><?php echo $air->u_employment ?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Anggaran Pendapatan</label>
						<div class="col-md-8">RM<?php echo $air->u_income ?></div>
					</div>
				
				</div>
				<div class="row invoice-col">
					
				<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Kepimpinan</label>
						<div class="col-md-8">
							<?php 
							if ($air->u_penghulu == 1){
								echo "Penghulu/ Batin";
							}elseif($air->u_penghulu == 2){
								echo "JPKKOA";
							}elseif($air->u_penghulu == 3){
								echo "Tiada";
							}else{
								echo "Lain-lain";
							}
							
							?>
						</div>
					</div>	
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Kepimpinan Agama</label>
						<div class="col-md-8">
						<?php 
						$this->db->join("pro_leadagama","pro_leadagama.leadagama_id  = pro_penduduk_leadagama.ppl_leadagama");
						$result = $this->blapps_lib->getDataResult("pro_penduduk_leadagama",array(array("ppl_penduduk",base64_decode($this->uri->segment(4)))),"",array("ppl_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-minus'></i> $row->leadagama_desc </span><br>";
						}

						?>
						</div>
					</div>	
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Status di Kampung</label>
						<div class="col-md-8">
						<?php 
						if($air->u_status == 1)
							echo  "Aktif";
						if($air->u_status == 2)
							echo  "Pindah";
						if($air->u_status == 3)
							echo  "Mati";
						
						?>
						</div>
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
					<div class="col-md-8"><?php echo date("d M Y H:i:sA",strtotime($air->u_created)) ?> oleh <?php echo $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$air->u_createdby)?></div>
					</address>
				</div>
				<div class="col-sm-6 invoice-col">
					<address>
					<label class="col-md-4">Tarikh Kemaskini</label>
					<div class="col-md-8"><?php echo date("d M Y H:i:sA",strtotime($air->u_modified)) ?> oleh <?php echo $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$air->u_modifiedby)?></div>
					</address>
				</div>	
				</div>
			</div>
		</div>
		</div>
    </div>
	 </section>