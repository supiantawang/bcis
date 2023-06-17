<section class="content-header">
      <h1>
        Senarai Aktiviti
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Aktiviti</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1"><a href="<?php echo base_url()?>index.php/exercise/add"><span class="btn btn-primary">Tambah Baru</span></a><br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th width="20%">Topik</th>
						<th>Nama Aktiviti</th>
						<th width="10%">Susunan</th>
						<th width="10%">Kategori</th>
						<th width="10%">Status</th>
						<th width="10%">Masa Untuk Selesai</th>
						<th width="5%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("tb_topic_institution","tb_topic_institution.topic_institution_id = tb_activity.topic_id");
				$this->db->join("tb_topic","tb_topic.topic_id = tb_topic_institution.topic_id");
				$exercises = $this->blapps_lib->getDataResult("tb_activity",array(array("act_activity_type",2)),"",array("tb_activity.topic_id","ASC"));
				if($exercises){
					$no =  1;
					foreach($exercises as $row){
						$cat = "";
						$sta = "";
						if($row->act_category == 1) $cat = "Mandatori";
						if($row->act_category == 2) $cat = "Added Value";
						if($row->act_active == 1) $sta = "Aktif";
						if($row->act_active == 0) $sta = "Tidak Aktif";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->topic_name </td>";
							echo "<td>$row->act_name</td>";
							echo "<td>$row->act_order_sort</td>";
							echo "<td>$cat</td>";
							echo "<td>$sta</td>";
							echo "<td>$row->act_min_completion_time minit</td>";
							echo "<td>
							<a href='".base_url()."index.php/exercise/edit/".base64_encode($row->act_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->act_id)."')\">Hapus</span>
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
