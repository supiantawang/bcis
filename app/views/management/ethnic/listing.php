<section class="content-header">
      <h1>
        Senarai Suku Kaum
      </h1> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Suku Kaum</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1">
					<a href="<?php echo base_url()?>index.php/management/ethnic/add"><span class="btn btn-primary">Tambah Baru</span></a>
				<br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Nama Suku Kaum</th>
						<th>Etnik</th>
						<th>Status</th>
						<th width="20%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$results = $this->blapps_lib->getDataResult("pro_sukukaum",array(),"",array("sukukaum_id","ASC"));
				if($results){
					$no =  1;
					foreach($results as $row){
						$status = "";

						if($row->sukukaum_status == 1) $status="<span class='label label-success'>Aktif</span>";
						if($row->sukukaum_status == 0) $status="<span class='label label-danger'>Tidak Aktif</span>";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->sukukaum_name</td>";
							echo "<td>$row->sukukaum_etnik</td>";
							echo "<td>$status</td>";
							echo "<td>
							<a href='".base_url()."index.php/management/ethnic/edit/".base64_encode($row->sukukaum_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->sukukaum_id)."')\">Hapus</span>
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
