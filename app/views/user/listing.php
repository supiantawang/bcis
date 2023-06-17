<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="card">
            
            <div class="card-body">
				
				<div class="text-right"><a href="<?php echo base_url()?>index.php/user/add"><span class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</span></a><br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Nama Akaun</th>
						<th width="25%">No Kad Pengenalan</th>
						<th width="15%">Peranan</th>
						<th width="15%">Daerah</th>
						<th width="20%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				if(get_cookie("_urole") == "4"){ // Admin Middle
					$location = $this->blapps_lib->getData("u_location","ek_admin","u_id",get_cookie("_userID"));
					if($location)
						$this->db->where("ek_admin.u_location",$location);
					$this->db->where("ek_admin.u_role in(4,5)");
				}
				if(get_cookie("_urole") == "2"){ // Admin Main
					$this->db->where("ek_admin.u_role in(2,3,4,5)");
				}
				$this->db->where("ek_admin.u_id not in(1)");
				$this->db->join("ek_lkprole","ek_lkprole.role_id = ek_admin.u_role");
				$this->db->join("pro_daerah","pro_daerah.daerah_id = ek_admin.u_location");
				$exercises = $this->blapps_lib->getDataResult("ek_admin",array(),"",array("u_id","ASC"));
				if($exercises){
					$no =  1;
					foreach($exercises as $row){
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->u_fullname</td>";
							echo "<td>$row->u_loginname</td>";
							echo "<td>$row->role_desc</td>";
							echo "<td>$row->daerah_name</td>";
							echo "<td>
							<a href='".base_url()."index.php/user/edit/".base64_encode($row->u_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<a href='".base_url()."index.php/user/change/".base64_encode($row->u_id)."'><span class='btn btn-xs btn-info'>Tukar Kata Laluan</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->u_id)."')\">Hapus</span>
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
