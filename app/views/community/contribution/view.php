<section class="content-header">
  <h1>
    <div class="btn btn-sm btn-default" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></div> Maklumat Penerima Bantuan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Penerima Bantuan</a></li>
    <li class="active">Maklumat Penerima Bantuan</li>
  </ol>
</section>
	<section class="content">
	<div class="row">
        <div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Maklumat Penerima Bantuan</h3>
			</div>
			<div class="box-body">
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Kampung</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("kg_nama","pro_kampung","kg_id ",$con->u_kg_id) ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Pos</label>
						<div class="col-md-8"><?php 
						$posid = $this->blapps_lib->getData("kg_pos_id","pro_kampung","kg_id ",$con->u_kg_id);
						echo $this->blapps_lib->getData("pos_name","pro_pos","pos_id",$posid) ?></div>
						</address>
					</div>	
					
				</div>
				
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Nama</label>
						<div class="col-md-8"><?php echo $con->u_full_name ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">No Kad Pengenalan</label>
						<div class="col-md-8"><?php echo $con->u_ic_number ?></div>
						</address>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Jantina</label>
						<div class="col-md-8"><?php echo ($con->u_gender == "M") ? "LELAKI" : "PEREMPUAN" ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Suku Kaum</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("sukukaum_name","pro_sukukaum","sukukaum_id",$con->u_tribes) ?></div>
						</address>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Agama</label>
						<div class="col-md-8"><?php 
							echo $this->blapps_lib->getData("agama_desc","pro_agama","agama_id",$con->u_religion) ;
							
							if($con->u_religion == 1){

								if($con->u_islamdate == "" || $con->u_islamdate == "NULL" || $con->u_islamdate == "0000-00-00" )
									$islam = "Tiada Maklumat";
								else
									$islam = date("d/m/Y",strtotime($con->u_islamdate));
								echo " (Tarikh Pengislaman: ".$islam.")";
							}
								
							
							?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Penghayatan Agama</label>
						<div class="col-md-8"><?php echo $con->u_religious ?></div>
						</address>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Pendidikan Formal</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("pendidikan_desc","pro_tahappendidikan","pendidikan_id",$con->u_education) ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Pendidikan Agama</label>
						<div class="col-md-8"><?php echo ($con->u_edureligion) ? $this->blapps_lib->getData("pendidikan_desc","pro_pendidikan","pendidikan_id",$con->u_edureligion) : "" ?></div>
						</address>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Sumber Pendapatan</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_pendapatan","pro_pendapatan.pendapatan_id  = pro_penduduk_pendapatan.ppi_pendapatan");
						$result = $this->blapps_lib->getDataResult("pro_penduduk_pendapatan",array(array("ppi_penduduk",$con->u_id)),"",array("ppi_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-check'></i> $row->pendapatan_desc </span><br>";
						}

						?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Pekerjaan</label>
						<div class="col-md-8"><?php echo $con->u_employment ?></div>
						</address>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Anggaran Pendapatan</label>
						<div class="col-md-8">RM<?php echo number_format($con->u_income,2) ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Ikon/bakat</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_bakat","pro_bakat.bakat_id  = pro_penduduk_bakat.ppb_bakat");
						$result = $this->blapps_lib->getDataResult("pro_penduduk_bakat",array(array("ppb_penduduk",$con->u_id)),"",array("ppb_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-check'></i> $row->bakat_desc </span><br>";
						}

						?></div>
						</address>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Kepimpinan</label>
						<div class="col-md-8"><?php 
							if ($con->u_penghulu == 1){
								echo "Penghulu/ Batin";
							}elseif($con->u_penghulu == 2){
								echo "JPKKOA";
							}elseif($con->u_penghulu == 3){
								echo "Tiada";
							}else{
								echo "Lain-lain";
							}
							
							?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Kepimpinan Agama</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_leadagama","pro_leadagama.leadagama_id  = pro_penduduk_leadagama.ppl_leadagama");
						$result = $this->blapps_lib->getDataResult("pro_penduduk_leadagama",array(array("ppl_penduduk",$con->u_id)),"",array("ppl_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-minus'></i> $row->leadagama_desc </span><br>";
						}

						?></div>
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
				<h3 class="box-title">Maklumat Sumbangan</h3>
			</div>
			<div class="box-body">
				
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Agensi Penyumbang</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("lookup_desc","pro_lookup","lookup_id",$con->ps_penyumbang) ?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Kekerapan Sumbangan</label>
						<div class="col-md-8"><?php echo ($con->ps_jenis == 1) ? "Bulanan" : "Sekali Sahaja" ?></div>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
					
						<label class="col-md-4">Jumlah Sumbangan </label>
						<div class="col-md-8">RM<?php echo number_format($con->ps_jumlah,2) ?></div>
					</div>
				
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Tarikh</label>
						<div class="col-md-8"><?php 
						if($con->ps_jenis ==1){
							$jenis="Bulanan";
							$date="$con->ps_sdate sehingga $con->ps_edate";
						}else{
							$jenis="Sekali Sahaja";
							$date=$con->ps_sdate;
						}
						
						echo $date ?></div>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
					
						<label class="col-md-4">Jenis Sumbangan </label>
						<div class="col-md-8">
						<?php 
						$this->db->join("pro_lookup b","b.lookup_id = a.psj_jenis");
						$result = $this->blapps_lib->getDataResult("pro_sumbangan_jenis a",array(array("a.psj_sumbangan",base64_decode($this->uri->segment(4)))),"",array("b.lookup_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-check'></i> $row->lookup_desc </span><br>";
						}

						?>	
						</div>
					</div>
				
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Keterangan</label>
						<div class="col-md-8"><?php echo $con->ps_keterangan ?></div>
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
					<div class="col-md-8"><?php echo date("d M Y H:i:sA",strtotime($con->ps_created)) ?> oleh <?php echo $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$con->ps_createdby)?></div>
					</address>
				</div>
				<div class="col-sm-6 invoice-col">
					<address>
					<label class="col-md-4">Tarikh Kemaskini</label>
					<div class="col-md-8"><?php echo date("d M Y H:i:sA",strtotime($con->ps_modified)) ?> oleh <?php echo $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$con->ps_modifiedby)?></div>
					</address>
				</div>	
				</div>
			</div>
		</div>
		</div>
    </div>
	 </section>