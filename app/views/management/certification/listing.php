<section class="content-header">
      <h1>
        Senarai Templat Sijil
      </h1> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Templat Sijil</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1">
					<a href="<?php echo base_url()?>index.php/management/certification/add"><span class="btn btn-primary">Tambah Baru</span></a>
				<br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Nama Institusi</th>
						<th>Tajuk Sijil</th>
						<th>Status</th>
						<th width="20%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("ek_institution","ek_institution.ins_id = tb_cert_tpl.ins_id");
				$results = $this->blapps_lib->getDataResult("tb_cert_tpl",array(),"",array("cert_id","ASC"));
				if($results){
					$no =  1;
					foreach($results as $row){
						$status = "";

						if($row->cert_active == 1) $status="<span class='label label-success'>Aktif</span>";
						if($row->cert_active == 0) $status="<span class='label label-danger'>Tidak Aktif</span>";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->ins_name</td>";
							echo "<td>$row->cert_title</td>";
							echo "<td>$status</td>";
							echo "<td>
							<a href='".base_url()."index.php/management/certification/item/".base64_encode($row->cert_id)."'><span class='btn btn-xs btn-info'>Item</span></a>
							<a href='".base_url()."index.php/management/certification/view/".base64_encode($row->cert_id)."'><span class='btn btn-xs btn-info'>Papar</span></a>
							<a href='".base_url()."index.php/management/certification/edit/".base64_encode($row->cert_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
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
