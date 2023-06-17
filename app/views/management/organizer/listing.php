<section class="content-header">
      <h1>
        Senarai Agensi Penganjur 
      </h1> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Agensi Penganjur</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1">
					<a href="<?php echo base_url()?>index.php/management/organizer/add"><span class="btn btn-primary">Tambah Baru</span></a>
				<br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Nama Agensi</th>
						<th>Alamat</th>
						<th>No Telefon</th>
						<th>Kategori Agensi </th>
						<th>Keterangan </th>
						<th width="20%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("pro_agensi_type b","b.type_id =a.agensi_type");
				$results = $this->blapps_lib->getDataResult("pro_agensi a",array(array("a.agensi_isdeleted",0)),"",array("a.agensi_name","ASC"));
				if($results){
					$no =  1;
					foreach($results as $row){

						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->agensi_name</td>";
							echo "<td>$row->agensi_address</td>";
							echo "<td>$row->agensi_phone</td>";
							echo "<td>$row->type_desc</td>";
							echo "<td>$row->agensi_desc</td>";
							echo "<td>
							<a href='".base_url()."index.php/management/organizer/edit/".base64_encode($row->agensi_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->agensi_id)."')\">Hapus</span>
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
