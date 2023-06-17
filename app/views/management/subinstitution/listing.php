<section class="content-header">
      <h1>
        Senarai SubInstitusi (Cawangan)
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai (Cawangan)</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1"><a href="<?php echo base_url()?>index.php/management/subinstitution/add"><span class="btn btn-primary">Tambah Baru</span></a><br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Nama Institusi</th>
						<th>Nama SubInstitusi</th>
						<th>Alamat</th>
						<th>No Telefon</th>
						<th>Keterangan</th>
						<th>Status</th>
						<th width="10%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				if(get_cookie("_urole") != 1){
					$location = $this->blapps_lib->getData("u_location","ek_admin","u_id",get_cookie("_userID"));
					$insid = $this->blapps_lib->getData("id_institution","ek_subinstitution","sub_id",$location);
					$this->db->where("ek_subinstitution.id_institution",$insid);
				}
				$this->db->join("ek_institution","ek_institution.ins_id = ek_subinstitution.id_institution");
				$results = $this->blapps_lib->getDataResult("ek_subinstitution",array(),"",array("id_institution","ASC"));
				if($results){
					$no =  1;
					foreach($results as $row){
						$status = "";

						if($row->sub_status == 1) $status="<span class='label label-success'>Aktif</span>";
						if($row->sub_status == 0) $status="<span class='label label-danger'>Tidak Aktif</span>";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->ins_code <br><small>$row->ins_name</small></td>";
							echo "<td>$row->sub_code <br><small>$row->sub_name</small></td>";
							echo "<td>$row->sub_address</td>";
							echo "<td>$row->sub_phoneno</td>";
							echo "<td>$row->sub_description</td>";
							echo "<td>$status</td>";
							echo "<td>
							<a href='".base_url()."index.php/management/subinstitution/edit/".base64_encode($row->sub_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->sub_id)."')\">Hapus</span>
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
