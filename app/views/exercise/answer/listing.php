<section class="content-header">
      <h1>
        Senarai Jawapan Latihan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li>Latihan</li>
        <li class="active">Senarai Jawapan Latihan</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1"><a href="<?php echo base_url()?>index.php/exercise/addanswer"><span class="btn btn-primary">Tambah Baru</span></a><br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Topik</th>
						<th>Soalan</th>
						<th>Kategori</th>
						<th>Jawapan A</th>
						<th>Jawapan B</th>
						<th>Jawapan C</th>
						<th>Jawapan D</th>
						<th>Jawapan MCQ</th>
						<th>Jawapan True/False</th>
						<th width="5%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("tb_activity_question","tb_activity_question.aque_id = tb_activity_answer.aque_id");
				$this->db->join("tb_activity","tb_activity.act_id = tb_activity_question.act_id");
				$this->db->join("tb_topic","tb_topic.topic_id = tb_activity.topic_id");
				$results = $this->blapps_lib->getDataResult("tb_activity_answer",array(array("act_activity_type",2)),"",array("tb_activity_answer.acta_id","ASC"));
				if($results){
					$no =  1;
					foreach($results as $row){
						$cat = "";
						$sta = "";
						if($row->aque_type == 1) $cat = "MCQ";
						if($row->aque_type == 2) $cat = "True/False";

						$img = "";
						if($row->aque_link != "") $img = "<img src='".base_url().$row->aque_link."' class='img-responsive'>";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->topic_name</td>";
							echo "<td>$row->aque_name</td>";
							echo "<td>$cat</td>";
							echo "<td>$row->acta_answer_a</td>";
							echo "<td>$row->acta_answer_b</td>";
							echo "<td>$row->acta_answer_c</td>";
							echo "<td>$row->acta_answer_d</td>";
							echo "<td>$row->acta_answer_mcq</td>";
							echo "<td>$row->acta_answer_tf</td>";
							echo "<td>
							<a href='".base_url()."index.php/exercise/editanswer/".base64_encode($row->acta_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->acta_id)."')\">Hapus</span>
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
