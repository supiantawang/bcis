<section class="content-header">
  <h1>
    <div class="btn btn-sm btn-default" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></div> Maklumat Ketua Isi Rumah
	<button class="btn btn-sm btn-info" onclick="PrintElem('div-print'); return false"><i class="fa fa-print"></i> Cetak</button>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Ahli Isi Rumah</a></li>
    <li class="active">Maklumat Ketua Isi Rumah</li>
  </ol>
</section>
	<section class="content">
	
	<div id="div-print">
	<div class="row">
        <div class="col-md-12">
		
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Ketua Isi Rumah</h3>
			</div>
			<div class="box-body">
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Pos</label>
						<div class="col-md-8"><?php 
						$posid = $this->blapps_lib->getData("kg_pos_id","pro_kampung","kg_id ",$kir->u_kg_id);
						echo $this->blapps_lib->getData("pos_name","pro_pos","pos_id",$posid) ?></div>
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
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Jantina</label>
						<div class="col-md-8"><?php echo ($kir->u_gender == "M") ? "LELAKI" : "PEREMPUAN" ?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Suku Kaum</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("sukukaum_name","pro_sukukaum","sukukaum_id",$kir->u_tribes) ?></div>
					</div>
						
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Agama</label>
						<div class="col-md-8">
							<?php 
							echo $this->blapps_lib->getData("agama_desc","pro_agama","agama_id",$kir->u_religion) ;
							
							if($kir->u_religion == 1){

								if($kir->u_islamdate == "" || $kir->u_islamdate == "NULL" || $kir->u_islamdate == "0000-00-00" )
									$islam = "Tiada Maklumat";
								else
									$islam = date("d/m/Y",strtotime($kir->u_islamdate));
								echo " (Tarikh Pengislaman: ".$islam.")";
							}
								
							
							?>
						</div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Penghayatan Agama</label>
						<div class="col-md-8"><?php echo $kir->u_religious ?></div>
					</div>	
				
					
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Pendidikan Formal </label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("pendidikan_desc","pro_tahappendidikan","pendidikan_id",$kir->u_education) ?></div>
					</div>	
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Pendidikan Agama</label>
						<div class="col-md-8"><?php echo ($kir->u_edureligion != 0) ? $this->blapps_lib->getData("pendidikan_desc","pro_pendidikan","pendidikan_id",$kir->u_edureligion) : "" ?></div>
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
						<div class="col-md-8"><?php echo $kir->u_employment ?></div>
					</div>
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Anggaran Pendapatan</label>
						<div class="col-md-8">RM<?php echo $kir->u_income ?></div>
					</div>
					
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Ikon/bakat</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_bakat","pro_bakat.bakat_id  = pro_penduduk_bakat.ppb_bakat");
						$result = $this->blapps_lib->getDataResult("pro_penduduk_bakat",array(array("ppb_penduduk",base64_decode($this->uri->segment(4)))),"",array("ppb_id","asc"));
						foreach($result as $row){
							echo "<span><i class='fa fa-check'></i> $row->bakat_desc </span><br>";
						}

						?></div>
					</div>
				</div>
				<div class="row invoice-col">
					
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Kepimpinan</label>
						<div class="col-md-8">
							<?php 
							if ($kir->u_penghulu == 1){
								echo "Penghulu";
							}elseif($kir->u_penghulu == 2){
								echo "JPKKOA";
							}elseif($kir->u_penghulu == 3){
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
						if($kir->u_status == 1)
							echo  "Aktif";
						if($kir->u_status == 2)
							echo  "Pindah";
						if($kir->u_status == 3)
							echo  "Mati";
						
						?>
						</div>
					</div>	
					
				</div>
			</div>
		</div>
		</div>
	</div>
		

    <?php
    $child = $this->blapps_lib->getDataResult("pro_penduduk",array(array("u_parent",$kir->u_id)),"",array("u_id","ASC"));
    if($child){
        $no = 1;
        foreach($child as $air){
    ?>

<div class="row">
        <div class="col-md-12">
		
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Ahli Isi Rumah <?php echo $no?></h3>
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
    <?php
        $no++;
        }
    }
    ?>
</div>
	 </section>
	 <script>
function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=800,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
</script>