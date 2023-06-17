<section class="content-header">
      <h1>
        Senarai Peserta
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Peserta</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				<p>&nbsp;</p>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Nama</th>
						<th width="20%">No Kad Pengenalan</th>
						<th width="10%">No Telefon</th>
						<th width="10%">Status</th>
						<th width="15%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$students = $this->blapps_lib->getDataResult("tb_users",array(array("u_status_active",0)),"",array("u_id","ASC"));
				if($students){
					$no =  1;
					foreach($students as $row){
						//if($row->u_status_active == 1)
						$status = "<span class='label label-info'>Menunggu Pengesahan</span>";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->u_full_name</td>";
							echo "<td>$row->u_ic_number</td>";
							echo "<td>$row->u_phone_number</td>";
							echo "<td>$status</td>";
							echo "<td>
							<a href='".base_url()."index.php/student/edit/".base64_encode($row->u_id)."'><span class='btn btn-xs btn-warning'>Sahkan</span></a>
							<!--<a href='#'><span class='btn btn-xs btn-info'>Papar</span></a>-->
							<span class='btn btn-xs btn-danger'>Hapus</span>
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
