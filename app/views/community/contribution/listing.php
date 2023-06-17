<section class="content-header">
      <h1>
        Senarai Penerima Sumbangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Penerima Sumbangan</li>
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
						<th>Agensi Penyumbang</th>
						<th>Penerima</th>
						<th>Kekerapan Sumbangan</th>
						<th>Jumlah </th>
						<th>Tarikh</th>
						<th width="10%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("pro_penduduk b","a.ps_penerima = b.u_id");
				$this->db->join("pro_lookup c","a.ps_penyumbang = c.lookup_id");
				$contribution = $this->blapps_lib->getDataResult("pro_sumbangan a",array(array("a.ps_isdeleted",0)),"",array("a.ps_id","DESC"));
				if($contribution){
					$no =  1;
					$status = "";
					foreach($contribution as $row){
						if($row->ps_jenis ==1){
							$jenis="Bulanan";
							$date="$row->ps_sdate sehingga $row->ps_edate";
						}else{
							$jenis="Sekali Sahaja";
							$date=$row->ps_sdate;
						}
							
							
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->lookup_desc</td>";
							echo "<td>$row->u_full_name <br>($row->u_ic_number)</td>";
							echo "<td>$jenis</td>";
							echo "<td>RM".number_format($row->ps_jumlah,2)."</td>";
							echo "<td>$date</td>";
							echo "<td>
							<div class='btn-group btn-group-sm'>
								<span class='btn btn-md btn-info contri-view'  data-id='".base64_encode($row->ps_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Papar'><i class='fa fa-eye'></i></span> 
								
								
								<span class='btn btn-md btn-warning contri-edit' data-id='".base64_encode($row->ps_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Kemaskini'><i class='fa fa-edit'></i></span> 
								
								
								<span class='btn btn-md btn-danger contri-delete' data-id='".base64_encode($row->ps_id)."' data-toggle='tooltip' data-placement='top' title='Klik Untuk Hapus'><i class='fa fa-trash'></i></span> 
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