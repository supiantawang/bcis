<section class="content-header">
      <h1>
        Senarai Pos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Pos</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1"><a href="<?php echo base_url()?>index.php/management/posinfo/add"><span class="btn btn-primary">Tambah Baru</span></a><br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Nama Pos</th>
						<th>Lokasi</th>
						<th>Koordinat (GPS)</th>
						<th>Keluasan</th>
						<th>Jumlah Kampung</th>
						<th>Jumlah Penduduk</th>
						<th>Status</th>
						<th width="10%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				$results = $this->blapps_lib->getDataResult("pro_pos",array(),"",array("pos_id","ASC"));
				if($results){
					$no =  1;
					foreach($results as $row){
						$status = "";

						if($row->pos_status == 1) $status="<span class='label label-success'>Aktif</span>";
						if($row->pos_status == 0) $status="<span class='label label-danger'>Tidak Aktif</span>";
						$gps = ($row->pos_latitude && $row->pos_longitude) ? "$row->pos_latitude, $row->pos_longitude" : "";
						$luas = ($row->pos_keluasan) ? "$row->pos_keluasan ekar" : "";
						$kg = ($row->pos_bil_kampung) ? "$row->pos_bil_kampung buah" : "";
						$penduduk = ($row->pos_bil_penduduk) ? "$row->pos_bil_penduduk orang" : "";
						
						$location = $this->blapps_lib->getData("daerah_name","pro_daerah","daerah_id",$row->pos_daerah);
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->pos_name</td>";
							echo "<td>$location</td>";
							echo "<td>$gps</td>";
							echo "<td>$luas</td>";
							echo "<td>$kg</td>";
							echo "<td>$penduduk</td>";
							echo "<td>$status</td>";
							echo "<td>
							<a href='".base_url()."index.php/management/posinfo/edit/".base64_encode($row->pos_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->pos_id)."')\">Hapus</span>
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
