<section class="content-header">
      <h1>
        Senarai Topik
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
					<a href="<?php echo base_url()?>index.php/management/topic/addtopic"><span class="btn btn-primary">Tambah Baru</span></a>	
					<a href="<?php echo base_url()?>index.php/management/topic"><span class="btn btn-info">Senarai Topik Mengikut Institusi</span></a>					
				<br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th width="25%">Nama Topik</th>
						<th>Keterangan</th>
						<th width="5%">Audio</th>
						<th width="10%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$results = $this->blapps_lib->getDataResult("tb_topic",array(),"",array("topic_id","ASC"));
				if($results){
					$no =  1;
					foreach($results as $row){
						$audio =  "";
						if($row->topic_link != ""){
							$audio =  "<audio controls>
							  <source src=\"".base_url().$row->topic_link."\" type=\"audio/ogg\">
							  <source src=\"".base_url().$row->topic_link."\" type=\"audio/mpeg\">
							Your browser does not support the audio element.
							</audio>";
						}
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->topic_name</td>";
							
							echo "<td>$row->topic_desc</td>";
							echo "<td>$audio</td>";
							echo "<td>
							<a href='".base_url()."index.php/management/topic/editmaintopic/".base64_encode($row->topic_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->topic_id)."')\">Hapus</span>
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
