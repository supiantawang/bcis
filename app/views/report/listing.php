<section class="content-header">
      <h1>
        Laporan Profil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Laporan Profil</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
            <div class="box-body"><p>&nbsp;</p>
			<form class="form-horizontal" action="<?php echo base_url()?>index.php/report/participant">
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Suku Kaum</label>
					<div class="col-md-5">
						<?php //echo form_dropdown("subinstitusi",$subinstitusi,($this->uri->segment(3)) ? $this->uri->segment(3) : "","class='form-control input-sm' id='subinstitusi'")?>
						<?php echo form_dropdown("sukukaum",$sukukaum,($this->uri->segment(3)) ? $this->uri->segment(3) : "","class='form-control' id='sukukaum' ")?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Agama</label>
					<div class="col-md-5">
						
						<?php echo form_dropdown("agama",array('semua'=>'- Semua -','1'=>'Islam','2'=>'Kristian','3'=>'Animisme'),($this->uri->segment(4)) ? $this->uri->segment(4) : "","class='form-control' id='agama'")?>
					</div>
				</div>
				<!--<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Status Pekerjaan</label>
					<div class="col-md-5">
						
						<?php echo form_dropdown("sukukaum",array('semua'=>'- Semua -','bekerja'=>'Bekerja','xbekerja'=>'Tidak Bekerja'),"","class='form-control' ")?>
					</div>
				</div>-->
				<!--<div class="form-group ">
					<label class="col-md-2 col-md-offset-1 control-label">Tarikh Mula</label>
					<div class="col-md-2">

						<div class="input-group date">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <?php echo form_input("sdate",($this->uri->segment(4)) ? $this->uri->segment(4) : "","class='form-control pull-right datepicker' id='sdate'") ?>
						</div>

					</div>

					<label class="col-md-1 control-label">Sehingga</label>
					<div class="col-md-2">

					<div class="input-group date">
					  <div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					  </div>
					  <?php echo form_input("edate",($this->uri->segment(5)) ? $this->uri->segment(5) : "","class='form-control pull-right datepicker' id='edate'") ?>
					</div>

				</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1 control-label">Status</label>
					<div class="col-md-8">
						<label class="radio radio-inline"><input type="radio" name="statusradio" id="statusradio0" value="0" <?php echo ($this->uri->segment(6) == 0) ? "checked" : "" ?>>Semua</label>
						<label class="radio radio-inline"><input type="radio" name="statusradio" id="statusradio2" value="2" <?php echo ($this->uri->segment(6) == 2) ? "checked" : "" ?>>Telah Disahkan</label>
						<label class="radio radio-inline"><input type="radio" name="statusradio" id="statusradio3" value="3" <?php echo ($this->uri->segment(6) == 3) ? "checked" : "" ?>>Setelah Dinilai</label>        
						<label class="radio radio-inline"><input type="radio" name="statusradio" id="statusradio4" value="4" <?php echo ($this->uri->segment(6) == 4) ? "checked" : "" ?>>Selesai</label>        
					</div>
				</div>-->
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
						<th>Suku Kaum</th>
						<th>Ketua Isi Rumah (KIR)</th>
						<th width="20%">Ahli Isi Rumah (AIR)</th>
						<th width="20%">Agama</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				if($this->uri->segment(3)  && $this->uri->segment(3) != "semua"){
					$this->db->where("d.sukukaum_id",$this->uri->segment(3));
				}
				if($this->uri->segment(4)  && $this->uri->segment(4) != "semua"){
					$this->db->where("e.agama_id",$this->uri->segment(4));
				}
				
				
				$this->db->join("pro_kampung c","c.kg_id = a.u_kg_id");
				$this->db->join("pro_pos b","b.pos_id = c.kg_pos_id");
				$this->db->join("pro_sukukaum d","d.sukukaum_id = a.u_tribes");
				$this->db->join("pro_agama e","e.agama_id = a.u_religion");
				$penduduk = $this->blapps_lib->getDataResult("pro_penduduk a",array(),"",array("a.u_full_name","ASC"));
				if($penduduk){
					$no =  1;
					foreach($penduduk as $row){
						$child = $this->blapps_lib->getDataResult("pro_penduduk",array(array("u_parent",$row->u_id)),"",array("u_full_name","ASC"));
						$childlist = "";
						if($child){
							foreach($child as $cld){
								$childlist .= "- ".$cld->u_full_name."<br>($cld->u_ic_number)<br>";
							}
						}
						echo "<tr>";
							echo "<td>$no</td>";
							echo "<td>$row->pos_name</td>";
							echo "<td>$row->kg_nama</td>";
							echo "<td>$row->sukukaum_name ($row->sukukaum_etnik)</td>";
							echo "<td><a href='".base_url()."index.php/report/participant/view/".base64_encode($row->u_id)."'>$row->u_full_name <br>($row->u_ic_number)</a></td>";
							echo "<td>$childlist </td>";
							echo "<td>$row->agama_desc</td>";
							//echo "<td>$status</td>";
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
