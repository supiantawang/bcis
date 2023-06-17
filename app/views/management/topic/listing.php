<section class="content-header">
      <h1>
        Senarai Topik Mengikut Institusi
      </h1> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Topik</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1">
					<a href="<?php echo base_url()?>index.php/management/topic/add"><span class="btn btn-primary">Tambah Baru</span></a>
					<a href="<?php echo base_url()?>index.php/management/topic/listing"><span class="btn btn-info">Senarai Topik</span></a>
					
				<br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Nama Institusi</th>
						<th>Nama Topik</th>
						<th>Turutan</th>
						<th width="10%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("ek_institution","ek_institution.ins_id = tb_topic_institution.ins_id");
				$this->db->join("tb_topic","tb_topic.topic_id = tb_topic_institution.topic_id");
				$results = $this->blapps_lib->getDataResult("tb_topic_institution",array(),"",array("ek_institution.ins_id","ASC"));
				if($results){
					$no =  1;
					foreach($results as $row){
						$status = "";

						if($row->topic_type == 1) $status="<span class='label label-success'>Mandatori</span>";
						if($row->topic_type == 2) $status="<span class='label label-danger'>Added Value</span>";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->ins_name</td>";
							echo "<td>$row->topic_name</td>";
							echo "<td>$row->topic_sort</td>";
							echo "<td>
							<a href='".base_url()."index.php/management/topic/edit/".base64_encode($row->topic_institution_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->topic_institution_id)."')\">Hapus</span>
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
