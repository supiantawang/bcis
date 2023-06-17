<section class="content-header">
      <h1>
        Senarai Ahli Isi Rumah (AIR)
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Ahli Isi Rumah (AIR)</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				<p>&nbsp;
				
					<button class="btn btn-sm btn-success pull-right" id="tambah"><i class="fa fa-plus"></i> Tambah</button>
				</p>
				<br>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Daerah</th>
						<th>Pos</th>
						<th>Kampung</th>
						<th>Ketua Isi Rumah</th>
						<th>Nama Ahli Isi Rumah</th>
						<th width="13%">No Kad Pengenalan</th>
						<th width="7%">Agama</th>
						<th width="10%">Suku Kaum</th>
						<th width="5%">Status</th>
						<th width="10%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->select("a.*, b.u_full_name as parentname, b.u_ic_number as parenticno,c.kg_nama,d.daerah_name,e.pos_name");
				$this->db->join("pro_kampung c","c.kg_id = a.u_kg_id");
				$this->db->join("pro_pos e","e.pos_id = c.kg_pos_id");
				$this->db->join("pro_daerah d","d.daerah_id = e.pos_daerah");
				$this->db->join("pro_penduduk b","a.u_parent = b.u_id");
				$students = $this->blapps_lib->getDataResult("pro_penduduk a",array(array("a.u_parent NOT IN (0)"),array("a.u_delete",0)),"",array("b.u_id","DESC"));
				if($students){
					$no =  1;
					$status = "";
					foreach($students as $row){
						
						if($row->u_status == 1)
							$status = "<span class='label label-success'>Aktif</span>";
						else
							$status = "<span class='label label-danger'>Tidak Aktif</span>";
						
						$agama = $this->blapps_lib->getData("agama_desc","pro_agama","agama_id",$row->u_religion);
						$tribes = $this->blapps_lib->getData("sukukaum_name","pro_sukukaum","sukukaum_id",$row->u_tribes);
						//$income = $this->blapps_lib->getData("pendapatan_desc","pro_pendapatan","pendapatan_id ",$row->u_occupation);
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->daerah_name</td>";
							echo "<td>$row->pos_name</td>";
							echo "<td>$row->kg_nama</td>";
							echo "<td>$row->parentname <br>[$row->parenticno]</td>";
							echo "<td>$row->u_full_name</td>";
							echo "<td>$row->u_ic_number</td>";
							echo "<td>$agama</td>";
							echo "<td>$tribes</td>";
							echo "<td>$status</td>";
							echo "<td>
							<div class='btn-group btn-group-sm'>
								<span class='btn btn-md btn-info air-view' data-id='".base64_encode($row->u_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Papar'><i class='fa fa-eye'></i></span> 
								
								
								<span class='btn btn-md btn-warning air-edit' data-id='".base64_encode($row->u_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Kemaskini'><i class='fa fa-edit'></i></span> 
								
								
								<span class='btn btn-md btn-danger air-delete' data-id='".base64_encode($row->u_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Hapus'><i class='fa fa-trash'></i></span> 
							</div>
							</td>";
						echo "</tr>";
						$no++;
					}
				}
				?>
				
                
				</tbody>
				</table>
				<p>&nbsp;</p>
            </div>
        </div>
                
   </div>
</div>
</div>