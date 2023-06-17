<section class="content-header">
      <h1>
        Senarai Program Diperlukan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Program Diperlukan</li>
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
						<th>Tajuk Program</th>
						<th width="10%">Kategori Program</th>
						<th width="10%">Agensi</th>
						<th width="5%">Tarikh Program</th>
						<th width="10%">Kos</th>
						<th width="10%">Jumlah Peserta</th>
						<th width="10%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("pro_agensi b","b.agensi_id = a.program_agency");
				$this->db->join("pro_program_kategori c","c.kategori_id = a.program_category");
				$students = $this->blapps_lib->getDataResult("pro_program a",array(array("a.program_status",1),array("a.program_delete",0),array("a.program_isrequired",2)),"",array("a.program_id ","DESC"));
				if($students){
					$no =  1;
					$status = "";
					foreach($students as $row){
						
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->program_title</td>";
							echo "<td>$row->kategori_desc</td>";
							echo "<td>$row->agensi_name</td>";
							echo "<td>$row->program_sdate</td>";
							echo "<td>RM".number_format($row->program_cost,"2")."</td>";
							echo "<td>$row->program_totalparticipant</td>";
							echo "<td>
							<div class='btn-group btn-group-sm'>
								<span class='btn btn-md btn-info program-view' data-id='".base64_encode($row->program_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Papar'><i class='fa fa-eye'></i></span> 
								
								
								<span class='btn btn-md btn-warning program-edit' data-id='".base64_encode($row->program_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Kemaskini'><i class='fa fa-edit'></i></span> 
								
								
								<span class='btn btn-md btn-danger program-delete' data-id='".base64_encode($row->program_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Hapus'><i class='fa fa-trash'></i></span> 
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