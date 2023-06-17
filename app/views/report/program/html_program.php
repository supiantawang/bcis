	<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
            <div class="box-body">
				<i align="center"><img src="<?php echo base_url()?>assets/images/Logo-Majlis-Agama-Islam-Adat-Istiadat-Melayu-Kelantan.png" width="60"></i>
				<h3 align="center">LAPORAN PROGRAM</h3>
                <table width="100%" border="1" cellpadding="5" cellspacing="0">
				<thead>
					<tr role="row">
					
						<th width="5%" ><b>NO</b></th>
						<th width="10%"><b>POS</b></th>
						<th width="10%"><b>KAMPUNG</b></th>
						<th width="15%"><b>PILIHAN PROGRAM</b></th>
						<th width="20%"><b>PROGRAM</b></th>
						<th width="20%"><b>JENIS PROGRAM</b></th>
						<th width="20%"><b>PENCAPAIAN KAMPUNG</b></th>
					</tr>
				</thead>
				<tbody>
				<?php
				
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
							echo "<td width=\"5%\" >$no</td>";
							echo "<td width=\"10%\">$row->pos_name</td>";
							echo "<td width=\"10%\">$row->kg_nama</td>";
							echo "<td width=\"15%\">$choice</td>";
							echo "<td width=\"20%\">$row->program_title</td>";
							echo "<td width=\"20%\">$type</td>";
							echo "<td width=\"20%\">$achievement</td>";
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

