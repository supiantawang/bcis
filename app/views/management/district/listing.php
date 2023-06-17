<section class="content-header">
      <h1>
        Senarai Daerah
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Senarai Daerah</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box">
            
            <div class="box-body">
				
				<div class="text-right1"><a href="<?php echo base_url()?>index.php/management/district/add"><span class="btn btn-primary">Tambah Baru</span></a><br><br></div>
                <table class="table table-striped table-bordered table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th>Nama Daerah</th>
						<th width="20%">Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				$lesson = $this->blapps_lib->getDataResult("pro_daerah",array(),"",array("daerah_id","ASC"));
				if($lesson){
					$no =  1;
					foreach($lesson as $row){
						
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->daerah_name</td>";
							echo "<td>
							<a href='".base_url()."index.php/management/district/edit/".base64_encode($row->daerah_id)."'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('".base64_encode($row->daerah_id)."')\">Hapus</span>
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
