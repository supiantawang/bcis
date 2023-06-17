<section class="content-header">
      <h1>
        Laporan Program
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Laporan Program</li>
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
			<form class="form-horizontal" action="<?php echo base_url()?>index.php/report/program">
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Pilihan</label>
					<div class="col-md-8">
						<label class="radio radio-inline"><input type="radio" name="pilihan" id="statusradio0" value="semua" <?php echo ($this->uri->segment(3) == "semua") ? "checked" : $cek ?>>Semua</label>
						<label class="radio radio-inline"><input type="radio" name="pilihan" id="statusradio2" value="1" <?php echo ($this->uri->segment(3) &&$this->uri->segment(3) == 1) ? "checked" : "" ?>>Program Telah Dijalankan</label>
						<label class="radio radio-inline"><input type="radio" name="pilihan" id="statusradio3" value="2" <?php echo ($this->uri->segment(3) == 2) ? "checked" : "" ?>>Program Diperlukan</label>        
						    
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Kampung</label>
					<div class="col-md-5">
						<?php echo form_dropdown("kampung",$kampung,($this->uri->segment(4)) ? $this->uri->segment(4) : "","class='form-control select2' id='kampung' ")?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Jenis Program</label>
					<div class="col-md-5">
						
						<?php echo form_dropdown("programtype",$programtype,($this->uri->segment(5)) ? $this->uri->segment(5) : "","class='form-control' id='programtype'")?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Pencapaian Kampung</label>
					<div class="col-md-5">
						
						<?php echo form_dropdown("pencapaian",$programtype,($this->uri->segment(6)) ? $this->uri->segment(6) : "","class='form-control' id='pencapaian'")?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Tarikh Program</label>
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-5">
								<div class="input-group date">
									<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
									<?php echo form_input("sdate",($this->uri->segment(7)) ? $this->uri->segment(7) : "","class='form-control datepicker' id='sdate'")?>
								</div>
							</div>
							<div class="col-md-2">
								Sehingga
							</div>
							<div class="col-md-5">
								<div class="input-group date">
									<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
									<?php echo form_input("sdate",($this->uri->segment(8)) ? $this->uri->segment(8) : "","class='form-control datepicker' id='edate'")?>
								</div>
							</div>
							
						</div>
						
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
                <table class="table table-striped table-bordered1 table-hover" id="tblist">
				<thead>
					<tr role="row">
						<th width="3%">No</th>
						<th width="10%">Pos</th>
						<th width="10%">Kampung</th>
						<th>Pilihan</th>
						<th>Program</th>
						<th width="20%">Jenis Program</th>
						<th width="20%">Pencapaian Kampung</th>
						<th width="10%">Tarikh Program</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				if($this->uri->segment(3)  && $this->uri->segment(3) != "semua"){
					$this->db->where("a.program_isrequired",$this->uri->segment(3));
				}
				if($this->uri->segment(4)  && $this->uri->segment(4) != "semua"){
					$this->db->where("a.program_kg",$this->uri->segment(4));
				}
				if($this->uri->segment(5)  && $this->uri->segment(5) != "semua"){
					$this->db->where("a.program_type",$this->uri->segment(5));
				}
				if($this->uri->segment(6)  && $this->uri->segment(6) != "semua"){
					$this->db->where("a.program_achievement",$this->uri->segment(6));
				}
				if(($this->uri->segment(7)  && $this->uri->segment(8))){
					$this->db->where("a.program_sdate BETWEEN '".$this->uri->segment(7)."' AND '".$this->uri->segment(8)."' ");
				}
				
				
				$this->db->join("pro_kampung c","c.kg_id = a.program_kg");
				$this->db->join("pro_pos b","b.pos_id = c.kg_pos_id");
				$penduduk = $this->blapps_lib->getDataResult("pro_program a",array(),"",array("a.program_title","ASC"));
				if($penduduk){
					$no =  1;
					foreach($penduduk as $row){
						$type = "";
						$achievement = "";
						$choice = "";
						$choice = ($row->program_isrequired == 1) ? "Program Telah Dijalankan" : "Program Diperlukan";
						$type = ($row->program_type != 0) ? $this->blapps_lib->getData("lookup_desc","pro_lookup","lookup_id",$row->program_type): "";
						$achievement = ($row->program_achievement != 0) ? $this->blapps_lib->getData("lookup_desc","pro_lookup","lookup_id",$row->program_achievement) : "";
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->pos_name</td>";
							echo "<td>$row->kg_nama</td>";
							echo "<td>$choice</td>";
							echo "<td>$row->program_title</td>";
							echo "<td>$type</td>";
							echo "<td>$achievement</td>";
							echo "<td>$row->program_sdate</td>";
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
