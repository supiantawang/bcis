<section class="content-header">
  <h1>
    <div class="btn btn-sm btn-default" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></div> Laporan Profil
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li class="active">Laporan Profil</li>
  </ol>
</section>
<section class="content">
	
	<div class="row">
        <div class="col-md-12">
		
		<div class="box box-solid">
			<div class="box-body">
			
			<center><h3>Data Profil Orang Asli Pos Kuala Lah</h3></center>
			
			</div>
		</div>
	</div>
	</div>
	<div class="row">
        <div class="col-md-12">
		
		<div class="box box-solid">
			<div class="box-body">
			<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Kampung</th>
					<th>KIR</th>
					<th>Nama</th>
					<th>Kad Pengenalan</th>
					<th>Jantina</th>
					<th>Suku Kaum</th>
					<th>Agama</th>
					<th>Penghayatan Agama</th>
					<th>Pendidikan Formal</th>
					<th>Pendidikan Agama</th>
					<th>Sumber Pendapatan</th>
					<th>Pekerjaan</th>
					<th>Anggaran Pendapatan</th>
					<th>Ikon/bakat</th>
					<th>Kepimpinan</th>
					<th>Kepimpinan Agama</th>
					<th>Terima Bantuan</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$this->db->join("pro_agama b","b.agama_id = a.u_religion");
			$this->db->join("pro_sukukaum c","c.sukukaum_id = a.u_tribes");
			$this->db->join("pro_kampung d","d.kg_id = a.u_kg_id");
			$this->db->join("pro_tahappendidikan e","e.pendidikan_id = a.u_education");
			$this->db->join("pro_leadagama f","f.leadagama_id = a.u_penghulu");
			$results = $this->blapps_lib->getDataResult("pro_penduduk a",array(array("a.u_kg_id in(7,10)")),"",array("a.u_id","ASC"));
			
			//echo $this->db->last_query();
			$no =1;
			foreach($results as $row){
				$gender 	= "";
				$kepimpinan = "";
				$status = "";
				$kir = "";
				$sumberpendapatan = "";
				$bakat = "";
				$kepimpinanagama = "";
				
				if($row->u_parent != 0)
				$kir = $this->blapps_lib->getData("u_full_name","pro_penduduk","u_id",$row->u_parent);
				
				
				if($row->u_gender =='M') $gender = "LELAKI";
				if($row->u_gender =='F') $gender = "PEREMPUAN";
				
				$pendidikanagama = $this->blapps_lib->getData("pendidikan_desc","pro_pendidikan","pendidikan_id",$row->u_edureligion);
				
				if($row->u_penghulu == 1) $kepimpinan = "Penghulu/ Batin";
				if($row->u_penghulu == 2) $kepimpinan = "JPKKOA";
				if($row->u_penghulu == 3) $kepimpinan = "Tiada";
				if($row->u_penghulu == 0) $kepimpinan = "Lain-lain";
				
				
				if($row->u_status == 1) $status = "Aktif";
				if($row->u_status == 2) $status = "Pindah";
				if($row->u_status == 3) $status = "Mati";
				
				//sumber pendapatan
				$this->db->join("pro_pendapatan b","b.pendapatan_id = a.ppi_pendapatan");
				$sourceincome = $this->blapps_lib->getDataResult("pro_penduduk_pendapatan a",array(array("a.ppi_penduduk",$row->u_id)),"",array("a.ppi_id","ASC"));
				$elements = array();
				foreach($sourceincome as $inc){
					$elements[] = $inc->pendapatan_desc;
				}
				$sumberpendapatan = implode(' | ', $elements);
				
				//Ikon/bakat
				$this->db->join("pro_bakat b","b.bakat_id = a.ppb_bakat");
				$sourceincome = $this->blapps_lib->getDataResult("pro_penduduk_bakat a",array(array("a.ppb_penduduk",$row->u_id)),"",array("a.ppb_id","ASC"));
				$elements2 = array();
				foreach($sourceincome as $inc){
					$elements2[] = $inc->bakat_desc;
				}
				$bakat = implode(' | ', $elements2);
				
				//Kepimpinan Agama
				$this->db->join("pro_leadagama b","b.leadagama_id = a.ppl_leadagama");
				$sourceincome = $this->blapps_lib->getDataResult("pro_penduduk_leadagama a",array(array("a.ppl_penduduk",$row->u_id)),"",array("a.ppl_id","ASC"));
				$elements3 = array();
				foreach($sourceincome as $inc){
					$elements3[] = $inc->leadagama_desc;
				}
				$kepimpinanagama = implode(' | ', $elements3);
				
				//penerima bantuan
				$cek = $this->blapps_lib->getDataResult("pro_sumbangan",array(array("ps_penerima",$row->u_id)),"",array("ps_id","ASC"));
				
				if($cek){
					$bantuan = "Ya";
				}else{
					$bantuan = "Tidak";
				}
			echo "
				<tr>
					<td>$no</td>
					<td>$row->kg_nama</td>
					<td>$kir</td>
					<td>$row->u_full_name</td>
					<td>'$row->u_ic_number</td>
					<td>$gender</td>
					<td>$row->sukukaum_name</td>
					<td>$row->agama_desc</td>
					<td>$row->u_religious</td>
					<td>$row->pendidikan_desc</td>
					<td>$pendidikanagama</td>
					<td>$sumberpendapatan</td>
					<td>$row->u_employment</td>
					<td>$row->u_income</td>
					<td>$bakat</td>
					<td>$kepimpinan</td>
					<td>$kepimpinanagama</td>
					<td>$bantuan</td>
					<td>$status</td>
				</tr>";
			$no++;
			}
			?>
			</tbody>
			</table>
			</div>
		</div>
	</div>
	</div>
	
   
</section>
