<section class="content-header">
      <h1>
        Senarai Isu Dalam Komuniti
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Isu</li>
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
						<th>Jenis Isu</th>
						<th>Isu</th>
						<th>Keterangan</th>
						<th>Nama Kampung</th>
						<th>Tarikh</th>
						<th width="10%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("pro_kampung b","a.isu_kg = b.kg_id");
				$this->db->join("pro_isu_type c","a.isu_type = c.type_id");
				$students = $this->blapps_lib->getDataResult("pro_isu a",array(array("isu_delete",0)),"",array("isu_id","DESC"));
				if($students){
					$no =  1;
					$status = "";
					foreach($students as $row){
						
						//$jenis = $this->blapps_lib->getData("agama_desc","pro_agama","agama_id",$row->u_religion);
						//$tribes = $this->blapps_lib->getData("sukukaum_name","pro_sukukaum","sukukaum_id",$row->u_tribes);
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->type_desc</td>";
							echo "<td>$row->isu_title</td>";
							echo "<td>$row->isu_remarks</td>";
							echo "<td>$row->kg_nama</td>";
							echo "<td>$row->isu_date</td>";
							echo "<td>
							<div class='btn-group btn-group-sm'>
								<span class='btn btn-md btn-info issue-view'  data-id='".base64_encode($row->isu_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Papar'><i class='fa fa-eye'></i></span> 
								
								
								<span class='btn btn-md btn-warning issue-edit' data-id='".base64_encode($row->isu_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Kemaskini'><i class='fa fa-edit'></i></span> 
								
								
								<span class='btn btn-md btn-danger issue-delete' data-id='".base64_encode($row->isu_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Hapus'><i class='fa fa-trash'></i></span> 
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