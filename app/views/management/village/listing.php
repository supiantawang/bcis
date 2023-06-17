<section class="content-header">
      <h1>
        Senarai Kampung
      </h1> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Kampung</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1">
					<a href="<?php echo base_url()?>index.php/management/village/add"><span class="btn btn-primary">Tambah Baru</span></a>					
				<br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Nama Pos</th>
						<th>Nama Kampung</th>
						<th>Sejarah</th>
						<th width="15%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("pro_pos","pro_pos.pos_id = pro_kampung.kg_pos_id");
				$results = $this->blapps_lib->getDataResult("pro_kampung",array(),"",array("pro_kampung.kg_pos_id","ASC"));
				if($results){
					$no =  1;
					foreach($results as $row){
						$status = "";

						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->pos_name</td>";
							echo "<td>$row->kg_nama</td>";
							echo "<td>$row->kg_sejarah</td>";
							echo "<td>
							<span class='btn btn-xs btn-info village-view' data-id='".base64_encode($row->kg_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Papar'>Papar</span> 
							<a href='".base_url()."index.php/management/village/edit/".base64_encode($row->kg_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->kg_id)."')\">Hapus</span>
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
