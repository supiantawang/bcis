<section class="content-header">
      <h1>
        Senarai Institusi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Institusi</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1"><a href="<?php echo base_url()?>index.php/management/institusi/add"><span class="btn btn-primary">Tambah Baru</span></a><br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th width="15%">Logo</th>
						<th>Kod Institusi</th>
						<th>Nama Institusi</th>
						<th width="8%">Status</th>
						<th width="20%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				$lesson = $this->blapps_lib->getDataResult("ek_institution",array(),"",array("ins_id","ASC"));
				if($lesson){
					$no =  1;
					foreach($lesson as $row){
						$status = "";
						$img = "";

						if($row->ins_active == 1) $status="<span class='label label-success'>Aktif</span>";
						if($row->ins_active == 0) $status="<span class='label label-danger'>Tidak Aktif</span>";
						if($row->ins_link != "") $img="<img src='".base_url().$row->ins_link."' class='img-responsive'>";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$img</td>";
							echo "<td>$row->ins_code</td>";
							echo "<td>$row->ins_name</td>";
							echo "<td>$status</td>";	
							echo "<td>
							<a href='".base_url()."index.php/management/institusi/edit/".base64_encode($row->ins_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->ins_id)."')\">Hapus</span>
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
