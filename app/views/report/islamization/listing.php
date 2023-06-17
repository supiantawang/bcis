<section class="content-header">
      <h1>
        Laporan Pengislaman
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Laporan Pengislaman</li>
      </ol>
    </section>
<?php 
if($this->uri->segment(3) == ""){
	$cek = "checked";
}else{
	$cek = "";
}
?>
<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
            <div class="box-body"><p>&nbsp;</p>
			<form class="form-horizontal" action="<?php echo base_url()?>index.php/report/islamization">
			<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Daerah</label>
					<div class="col-md-5">
						<?php echo form_dropdown("daerah",$daerah,($this->uri->segment(3)) ? $this->uri->segment(3) : "","class='form-control' id='daerah' ")?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Pos</label>
					<div class="col-md-5">
						<?php echo form_dropdown("pos",$pos,($this->uri->segment(4)) ? $this->uri->segment(4) : "","class='form-control' id='pos' ")?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Kampung</label>
					<div class="col-md-5">
						<?php echo form_dropdown("kampung",$kampung,($this->uri->segment(5)) ? $this->uri->segment(5) : "","class='form-control' id='kampung' ")?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Bulan</label>
					<div class="col-md-5">
						<?php echo form_dropdown("bulan",$bulan,($this->uri->segment(6)) ? $this->uri->segment(6) : "","class='form-control' id='bulan' ")?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Tahun</label>
					<div class="col-md-5">
						
						<?php echo form_input("tahun",($this->uri->segment(7)) ? $this->uri->segment(7) : "","class='form-control' id='tahun' maxlength='4'")?>
					</div>
				</div>
				
				<div class="form-group">
				<hr>
					<div class="col-sm-2 col-md-offset-4">
						<button type="reset" class="btn btn-default btn-block btn-sm btn-reset" id="reset">Semula</button>
					</div>
					<div class="col-sm-2">
						<button type="button" class="btn btn-primary btn-block btn-sm btn-search" id="search" data-list="penalty">Carian</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	</div>
	<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
            <div class="box-body">
			<span class="pull-right"><button type="button" class="btn btn-default btn-sm" id="cetak"><i class="fa fa-print"></i> Cetak</button></span>
				<p>&nbsp;</p>
				<h3 align="center">LAPORAN PENGISLAMAN</h3>
                <table class="table table-striped table-bordered1 table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th width="10%">Daerah</th>
						<th width="10%">Pos</th>
						<th width="10%">Kampung</th>
						<th>Nama Penuh</th>
						<th>No Kad Pengenalan</th>
						<th width="10%">Tarikh Pengislaman</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				if($this->uri->segment(3)  && $this->uri->segment(3) != "semua"){
					$this->db->where("d.daerah_id",$this->uri->segment(3));
				}
				if($this->uri->segment(4)  && $this->uri->segment(4) != "semua"){
					$this->db->where("a.u_pos_id",$this->uri->segment(4));
				}				
				if($this->uri->segment(5)  && $this->uri->segment(5) != "semua"){
					$this->db->where("a.u_kg_id",$this->uri->segment(5));
				}				
				if($this->uri->segment(6)  && $this->uri->segment(6) != "semua"){
					$this->db->where("MONTH (a.u_islamdate) =",$this->uri->segment(6));
				}				
				if($this->uri->segment(7)  && $this->uri->segment(7) != "semua"){
					$this->db->where("YEAR (a.u_islamdate) =",$this->uri->segment(7));
				}				
				
				$this->db->join("pro_kampung c","c.kg_id = a.u_kg_id");
				$this->db->join("pro_pos b","b.pos_id = c.kg_pos_id");
				$this->db->join("pro_daerah d","b.pos_daerah = d.daerah_id");
				$this->db->where("a.u_religion",1);//islam sahaja
				$penduduk = $this->blapps_lib->getDataResult("pro_penduduk a",array(),"",array("a.u_islamdate","DESC"));
				if($penduduk){
					$no =  1;
					foreach($penduduk as $row){
						
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->daerah_name</td>";
							echo "<td>$row->pos_name</td>";
							echo "<td>$row->kg_nama</td>";
							echo "<td>$row->u_full_name</td>";
							echo "<td>$row->u_ic_number</td>";
							echo "<td>$row->u_islamdate</td>";
						echo "</tr>";
						$no++;
					}
				}else{
					echo "<tr><td colspan='7' align='center'>Tiada Maklumat</td></tr>";
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
