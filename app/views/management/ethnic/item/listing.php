<section class="content-header">
      <h1>
        Senarai Item Sijil
      </h1> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Item Sijil</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1">
					<a href="<?php echo base_url()?>index.php/management/certification/additem"><span class="btn btn-primary">Tambah Baru</span></a>
					<a target="_blank" href="<?php echo base_url()?>index.php/management/certification/view/<?php echo $this->uri->segment(4)?>"><span class="btn btn-info">Papar</span></a>
				<br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th width="10%">Jenis</th>
						<th>Perkara</th>
						<th>Susunan</th>
						<th>Status</th>
						<th width="10%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$this->db->join("tb_cert_tpl","tb_cert_tpl.cert_id = tb_cert_item.cert_id");
				$results = $this->blapps_lib->getDataResult("tb_cert_item",array(),"",array("item_id","ASC"));
				if($results){
					$no =  1;
					foreach($results as $row){
						$status = "";

						if($row->item_status == 1) $status="<span class='label label-success'>Aktif</span>";
						if($row->item_status == 0) $status="<span class='label label-danger'>Tidak Aktif</span>";
						$value = $row->item_value;
						if($row->item_type == "image")$value ="<img src='".base_url().$row->item_value."' width='200px'>";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->item_type</td>";
							echo "<td>$value</td>";
							echo "<td>$row->item_ordering</td>";
							echo "<td>$status</td>";
							echo "<td>
							<a href='".base_url()."index.php/management/certification/edititem/".base64_encode($row->item_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->item_id)."')\">Hapus</span>
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
