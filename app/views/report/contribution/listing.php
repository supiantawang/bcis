<section class="content-header">
      <h1>
        Laporan Sumbangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Laporan Sumbangan</li>
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
				<h3 align="center">LAPORAN SUMBANGAN</h3>
                <table class="table table-striped table-bordered1 table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th width="10%">Daerah</th>
						<th width="10%">Pos</th>
						<th width="10%">Kampung</th>
						<th width="10%">Agensi Penyumbang</th>
						<th>Nama Penuh</th>
						<th>No Kad Pengenalan</th>
						<th>Kekerapan Sumbangan</th>
						<th>Jumlah</th>
						<th width="15%">Tarikh</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				if($this->uri->segment(3)  && $this->uri->segment(3) != "semua"){
					$this->db->where("f.daerah_id",$this->uri->segment(3));
				}
				if($this->uri->segment(4)  && $this->uri->segment(4) != "semua"){
					$this->db->where("b.pos_id",$this->uri->segment(4));
				}				
				if($this->uri->segment(5)  && $this->uri->segment(5) != "semua"){
					$this->db->where("c.kg_id",$this->uri->segment(5));
				}				
				
				
				$this->db->join("pro_penduduk a","a.u_id = d.ps_penerima");
				$this->db->join("pro_kampung c","c.kg_id = a.u_kg_id");
				$this->db->join("pro_pos b","b.pos_id = c.kg_pos_id");
				$this->db->join("pro_daerah f","f.daerah_id = b.pos_daerah");
				$this->db->join("pro_lookup e","d.ps_penyumbang = e.lookup_id");

				$this->db->where("d.ps_isdeleted",0);
				$penduduk = $this->blapps_lib->getDataResult("pro_sumbangan d",array(),"",array("d.ps_id","DESC"));
				if($penduduk){
					$no =  1;
					foreach($penduduk as $row){
						if($row->ps_jenis == 1){
							$jenis =  "Bulanan" ;
							$date = $row->ps_sdate ." sehingga ". $date = $row->ps_edate;;
						}else{
							$jenis =  "Sekali Sahaja" ;
							$date = $row->ps_sdate;
						}
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->daerah_name</td>";
							echo "<td>$row->pos_name</td>";
							echo "<td>$row->kg_nama</td>";
							echo "<td>$row->lookup_desc</td>";
							echo "<td>$row->u_full_name</td>";
							echo "<td>$row->u_ic_number</td>";
							echo "<td>$jenis</td>";
							echo "<td>RM".number_format($row->ps_jumlah,2)."</td>";
							echo "<td>$date</td>";
						echo "</tr>";
						$no++;
					}
				}else{
					echo "<tr><td colspan='10' align='center'>Tiada Maklumat</td></tr>";
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
