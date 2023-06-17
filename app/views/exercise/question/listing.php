<section class="content-header">
      <h1>
        Senarai Soalan Aktiviti
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li>Aktiviti</li>
        <li class="active">Senarai Soalan Aktiviti</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1"><a href="<?php echo base_url()?>index.php/exercise/addquestion"><span class="btn btn-primary">Tambah Baru</span></a><br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th width="10%">Topik</th>
						<th width="10%">Aktiviti</th>
						<th>Soalan</th>
						<th width="20%">Nama Fail/ Imej</th>
						<th width="10%">Susunan</th>
						<th width="10%">Kategori</th>
						<th width="10%">Status</th>
						<th width="5%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("tb_activity","tb_activity.act_id = tb_activity_question.act_id");
				$this->db->join("tb_topic","tb_topic.topic_id = tb_activity.topic_id");
				$exercises = $this->blapps_lib->getDataResult("tb_activity_question",array(array("act_activity_type",2)),"",array("tb_activity.act_id","ASC"));
				if($exercises){
					$no =  1;
					foreach($exercises as $row){
						$cat = "";
						$sta = "";
						if($row->aque_type == 1) $cat = "MCQ";
						if($row->aque_type == 2) $cat = "True/False";
						if($row->aque_active == 1) $sta = "Aktif";
						if($row->aque_active == 0) $sta = "Tidak Aktif";
						$img = "";
						if($row->aque_link != "") $img = "<img src='".base_url().$row->aque_link."' class='img-responsive'>";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->topic_name</td>";
							echo "<td>$row->act_name</td>";
							echo "<td>$row->aque_name</td>";
							echo "<td>$img</td>";
							echo "<td>$row->aque_order_sort</td>";
							echo "<td>$cat</td>";
							echo "<td>$sta</td>";
							echo "<td>
							<a href='".base_url()."index.php/exercise/editquestion/".base64_encode($row->aque_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->aque_id)."')\">Hapus</span>
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
