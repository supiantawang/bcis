
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" action="<?php echo base_url()?>index.php/report/participant">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4 offset-md-4">
						<div class="form-group">
							<label>IC Number</label>
							<div>
								<?php echo form_input("icno", "","class='form-control' id='icno' ")?>
							</div>
						</div>
						<div class="form-group">
							<label>Name</label>
							<div>
								<?php echo form_input("name", "","class='form-control' id='name' ")?>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="text-center">
						<button type="reset" class="btn btn-secondary btn-reset" id="reset"><i class="fa fa-rotate-left"></i> Reset</button>
						<button type="button" class="btn btn-primary  btn-search" id="search" data-list="penalty"><i class="fa fa-search"></i> Search</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	
	<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-body" id="div-content">
			<p>&nbsp;</p>
		<div class="row">
			<div class="col-lg-2 col-xs-6 offset-md-4">
			<div class="small-box bg-info">
				<div class="inner">
				<h3>Add New </h3>
				<h5>Registration</h5>
				</div>
				<div class="icon">
				<i class="fa fa-user-plus"></i>
				</div>
				<a href="<?php echo base_url()?>index.php/community/kir/add" class="small-box-footer">Go To Add <i class="fa fa-arrow-circle-right"></i></a>
			</div>
			</div>
			<div class="col-lg-2 col-xs-6">
			<div class="small-box bg-pink">
				<div class="inner">
				<h3>Report </h3>
				<h5>Registration</h5>
				</div>
				<div class="icon">
				<i class="fa fa-chart-pie"></i>
				</div>
				<a href="<?php echo base_url()?>index.php/report/participant" class="small-box-footer">View Report <i class="fa fa-arrow-circle-right"></i></a>
			</div>
			</div>
			

		</div>
		</div>
	</div>
		<!-- <div class="card">
            
            <div class="card-body">
				<p>&nbsp;
				
					<button class="btn btn-sm btn-success pull-right" id="tambah"><i class="fa fa-plus"></i> Add New</button>
				</p>
				<br>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Daerah</th>
						<th>Pos</th>
						<th>Kampung</th>
						<th>Nama</th>
						<th width="13%">No Kad Pengenalan</th>
						<th width="10%">Agama</th>
						<th width="10%">Suku Kaum</th>
						<th width="5%">Status</th>
						<th width="10%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("pro_kampung c","c.kg_id = a.u_kg_id");
				$this->db->join("pro_pos b","b.pos_id = c.kg_pos_id");
				$this->db->join("pro_daerah d","d.daerah_id = b.pos_daerah");
				$students = $this->blapps_lib->getDataResult("pro_penduduk a",array(array("a.u_parent",0),array("a.u_delete",0)),"",array("a.u_id","DESC"));
				if($students){
					$no =  1;
					$status = "";
					foreach($students as $row){
						
						if($row->u_status == 1)
							$status = "<span class='label label-success'>Aktif</span>";
						else if($row->u_status == 2)
							$status = "<span class='label label-warning'>Pindah</span>";
						else
							$status = "<span class='label label-danger'>Mati</span>";
						
						$agama = $this->blapps_lib->getData("agama_desc","pro_agama","agama_id",$row->u_religion);
						$tribes = $this->blapps_lib->getData("sukukaum_name","pro_sukukaum","sukukaum_id",$row->u_tribes);
						//$income = $this->blapps_lib->getData("pendapatan_desc","pro_pendapatan","pendapatan_id ",$row->u_occupation);
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->daerah_name</td>";
							echo "<td>$row->pos_name</td>";
							echo "<td>$row->kg_nama</td>";
							echo "<td>$row->u_full_name</td>";
							echo "<td>$row->u_ic_number</td>";
							echo "<td>$agama</td>";
							echo "<td>$tribes</td>";
							echo "<td>$status</td>";
							echo "<td>
							<div class='btn-group btn-group-sm'>
								<span class='btn btn-md btn-info kir-view' data-id='".base64_encode($row->u_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Papar'><i class='fa fa-eye'></i></span> 
								
								
								<span class='btn btn-md btn-warning kir-edit' data-id='".base64_encode($row->u_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Kemaskini'><i class='fa fa-edit'></i></span> 
								
								
								<span class='btn btn-md btn-danger kir-delete' data-id='".base64_encode($row->u_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Hapus'><i class='fa fa-trash'></i></span> 
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
        </div> -->
                
   </div>
</div>
</div>
